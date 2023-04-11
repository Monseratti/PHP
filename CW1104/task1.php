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
    <?php
        echo "<form class='col-6' action='index.php' method='post'>";
        if(isset($_POST['login'])&&$_POST['login']=="Log"){
            echo "<div class='d-flex'><input class='form-control' style='border: 2px solid red' placeholder='Login' value='".$_POST['login']."
                ' name='login'/><span><b style='color:red'>This login already use</b></span></div>";
        }
        elseif(isset($_POST['login'])){
            echo "<div class='d-flex'><input class='form-control' placeholder='Login' value='".$_POST['login']."' name='login'/></div>";
        }
        else{
            echo "<input class='form-control' placeholder='Login' name='login'/>";
        }
        if(isset($_POST['pass'])&&strlen($_POST['pass'])<8){
            echo "<div class='d-flex'><input class='form-control' style='border: 2px solid red' placeholder='Password' type='password' name='pass'/>
                    <span><b style='color:red'>Password too short</b></span></div>";
        }
        elseif(isset($_POST['pass'])){
            echo "<div class='d-flex'><input class='form-control' placeholder='Password' type='password' value='".$_POST['pass']."' name='pass'/></div>";
        }
        else{
            echo "<input class='form-control' placeholder='Password' type='password' name='pass'/>";
        }
        if(isset($_POST['pass'])&&isset($_POST['confpass'])&&$_POST['pass']!=$_POST['confpass']){
            echo "<div class='d-flex'><input class='form-control' style='border: 2px solid red' placeholder='Confirm password' type='password' 
            value='".$_POST['confpass']."'  name='confpass'/><span><b style='color:red'>Password don't confirmed</b></span></div>";
        }
        elseif(isset($_POST['confpass'])){
            echo "<div class='d-flex'><input class='form-control' placeholder='Confirm password' type='password' value='".$_POST['confpass']."'name='confpass'/></div>";
        }
        else{
            echo "<input class='form-control' placeholder='Confirm password' type='password' name='confpass'/>";
        }
        if(isset($_POST['email'])){
            echo "<input class='form-control' placeholder='Email' value='".$_POST['email']."' type='email' name='email'/>";
        }
        else{
            echo "<input class='form-control' placeholder='Email' type='email' name='email'/>";
        }
        if(isset($_POST['phone'])&&strlen($_POST['phone'])<10){
            echo "<div class='d-flex'><input class='form-control' style='border: 2px solid red' placeholder='Phone' type='phone' value='".$_POST['phone']."' name='phone'/> <span><b style='color:red'>Phone too short</b></span></div>";
        }
        elseif(isset($_POST['phone'])){
            echo "<div class='d-flex'><input class='form-control' placeholder='Phone' type='phone' value='".$_POST['phone']."' name='phone'/></div>";
        }
        else{
            echo "<input class='form-control' placeholder='Phone' type='phone' name='phone'/>";
        }
        echo "<button class='btn btn-outline-primary'>Submit</button></form>";
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