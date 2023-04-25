<?php 
class MenuItem{
    protected $name, $url;
    function __construct($_name, $_url){
        $this->name = $_name;
        $this->url = $_url;
    }
    function getName(){
        return $this->name;
    }
    function getUrl(){
        return $this->url;
    }
}

class Menu{
    protected $listItems;
    function AddMenuItem($_name, $_url){
        $this->listItems[]=new MenuItem($_name, $_url);
    }
    function PrintMenu($_width, $_height, $_background_color, $_color){
        if(count($this->listItems)>0){
            echo "<ul style='list-style-type: none; margin: 0; padding: 0; overflow: hidden;
             background-color: {$_background_color};'>";
            foreach ($this->listItems as $item) {
                echo "<li style='height:{$_height}px; wigth:{$_width}px; float: left;'>
                <a style='color:$_color;display: block;text-align: center;padding: 14px 16px;text-decoration: none;' href={$item->getUrl()}>{$item->getName()}</a></li>";
            }
            echo "</ul>";
        }
    }
}
class User implements JsonSerializable
{
    protected $name, $login, $pass;
    function __construct($_name, $_login, $_pass){
        $this->name = $_name;
        $this->login = $_login;
        $this->pass = $_pass;
    }
    function __toString(){
        return date_create()->format('Y/m/d s:i:H')."; {$this->name}; {$this->login}:{$this->pass}\n";
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return ["data"=>date_create()->format('Y/m/d s:i:H'),"name"=>$this->name, "login"=>$this->login, "pass"=>$this->pass];
    }
}
?>