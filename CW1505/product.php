<?php
include("models/DBConnect.php");
include("models/product.php");
session_start();
if(!isset($_SESSION["userLogin"])){
    header('Location: login.php');
    die();
}
$conn = DB::DbConnect("localhost","root","","Shop");
$categories = DB::GetAll($conn,"_Category");
$products = DB::GetAll($conn,"_Product");
$query = "SELECT * FROM _Product";

$filtered_get = array_filter($_GET); // removes empty values from $_GET
if (count($filtered_get)) { // not empty
  $query .= " WHERE";
  
  $keynames = array_keys($filtered_get); // make array of key names from $filtered_get

    foreach($filtered_get as $key => $value)
    {
       $query .= " $key='$filtered_get[$key]'";  // $filtered_get keyname = $filtered_get['keyname'] value
       if (count($filtered_get) > 1 && (count($filtered_get)-1 > array_search($key,$keynames))) { // more than one search filter, and not the last
          $query .= " AND";
       }
    }
}
$query .= ";";
$products = mysqli_query($conn,$query);
if(isset($_REQUEST['_categoryId'])&&isset($_REQUEST['ascName'])){
  $sql = "SELECT * FROM _Product WHERE _Product._categoryId = {$_REQUEST['_categoryId']} ORDER BY _Product._name";
  $products = mysqli_query($conn,$sql);
}
if(isset($_REQUEST['_categoryId'])&&isset($_REQUEST['descName'])){
  $sql = "SELECT * FROM _Product WHERE _Product._categoryId = {$_REQUEST['_categoryId']} ORDER BY _Product._name DESC";
  $products = mysqli_query($conn,$sql);
}
if(isset($_REQUEST['_categoryId'])&&isset($_REQUEST['ascPrice'])){
  $sql = "SELECT * FROM _Product WHERE _Product._categoryId = {$_REQUEST['_categoryId']} ORDER BY _Product._price";
  $products = mysqli_query($conn,$sql);
}
if(isset($_REQUEST['_categoryId'])&&isset($_REQUEST['descPrice'])){
  $sql = "SELECT * FROM _Product WHERE _Product._categoryId = {$_REQUEST['_categoryId']} ORDER BY _Product._price DESC";
  $products = mysqli_query($conn,$sql);
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <main>
    <form action="" method="post">
    <div class="d-flex flex-column col-md-3 col-12">
        <input class="form-control" name="prodName" placeholder="Title of product" required>
        <select class="form-control" name="categoryId">
            <?php foreach ($categories as $category):?>
                <option value=<?= $category['id']?>><?= $category['_name']?></option>
            <?php endforeach?>
        </select>
        <input class="form-control" type="number" name="prodPrice" placeholder="Price of product" min=1>
        <input class="form-control" name="prodMake" placeholder="Maker of product" required>
        <input class="form-control" name="prodModel" placeholder="Model of product" required>
        <input class="form-control" name="prodCountry" placeholder="Country of product" required>
        <input class="form-control" name="prodDescription" placeholder="Description of product" required>
        <button class="btn btn-outline-primary">Add product</button>
    </div>
    </form>
    <?php
    if(isset($_POST["prodName"])){
        $product = new Product($_POST["prodName"],$_POST["categoryId"],$_POST["prodPrice"],$_POST["prodMake"],$_POST["prodModel"],$_POST["prodDescription"],$_POST["prodCountry"]);
        $sql = "SELECT * FROM _Product WHERE _Product._name = '{$product->getName()}' AND _Product._categoryId = '{$product->getCategoryId()}'";
        if($result = mysqli_query($conn,$sql)->fetch_array()){
            $sql = "UPDATE _Product 
            SET _price = '{$_POST['prodPrice']}',
             _make = '{$_POST['prodMake']}',
             _model = '{$_POST['prodModel']}',
             _country = '{$_POST['prodCountry']}',
             _description = '{$_POST['prodDescription']}'
             WHERE _Product.id = {$result['id']}";
             mysqli_query($conn,$sql);
            header('Location: main.php');
            die();
        }
        else{
            if(DB::InsertIntoTable($conn,"_Product",$product->getParamsString(),$product->getInsertValueSqlString())){
              header('Location: main.php');
              die();
            }
            else{
                echo "Some error";
            }
        }
    }
    ?>

    <hr/>
    <?php if(isset($_REQUEST['_categoryId'])):?>
      <div class="d-flex">
        <div>
          <form action="" method="get">
            <input hidden value="<?= $_REQUEST['_categoryId']?>" name="_categoryId">
            <label>Min price <input name="min" type="number"></label>
            <label>Max price <input name="max" type="number"></label>
            <hr/>
            <?php 
            $makeArr=[];
            foreach ($products as $product){
              if(!in_array($product['_make'],$makeArr)){
                $makeArr[] = $product['_make'];
              }
            }
            foreach ($makeArr as $make):?>
              <label><input type="checkbox" name="_make" value="<?=$make?>"><?=$make?></label>
            <?php endforeach?>
            <hr/>
            <?php 
            $countryArr=[];
            foreach ($products as $product){
              if(!in_array($product['_country'],$countryArr)){
                $countryArr[] = $product['_country'];
              }
            }
            foreach ($countryArr as $country):?>
              <label><input type="checkbox" name="_country" value="<?=$country?>"><?=$country?></label>
            <?php endforeach?>
            <button class="btn btn-primary">Apply filter</button>
          </form>
        </div>
        <div>
          <div>
            Sort by name:
            <a href="product.php?_categoryId=<?=$_REQUEST['_categoryId']?>&ascName">Ascending</a>
            <a href="product.php?_categoryId=<?=$_REQUEST['_categoryId']?>&descName">Descending</a>
          </div>
          <div>
            Sort by price:
            <a href="product.php?_categoryId=<?=$_REQUEST['_categoryId']?>&ascPrice">Ascending</a>
            <a href="product.php?_categoryId=<?=$_REQUEST['_categoryId']?>&descPrice">Descending</a>
          </div>
          <table class="table table-dark">
            <thead>
              <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Make</th>
                <th>Country</th>
                <th>Price</th>
                <th>Description</th>
                <th>Operations</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
                <tr>
                  <td><?= $product['_name']?></td>
                  <td><?= $product['_model']?></td>
                  <td><?= $product['_make']?></td>
                  <td><?= $product['_country']?></td>
                  <td><?= $product['_price']?></td>
                  <td><?= $product['_description']?></td>
                 <td>
                   <button >Add to cart</button>  
                  </td>
                </tr>
                <?php endforeach?>
              </tbody>
            </table>
          </div>
        </div>
          <?php endif?>
        </main>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>