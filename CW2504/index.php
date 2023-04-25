<?php
include("models.php");
#task 1
// $menu = new Menu();
// $menu->AddMenuItem("Home", 'home.php');
// $menu->AddMenuItem("About", 'about.php');
// $menu->AddMenuItem("Photo", 'photo.php');
// $menu->AddMenuItem("Contact Us", 'contact.php');
// $menu->AddMenuItem("Login", 'login.php');

// $menu->PrintMenu(100,50,"red","green");

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
    <form class="col-4" method="post">
        <div class="form-group">
            <input class="form-control" name="name" placeholder="Name">
            <input class="form-control" name="login" placeholder="Login">
            <input class="form-control" name="pass" type="password" placeholder="Password">
        </div>
        <input type="submit" name="asTXT" class="btn btn-danger" value="Save as .TXT">
        <input type="submit" name="asJSON" class="btn btn-warning" value="Save as .json">
        <input type="submit" name="print" class="btn btn-warning" value="Print data">
    </form>
  </main>
  <?php
    if(array_key_exists('asTXT',$_POST)){
        SaveAsTXT();
    }
    if(array_key_exists('asJSON',$_POST)){
        SaveAsJSON();
    }
    if(array_key_exists('print',$_POST)){
        printData();
    }
    function printData(){
        $fileTXT=fopen('users.txt','r');
        while(!feof($fileTXT)){
            echo "<p>".fgets($fileTXT)."</p>";
        }
        fclose($fileTXT);
        $users = [];
        $users = json_decode(file_get_contents('users.json'));
        foreach ($users as $user) {
            echo "<p>".new User($user->name,$user->login,$user->pass)."</p>";
        }
    }
    function SaveAsTXT(){
        $file=fopen('users.txt','a');
        fwrite($file,new User($_POST['name'],$_POST['login'],$_POST['pass']));
        fclose($file);
    }
    function SaveAsJSON(){
        $users = [];
        $users = json_decode(file_get_contents('users.json'));
        $users[] = new User($_POST['name'],$_POST['login'],$_POST['pass']);
        $file=fopen('users.json','w');
        fwrite($file,json_encode($users));
        fclose($file);
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