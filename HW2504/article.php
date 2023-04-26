<?php
include("modules.php");
$news = new News();
$article = $news->GetArticlesById($_GET['id']);
$article->getHeader();
$article->getFullText();
?>