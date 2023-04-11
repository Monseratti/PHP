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
    <form method="get">
      <div class="form-group">
        <label class="form-label">Text</label>
        <input type="text" name="text" class="form-contpol"/>
      </div>
      <button class="btn btn-outline-info">Input</button>
    </form>
    <?php
      echo "<p>".(isset($_GET['text'])?$_GET['text']:"")."</p>";
    ?>

    <form method="get">
      <div class="form-group">
        <label class="form-label">Search</label>
        <input type="text" name="search" class="form-contpol"/>
      </div>
      <button class="btn btn-outline-info">Search</button>
    </form>
    <?php
      $arr = [
        "Poland","Singapore","Portugal","Kyiv"
      ];
      if(isset($_GET['search'])){
        $searchStr = strtolower($_GET['search']);
        echo "<ul>";
        foreach ($arr as $key => $value) {
          if(str_contains(strtolower($value), $searchStr)){
            $strArr = str_split($value);
            echo "<li>";
              foreach ($strArr as $key => $val) {
                if(str_contains($searchStr,strtolower($val))){
                  echo "<b style='color:red'>$val</b>";
                }
                else{
                  echo $val; 
                }
              }
            echo "</li>";
            
          }
        }
        echo "</ul>";
      }
      else{
        echo "<ul>";
        foreach ($arr as $key => $value) {
          echo "<li>$value</li>";
        }
        echo "</ul>";
      }
    ?>
    <form method="get">
      <div class="form-group">
        <label class="form-label">Login</label>
        <input type="text" name="login" class="form-contpol"/>
      </div>
      <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="pass" class="form-contpol"/>
      </div>
      <button class="btn btn-outline-info">Login</button>
    </form>
    <?php
      if(isset($_GET['login'])&&isset($_GET['pass'])){
        if($_GET['login']=='Log'&&$_GET['pass']=='Pass'){
          echo "<div>Hello</div>";
        }
        else{
          echo "<div>Some error. Please try again or <a href='task1.php'>register</a></div>";
        }
      }
    ?>

    <form action="" method="get">
      <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-contpol"/>
      </div>
      <div class="form-group">
        <label class="form-label">Phone</label>
        <input type="phone" name="phone" class="form-contpol"/>
      </div>
      <div class="form-group">
        <label class="form-label">Text</label>
        <textarea name="contact_text"></textarea>
      </div>
      <button class="btn btn-outline-info">Send</button>
    </form>
    <?php
      echo "<div>Name: ".(isset($_GET['name'])?$_GET['name']:"undefined")."</div>";
      echo "<div>Phone: ".(isset($_GET['phone'])?$_GET['phone']:"undefined")."</div>";
      echo "<div>Text: ".(isset($_GET['contact_text'])?$_GET['contact_text']:"")."</div>";
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