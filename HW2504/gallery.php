<?php
include("modules.php");
$gallery = new Gallery();
echo "<a style='margin:5px' href='index.php'>Home</a><br/>";
$gallery->ViewGallery($_GET['startIndex'],$_GET['count'],$_GET['height'],$_GET['width']);

if($_GET['startIndex']>0){
    echo "<a style='margin:5px' href='gallery.php?count=".$_GET['count']."&width=".$_GET['width']."&height=".$_GET['height']."&startIndex=".($_GET['startIndex']-$_GET['count'])."'>Previous</a>";
}

if(($_GET['startIndex']+$_GET['count'])<$gallery->NumberOfImages()){
    echo "<a style='margin:5px' href='gallery.php?count=".$_GET['count']."&width=".$_GET['width']."&height=".$_GET['height']."&startIndex=".($_GET['startIndex']+$_GET['count'])."'>Next</a>";
} 
?>