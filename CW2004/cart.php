<?php
include $_SERVER['DOCUMENT_ROOT']."/CW2004/classes.php";
$prodArr = [];
if(isset($_POST['serialSession'])){
    foreach (json_decode($_POST['serialSession'],true)['productList'] as $prod) {
        if(array_key_exists("diagonal", $prod)){
            $prodArr[] = new Monitor($prod['name'],$prod['price'],$prod['description'],
            $prod['brand'],$prod['diagonal'],$prod['frequency'],$prod['ports']);
        }
        else{
            $prodArr[] = new Phone($prod['name'],$prod['price'],$prod['description'],
            $prod['brand'],$prod['cpu'],$prod['ram'],$prod['countSim'],$prod['hdd'],$prod['os']);
        }
    };
}
foreach ($prodArr as $product) {
    echo "<div><b>".$product->getProduct()."</b></div>";
}
?>