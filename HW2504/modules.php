<?php
class Article implements JsonSerializable
{
    protected $id, $header, $shortText, $fullText;
    function __construct($_id,$_header,$_shortText,$_fullText) {
        $this->id = $_id;
        $this->header = $_header;
        $this->shortText = $_shortText;
        $this->fullText = $_fullText;
    }
    function getId(){
        return $this->id;
    }
    function getHeader($_color='purple', $_text_size='14'){
        echo "<p style='color={$_color}; text-size:{$_text_size}'><a href='article.php?id={$this->id}'>{$this->header}</a></p>";
    }
    function getShortText($_color='', $_text_size='12'){
        echo "<p style='color={$_color}; text-size:{$_text_size}'>{$this->shortText}</p>";
    }
    function getFullText($_color='', $_text_size='12'){
        echo "<p style='color={$_color}; text-size:{$_text_size}'>{$this->fullText}</p>";
    }
    #[ReturnTypeWillChange]
    function jsonSerialize()
    {
        return [
            'id'=>$this->id,
            'header'=>$this->header,
            'shortText'=>$this->shortText,
            'fullText'=>$this->fullText
        ];
    }
}

class News implements JsonSerializable
{
    protected $listArticles;

    function __construct()
    {       
        $this->readNews();
    }
    function GetArticles(){
        if($this->listArticles!=null){
            foreach ($this->listArticles as $article) {
                $article->getHeader();
                $article->getShortText();
            }
        }
    }
    function GetArticlesById($_id){
        if($this->listArticles!=null){
            foreach ($this->listArticles as $article) {
                if($article->getId()==$_id){
                    return $article;
                }
            }
        }
    }
    function AddArticle($_header,$_shortText,$_fullText){
        $_id = -1;
        if($this->listArticles!=null)
        {
            $artIDs = [];
            foreach ($this->listArticles as $article) {
                $artIDs[]=$article->getId();
            }
            do{
                $_id = rand(0,99999);
            }while(in_array($_id,$artIDs));
        }
        else
        {
            $_id = rand(0,99999);
        }
        $this->listArticles[]=new Article($_id,$_header,$_shortText,$_fullText);
        $fs=fopen('news.json','w');
        fwrite($fs,json_encode($this));
        fclose($fs);
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return $this->listArticles;
    }
    protected function readNews(){
        try {
            $arr = json_decode(file_get_contents('news.json'),true);
            if($arr!=null){
                foreach ($arr as $article) {
                    $this->listArticles[]=
                    new Article($article['id'],$article['header'],$article['shortText'],$article['fullText']);
                }

            }
        } catch (\Throwable $th) {
        }
    }
}


class Image implements JsonSerializable
{
    protected $url, $alt;

    function __construct($_url,$_alt) {
        $this->url = $_url;
        $this->alt = $_alt;
    }
    function __toString(){
        return "<img style='object-fit: contain;' src={$this->url} alt={$this->alt}>";
    }
    function print($_height,$_width){
        echo "<img style='height:{$_height}px; width:{$_width}px' src={$this->url} alt={$this->alt}>";
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return
        [
            'url'=>$this->url,
            'alt'=>$this->alt
        ];
    }
}

class Gallery implements JsonSerializable
{
    protected $imageList;
    function __construct() {
        $this->readGallery();
    }

    function AddImage($_url,$_alt){
        $this->imageList[]=new Image($_url,$_alt);
        $fs=fopen('gallery.json','w');
        fwrite($fs,json_encode($this));
        fclose($fs);
    }

    function ViewGallery($_startIndex, $_count, $_height, $_width){
        $count = 0;
        for ($i=$_startIndex; $i < count($this->imageList); $i++) { 
            echo $this->imageList[$i]->print($_height, $_width);
            $count++;
            if($count==$_count) {
                break;
            }
        }
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return $this->imageList;
    }
    function NumberOfImages(){
        return count($this->imageList);
    }
    protected function readGallery(){
        try {
            $arr = json_decode(file_get_contents('gallery.json'),true);
            if($arr!=null){
                foreach ($arr as $image) {
                    $this->imageList[]=
                    new Image($image['url'],$image['alt']);
                }
            }
        } catch (\Throwable $th) {
        }
    }
}

?>