<?php
$quest2 = [];
for ($i=1; $i < 11; $i++) { 
    $k1=rand(1,4);
    $k2=0;
    do {
        $k2=rand(1,4);
    } while ($k2==$k1);
    $k3=0;
    do {
        $k3=rand(1,4);
    } while ($k3==$k1||$k3==$k2);
    $quest2[] = ["Question_$i"=>["Answ $i-1"=>(($k1==1||$k2==1||$k3==1)?1:0), 
                                "Answ $i-2"=>(($k1==2||$k2==2||$k3==2)?1:0),
                                "Answ $i-3"=>(($k1==3||$k2==3||$k3==3)?1:0),
                                "Answ $i-4"=>(($k1==4||$k2==4||$k3==4)?1:0)]];
}
$lastRes = 0;
for ($i=1; $i < 11; $i++) { 
    if(isset($_POST["Question_$i"])){
        $lastRes+=intval($_POST["Question_$i"]);
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
    <div>Part 2</div>
  <form action="task2_2.php" method="post">
        <?php
        echo "<input type='text' name='resP1' hidden value='$lastRes'>";
        $k=1;
        foreach ($quest2 as $key => $questions) {
            foreach ($questions as $question => $answers) {
                echo "<div>".str_replace("_"," ",$question)."</div>";
                echo "<div class='d-flex'>";
                for ($i=1; $i < count($answers)+1; $i++) { 
                    echo "<label class='me-2'><input type='checkbox' name='".$question.$k*$i."' value='".$answers["Answ $k-$i"]."'>Answ $k-$i</label>";
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