<?php
include("models/DBConnect.php");
session_start(["cookie_lifetime"=>3600]);

if(isset($_SESSION["userLogin"])){
    header('Location: main.php');
    die();
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
        <div class='form-group col-3'>
            <input class='form-control' name="login" type="text" placeholder="login">
            <input class='form-control' name="pass" type="password" placeholder="password">
        </div>
        <div class='form-group'>
            <button class="btn btn-outline-danger" name='log'>Login</button>
            <button class="btn btn-outline-warning" name='reg'>Registration</button>
        </div>
    </form>
  </main>
  <?php
  if(isset($_POST["log"])){
    $conn = DB::DbConnect('localhost','root','','Shop');
    $login = $_POST["login"];
    $pass = $_POST["pass"];
    $sql = "SELECT _User._login as 'login', _User._password as 'pass' FROM `_User` WHERE _User._login = '$login' AND _User._password = '$pass'";
    if(mysqli_query($conn,$sql)->fetch_array()){
      $_SESSION["userLogin"] = true;
      header('Location: main.php');
      die();
    }
    else{
      $sql = "SELECT _User._login as 'login' FROM `_User` WHERE _User._login = '$login'";
      if(mysqli_query($conn,$sql)->fetch_array()){
        echo "Incorrect password";
      }
      else{
        echo "incorrect login";
      }
    }
  }
  if(isset($_POST["reg"])){
    header('Location: registration.php');
    die();
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