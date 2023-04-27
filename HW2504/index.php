<?php
include("modules.php");
$news = new News();
$head="Lorem, ipsum.";
$short="Lorem ipsum, dolor sit amet consectetur adipisicing elit. At, numquam!";
$full="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur ipsa earum recusandae iste, laboriosam corrupti ipsam ab, culpa aspernatur accusantium in. Culpa facere dicta voluptas explicabo temporibus cupiditate, recusandae hic animi tempore itaque? Nemo suscipit, deleniti consequuntur libero error laboriosam?";
//$news->GetArticles();
$gallery = new Gallery();
//echo "Number of images in gallery is {$gallery->NumberOfImages()}";
$ticket = new Ticket();
?>
<!-- <form action="" method="post">
    <input name="url" placeholder="URL">
    <input name="alt" placeholder="Alt text">
    <button>Add image</button>
</form> -->
<?php
// if(isset($_POST['url'])&&isset($_POST['alt'])){
//     $gallery->AddImage($_POST['url'],$_POST['alt']);
// }
?>
<!-- <form action="gallery.php" method="get">
    <input type="number" name="count" placeholder="How many?">
    <input type="number" name="width" placeholder="Width">
    <input type="number" name="height" placeholder="Height">
    <input name='startIndex' hidden value='0'>
    <button>Go</button>
</form> -->

<form action="" method="post">
    <input name="name" placeholder="Name">
    <input type="number" name="count" placeholder="Count">
    <input type="number" name="price" placeholder="Price">
    <button>Buy</button>
</form>
<?php
    if(isset($_POST['Name'])&&isset($_POST['Count'])&&isset($_POST['Price'])){
        $ticket->AddProduct($_POST['Name'],$_POST['Count'],$_POST['Price']);
    }
?>
<form action="tickets.php" method="get">
    <button>Get tickets</button>
</form>