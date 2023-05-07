<?php
// if(isset($_POST['textbox'])){
//     setcookie('data', date_create()->format("D, d M Y H:i:s"));
//     setcookie('text', $_POST['textbox']);
// }
include("models.php");
if(isset($_POST['log'])&&isset($_POST['pass'])){
    $user = new User($_POST['log'],$_POST['pass']);
}
if(isset($_POST['register'])){
  $user->Register();
  setcookie("isLogged",strval(true));
  setcookie("userName",strval($user->getLogin()));
}
if(isset($_POST['login'])){
  $isLogged = $user->Login();
  setcookie("isLogged",strval($isLogged));
  if($isLogged){
    if(!is_dir($user->getLogin())){
      mkdir($user->getLogin());
    }
    setcookie("userName",strval($user->getLogin()));
    session_start();
    setcookie("sessionID", session_id());
    header("Location: storage.php");
    die();
}
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
    <!-- <form action="" method="post">
        <input type="text" name='textbox'>
        <button>Set text</button>
    </form> -->
    <?php
    // if(isset($_COOKIE['text'])){
    //     echo "<p>{$_COOKIE['data']} - {$_COOKIE['text']}</p>";
    // }
    ?>

    <form action="" method="post">
        <div class="col-3 mb-3">
          <label for="" class="form-label">Name</label>
          <input type="text" name="log" class="form-control" placeholder="Name">
        </div>
        <div class="col-3 mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" class="form-control" name="pass" id="" placeholder="Password">
        </div>
        <button class="btn btn-primary" name='register'>Register</button>
        <button class="btn btn-success" name='login'>Login</button>
    </form>
    <hr/>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>