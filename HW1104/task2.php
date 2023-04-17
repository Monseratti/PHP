<?php
$quest1 = [];
for ($i=1; $i < 11; $i++) { 
    $k=rand(1,4);
    $quest1[] = ["Question_$i"=>["Answ $i-1"=>($k==1?1:0), "Answ $i-2"=>($k==2?1:0),"Answ $i-3"=>($k==3?1:0),"Answ $i-4"=>($k==4?1:0)]];
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
  <div>Part 1</div>
    <form action="task2_1.php" method="post">
        <?php
        $k=1;
        foreach ($quest1 as $key => $questions) {
            foreach ($questions as $question => $answers) {
                echo "<div>".str_replace("_"," ",$question)."</div>";
                echo "<div class='d-flex'>";
                for ($i=1; $i < count($answers)+1; $i++) { 
                    echo "<label class='me-2'><input type='radio' name='$question' value='".$answers["Answ $k-$i"]."'>Answ $k-$i</label>";
                }
                $k++;
                echo "</div>";
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