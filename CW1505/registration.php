<?php
include("models/DBConnect.php");
include("models/user.php");
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
        <div class='form-group d-flex col-6'>
            <input class='form-control' name="login" type="text" placeholder="login">
            <label style="visibility:<?php echo (isset($_COOKIE["loginError"])&&boolval($_COOKIE["loginError"]))?"visible":"collapse"?>">Login too short/long</label>
        </div>
        <div class='form-group d-flex col-6'>
            <input class='form-control' name="pass" type="password" placeholder="password">
            <label style="visibility:<?php echo (isset($_COOKIE["passError"])&&boolval($_COOKIE["passError"]))?"visible":"collapse"?>">Password too short</label>
        </div>
        <div class='form-group col-6'>
            <input class='form-control' name="name" type="text" placeholder="name">
        </div>
        <div class='form-group col-6'>
            <input class='form-control' name="surname" type="text" placeholder="surname">
        </div>
        <div class='form-group col-6'>
            <input class='form-control' name="phone" type="text" placeholder="phone">
        </div>
        <div class='form-group col-6'>
            <input class='form-control' name="country" type="text" placeholder="country">
        </div>
        <div class='form-group'>
            <button class="btn btn-outline-warning" name='reg'>Registration</button>
        </div>
    </form>
  </main>
  <?php
  if(isset($_POST["reg"])){
    $IsError = false;
    if(strlen($_POST["login"])<3 ||strlen($_POST["login"])>20){
        setcookie("loginError", strval(true));
        $IsError = true;
    }
    else{
        setcookie("loginError", "");
    }
    if(strlen($_POST["pass"])<6){
        setcookie("passError", strval(true));
        $IsError = true;
    }
    else{
        setcookie("passError", "");
    }
    if(!$IsError){
        $user = new User($_POST["login"],$_POST["pass"],$_POST["name"],$_POST["surname"],
        $_POST["phone"],$_POST["country"]);
        if(DB::InsertIntoTable(DB::DbConnect('localhost','root','','Shop'), 
        "_User", $user->getParamsString(),
        $user->getInsertValueSqlString()))
        {
            header('Location: login.php');
            die();
        };
    }
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