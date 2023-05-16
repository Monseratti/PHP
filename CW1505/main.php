<?php
session_start();
if(!isset($_SESSION["userLogin"])){
    header('Location: login.php');
    die();
}
?>
