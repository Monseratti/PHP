<?php
include $_SERVER['DOCUMENT_ROOT']."/CW2004/classes.php";
$productArray = [];
$productArray[] = new Phone("T1", 1000, "T1 Phone", "TT", "DG", 10, 2, 128, "SOME");
$productArray[] = new Monitor("M2", 300, "M2 Monitor", "MM", 50, 220, 15);
$productArray[] = new Phone("T2", 900, "T2 Phone", "TT", "DG3", 4, 1, 64, "SOME Super");
$productArray[] = new Monitor("M1", 300, "M1 Monitor", "MM", 23, 120, 8);
$productArray[] = new Phone("T3", 1200, "T3 Phone", "TT", "DG0", 8, 3, 256, "Ave SOME");


function convertToHTML(Control $obj){
    if($obj instanceof Label){
        echo "<label for='".($obj->getParentName())."' name='".($obj->getName())."'
        style = 'background-color:".($obj->getBackground()).";
        height:".($obj->getHeight())."px;
        width:".($obj->getWidth())."px;
        '>".($obj->getValue())."</label>";
    }
    if($obj instanceof Text){
        echo "<textarea placeholder='".($obj->getPlaceholder())."' name='".($obj->getName())."'
        style = 'background-color:".($obj->getBackground()).";
        height:".($obj->getHeight())."px;
        width:".($obj->getWidth())."px;
        '>".($obj->getValue())."</textarea>";
    }
    if($obj instanceof Button){
        echo "<input value='".($obj->getValue())."' name='".($obj->getName())."' 
        type='".($obj->getSubmitState()?"submit":"button")."'
        style = 'background-color:".($obj->getBackground()).";
        height:".($obj->getHeight())."px;
        width:".($obj->getWidth())."px;
        '>";
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
    <!-- Task 1,2 -->
    <!-- <form method="post">
        <div class="form-control">
            <input name="prName" placeholder="Name">
            <input name="prPrice" placeholder="Price">
        </div>
        <button class="btn btn-success">Add</button>
    </form>
    <?php
        // if(isset($_POST)){
        //     if(isset($_POST['name'])&&isset($_POST['price'])){
        //         $productArray[]=new Product($_POST['name'],$_POST['price']);
        //     }
        // }
        // foreach ($productArray as $product) {
        //     echo "<div><b>".$product->getProduct()."</b></div>";
        // }
    ?>
    <hr>
     <form method="post">
        <div class="form-control">
            <input name="prSearchName" placeholder="Search...">
        </div>
        <button class="btn btn-secondary">Find</button>
    </form>
    <?php
        // if(isset($_POST)){
        //     if(isset($_POST['prSearchName'])){
        //         $findArray = Product::searchByName($productArray,$_POST['prSearchName']);
        //         foreach ($findArray as $product) {
        //             echo "<div><b>".$product->getProduct()."</b></div>";
        //         }
        //     }
        // }
    ?> -->
    
    <!-- Task 3 -->
    <?php
        // foreach ($productArray as $product) {
        //     echo "<div><b>".$product->getProduct()."</b></div>";
        // }
    ?>
    <?php
        // $session = new Session();
        // $session->AddToCart($productArray[1]);
    ?>
    
    <?php
        // for ($i=0; $i < count($productArray); $i++) { 
        //     echo "<form method='post'>";
        //     echo "<div>".$productArray[$i]->getProduct()."</div>";
        //     echo "<input value='$i' name= 'prod$i' hidden><button>Add to Cart</button>";
        //     echo "</form>";
        // }
    ?>
    
    <?php
        // for ($i=0; $i < count($productArray); $i++) { 
        //     if(isset($_POST["prod$i"])){
        //         $session->AddToCart($productArray[$_POST["prod$i"]]);
        //     }
        // }
    ?>
    <!-- <form action="cart.php" method="post">
        <textarea name="serialSession" hidden><?php 
        // echo json_encode($session)
        ?></textarea>
        <button>Go to Cart</button>
    </form> -->


    <!-- Task 4 -->
    <?php
        $button = new Button("red",100,50,"btn1","Press me", false);
        $text = new Text ("green", 200,300,"text1","","Input text");
        $label = new Label("brown",100,50,"lbl1","Input text:",$text);
        convertToHTML($label); 
        convertToHTML($text); 
        convertToHTML($button); 
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