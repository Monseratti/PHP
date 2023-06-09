<?php
include("models/DBConnect.php");
session_start();
if(!isset($_SESSION["userLogin"])){
    header('Location: login.php');
    die();
}
$conn = DB::DbConnect("localhost","root","","Shop");
$allowCategory = false;
$allowProduct = false;
if(DB::GetAny($conn,"_Sector")){
    $allowCategory = true;
}
if(DB::GetAny($conn,"_Category")){
    $allowProduct = true;
}
$sectors = DB::GetAll($conn,"_Sector");
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
            <button class='btn btn-primary' name="sector">Add sector</button>
            <button class='btn btn-primary' name="category" <?php echo $allowCategory?"":"disabled"?>>Add category</button>
            <button class='btn btn-primary' name="product" <?php echo $allowProduct?"":"disabled"?>>Add product</button>
            <button class='btn btn-danger' name="logout">Log out</button>
        </div>
    </form>
    <div class="d-flex flex-column col-md-3 col-12">
        <?php foreach ($sectors as $sector):?>
          <a href="category.php?id=<?= $sector['id']?>"><?= $sector['_name']?></a>
        <?php endforeach?>
    </div>


  </main>
  <?php
  if(isset($_POST['sector'])){
    header('Location: sector.php');
    die();
  }
  if(isset($_POST['category'])){
    header('Location: category.php');
    die();
  }
  if(isset($_POST['product'])){
    header('Location: product.php');
    die();
  }
  if(isset($_POST['logout'])){
    session_destroy();
  }
  ?>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>