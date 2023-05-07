<?php
include("models.php");
$fileExplorer = new FileExplorer();
if(!isset($_SESSION['ID'])){
    session_id($_COOKIE['sessionID']);
}
if(isset($_POST['dirName'])&&isset($_POST['mkDir'])&&!is_dir("{$_COOKIE['userName']}/{$_POST['dirName']}")){
  $fileExplorer->MakeDirectory("{$_COOKIE['userName']}/{$_POST['dirName']}");
}
if(isset($_POST['load'])&&isset($_FILE['upload'])){
  print_r($_FILE);
  $fileExplorer->LoadFile($_FILE['upload'],"{$_COOKIE['userName']}/{$_POST['dirSelectName']}");
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
    <form method="post" enctype="multipart/form-data">
      <input type="text" name='dirName' oninput="checkFill(event)">
      <button id='mkDir' name='mkDir' disabled>Add folder</button>
      <div class='d-flex'>
        <?php
    if(is_dir($_COOKIE['userName'])){
      echo "<input type='radio' class='btn-check' name='dirSelectName' id='dir_' value='root'> 
          <label class='m-3 btn btn-outline-primary' for='dir_'>Root</label>";
      $arr = scandir($_COOKIE['userName'],SCANDIR_SORT_NONE);
      for ($i=0; $i < count($arr); $i++) { 
        if(!is_dir($arr[$i])){
          echo "<input type='radio' class='btn-check' name='dirSelectName' id='dir_$i' value='{$arr[$i]}'> 
          <label class='m-3 btn btn-outline-primary' for='dir_$i'>{$arr[$i]}</label>";
        }
      }
    }
    ?>
    </div>
    <input type='file' name="upload">
    <button name='load'>Load</button>
    <button name='seeDir'>See dir</button>
    </form>
    <?php
    if(isset($_POST['seeDir'])){
      echo "<b>{$_POST['dirSelectName']}</b><br/>";
      if($_POST['dirSelectName']=="root"){
        $dirName = $_COOKIE['userName'];
      }
      else
      {
        $dirName = "{$_COOKIE['userName']}/{$_POST['dirSelectName']}";
      }
      foreach (scanDir($dirName) as $value) {
        echo "<p>$value</p>";
      }
    }
    ?>
  </main>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    function checkFill(event) {
      if(event.target.value!=""){
        document.getElementById("mkDir").removeAttribute("disabled");
      }
      else{
        document.getElementById("mkDir").setAttribute("disabled","true");
      }
    }
  </script>
</body>

</html>