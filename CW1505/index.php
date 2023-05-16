<?php
if(isset($_SESSION["userLogin"])){
    header('Location: main.php');
    die();
}
else{
    header('Location: login.php');
    die();
}
?>