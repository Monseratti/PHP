<?php
$quest3 = [];
for ($i=1; $i < 11; $i++) { 
    $quest3[] = ["Question_$i"=>["Answ"=>"Some true answ"]];
}
$lastRes = 0;
if(isset($_POST['resP1'])){
    $lastRes = intval($_POST['resP1']);
}
for ($i=1; $i < 11; $i++) {
    for($y=1; $y < 5; $y++){
        if(isset($_POST["Question_".$i.$i*$y.""])){
            $lastRes+=intval($_POST["Question_".$i.$i*$y.""]);
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
  <div>Part 3</div>
  <form action="task2_3.php" method="post">
        <?php
        echo "<input type='text' name='resP2' hidden value='$lastRes'>";
        foreach ($quest3 as $key => $questions) {
            foreach ($questions as $question => $answers) {
                echo "<div>".str_replace("_"," ",$question)."</div>";
                for ($i=1; $i < count($answers)+1; $i++) { 
                    echo "<input type='text' name='".$question."' hidden value='".$answers["Answ"]."'>";
                    echo "<input type='text' name='user_".$question."' value=''>";
                }
            }
        }
        ?>
        <button class='btn btn-outline-success'>Next</button>
    </form>
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