<?php include("models.php");
    //setcookie("isLogged",strval(false));
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
        setcookie("userName",strval($user->getLogin()));
      }
    }
    if(isset($_POST['refresh'])){
      setcookie("isLogged","",time()*-1);
      setcookie("userName","", time()*-1);
      setcookie("msgPath","",time()*-1);
    }
    if(isset($_POST['startPrivate'])&&isset($_POST['privateName'])){
      if(file_exists("{$_POST['privateName']}_{$_COOKIE['userName']}.json")){
        setcookie("msgPath","{$_POST['privateName']}_{$_COOKIE['userName']}.json");
      }
      else{
        setcookie("msgPath","{$_COOKIE['userName']}_{$_POST['privateName']}.json");
      }
    }
    if(isset($_POST['endPrivate'])){
      unlink($_COOKIE['msgPath']);
      setcookie("msgPath","",time()*-1);
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
    <form action="" method="post">
    <div class='d-flex'>
    <?php
    if(file_exists("users.json")&&(isset($_COOKIE['isLogged'])&&boolval($_COOKIE['isLogged'])==true)){
      $arr = json_decode(file_get_contents("users.json"),true);
      if($arr!=null){
        for ($i=0; $i < count($arr); $i++) { 
          if($arr[$i]['login']!=$_COOKIE['userName']){
            echo "<input type='radio' class='btn-check' name='privateName' id='privateName_$i' value='{$arr[$i]['login']}'> 
            <label class='btn btn-outline-primary' for='privateName_$i'>{$arr[$i]['login']}</label>";
          }
        }
      }
    }
    ?>
    </div>
    <hr/>
        <input name='message' placeholder="Message"/>
        <button class="btn btn-primary" name='send' <?php 
        if(!isset($_COOKIE['isLogged'])||boolval($_COOKIE['isLogged'])==false){
          echo "disabled";
        }
        else{
          echo "";
        }
        ?>>Send</button>
        <button class="btn btn-warning" name='seeMes'>See messages</button>
        <button class="btn btn-danger" name='refresh'>Refresh</button>
        <button class="btn btn-success" name='startPrivate'>Start private</button>
        <button class="btn btn-secondary" name='endPrivate'>End private</button>
    </form>
  </main>
<?php
  $msgPath = "message.json";
  if(isset($_COOKIE['msgPath'])){
    $msgPath = $_COOKIE['msgPath'];
  }
  if(isset($_POST['send'])&&isset($_POST['message'])){
    $mes = new Message($_COOKIE['userName'],$_POST['message']);
    $mes->Save($msgPath);
  }
  if(isset($_POST['seeMes'])){
    $messages = [];
      if(file_exists($msgPath)){
          $arr = json_decode(file_get_contents($msgPath));
          if($arr!=null){
              foreach ($arr as $message) {
                  $messages[]=new Message($message->name,$message->message);
              }
          }
      }
      foreach ($messages as $message) {
        $message->print();
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