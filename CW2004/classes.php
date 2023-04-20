<?php
class Product
{
    protected $name, $price, $description, $brand;
    function __construct($_name, $_price, $_description, $_brand)
    {
        $this->name = $_name;
        $this->price = $_price;
        $this->description = $_description;
        $this->brand = $_brand;
    }
    function getProduct(){
        echo "Name: ".$this->name."; price: ".$this->price."; description: ".
        $this->description."; brand: ".$this->brand;
    }
    static function searchByName($productArray, $productName){
        $returnArray = [];
        foreach ($productArray as $product) {
            if(str_contains(strtolower($product->name),strtolower($productName))){
                $returnArray[]=$product;
            }
        }
        return $returnArray;
    }
}
class Phone extends Product implements JsonSerializable
{
    protected $cpu, $ram, $countSim, $hdd, $os;
    function __construct($_name, $_price, $_description, $_brand,
                            $_cpu, $_ram, $_countSim, $_hdd, $_os){
        parent::__construct($_name, $_price, $_description, $_brand);
        $this->cpu = $_cpu;
        $this->ram = $_ram;
        $this->countSim = $_countSim;
        $this->hdd = $_hdd;
        $this->os = $_os;
    }
    function getProduct(){
        parent::getProduct();
        echo "; CPU: ".$this->cpu."; RAM: ".$this->ram.
        "; count SIM: ".$this->countSim."; HDD: ".$this->hdd."; OS: ".$this->os;
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return [
            "name"=>$this->name,
            "price"=>$this->price,
            "description"=>$this->description,
            "brand"=>$this->brand,
            "cpu"=>$this->cpu,
            "ram"=>$this->ram,
            "countSim"=>$this->countSim,
            "hdd"=>$this->hdd,
            "os"=>$this->os
        ];
    }
}
class Monitor extends Product implements JsonSerializable
{
    protected $diagonal, $frequency, $ports;
    function __construct($_name, $_price, $_description, $_brand,
                            $_diagonal, $_frequency, $_ports){
        parent::__construct($_name, $_price, $_description, $_brand);
        $this->diagonal=$_diagonal;
        $this->frequency=$_frequency;
        $this->ports=$_ports;
    }
    function getProduct(){
        parent::getProduct();
        echo "; diagonal: ".$this->diagonal."; frequency: ".$this->frequency.
        "; ports: ".$this->ports;
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return [
            "name"=>$this->name,
            "price"=>$this->price,
            "description"=>$this->description,
            "brand"=>$this->brand,
            "diagonal"=>$this->diagonal,
            "frequency"=>$this->frequency,
            "ports"=>$this->ports
        ];
    }
}
class Cart{
    protected $productList = [];
    function getCart(){
        return $this->productList;
    }
    function AddToCart($product){
        $this->productList[] = $product;
    }
}

class Session extends Cart implements JsonSerializable
{
    protected $sessionDateTime;
    function __construct(){
        $this->sessionDateTime = date_create();
    }
    function isSessionLive($date){
        if($this->sessionDateTime->diff($date)>=strtotime("3:00:00")):
            return false;
        else:
            return true;
        endif;
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return [
            "sessionDateTime" => $this->sessionDateTime,
            "productList" => $this->productList
        ];
    }
}
?>

<?php
class Control
{
    private $background,$width,$height;
    function getBackground(){
        return $this->background;
    }
    function getWidth(){
        return $this->width;
    }
    function getHeight(){
        return $this->height;
    }
    function setBackground($_background){
        $this->background=$_background;
    }
    function setWidth($_width){
        $this->width=$_width;
    }
    function setHeight($_height){
        $this->height=$_height;
    }
}

class Input extends Control
{
    private $name,$value;
    function getName(){
        return $this->name;
    }
    function getValue(){
        return $this->value;
    }
    function setName($_name){
        $this->name=$_name;
    }
    function setValue($_value){
        $this->value=$_value;
    }
}

class Button extends Input
{
    private $isSubmit;
    function __construct($_background, $_width, $_height, $_name, $_value, $_isSubmit){
        $this->setBackground($_background);
        $this->setWidth($_width);
        $this->setHeight($_height);
        $this->setName($_name);
        $this->setValue($_value);
        $this->isSubmit = $_isSubmit;
    }
    function getSubmitState(){
        return $this->isSubmit;
    }
    function setSubmitState(){
        $this->isSubmit = true;
    }
}

class Text extends Input
{
    private $placeholder;
    function __construct($_background, $_width, $_height, $_name, $_value, $_placeholder){
        $this->setBackground($_background);
        $this->setWidth($_width);
        $this->setHeight($_height);
        $this->setName($_name);
        $this->setValue($_value);
        $this->setPlaceholder($_placeholder);
    }

    function getPlaceholder(){
        return $this->placeholder;
    }
    function setPlaceholder(string $_placeholder)
    {
        $this->placeholder = $_placeholder;
    }
}

class Label extends Input
{
    private $for;
    function __construct($_background, $_width, $_height, $_name, $_value, $_parentObject){
        $this->setBackground($_background);
        $this->setWidth($_width);
        $this->setHeight($_height);
        $this->setName($_name);
        $this->setValue($_value);
        $this->setParentName($_parentObject);
    }

    function getParentName(){
        return $this->for;
    }
    function setParentName(Button|Text $parentObject){
        $this->for = $parentObject->getName();
    }
}
?>