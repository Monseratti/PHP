<?php
include("models/DBConnect.php");
session_start();
if(!isset($_SESSION["userLogin"])){
    header('Location: login.php');
    die();
}
$conn = DB::DbConnect("localhost","root","","Shop");
$sectors = DB::GetAll($conn,"_Sector");
$categories = DB::GetAll($conn,"_Category");
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
        <input class="form-control" name="catName" placeholder="Title of category" required>
        <select class="form-control" name="sectorId">
            <?php foreach ($sectors as $sector):?>
                <option value=<?= $sector['id']?>><?= $sector['_name']?></option>
            <?php endforeach?>
            </select>
        <button class="btn btn-outline-primary">Add category</button>
    </div>
    </form>
    <?php
    if(isset($_POST["catName"])){
        $sql = "SELECT * FROM _Category WHERE _Category._name = '{$_POST["catName"]}'";
      if(mysqli_query($conn,$sql)->fetch_array()){
        echo "Category already exist";
      }
      else{
          if(DB::InsertIntoTable($conn,"_Category","_name,_sectorId","('{$_POST["catName"]}','{$_POST["sectorId"]}')")){
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

    <?php if(isset($_REQUEST['id'])):
        foreach ($categories as $category):?>
          <?php if($category['_sectorId']==$_REQUEST['id']):?>
            <a href="product.php?_categoryId=<?= $category['id']?>"><?= $category['_name']?></a>
          <?php endif?>
        <?php endforeach?>
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