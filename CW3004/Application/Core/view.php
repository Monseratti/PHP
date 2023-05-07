<?php
class View{
    function generate($path){
        include("Aplication/Views/$path");
    }
}
?>