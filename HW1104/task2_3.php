<?php
$lastRes = 0;
if(isset($_POST['resP2'])){
    $lastRes = intval($_POST['resP2']);
}
for ($i=1; $i < 11; $i++) {
    if(isset($_POST["user_Question_$i"])){
        if($_POST["user_Question_$i"]==$_POST["Question_$i"]){
            $lastRes+=5;
        }
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
    <div>Results</div>
    <form method="post">
        <?php
            echo "<div>Your score is <b>$lastRes</b></div>";
        ?>
        <input type="submit" name="repeat" value='Repeat'>
        <input type="submit" name="exit" value='Exit'>
    </form>
    <?php
        if(isset($_POST['repeat'])){
            header("Location: task2.php");
        }
        if(isset($_POST['exit'])){
            header("Location: index.php");
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
</body>

</html>