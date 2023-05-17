<?php
class Product{
    protected $id, $name, $price, $categoryId, $make, $model, $description, $country;
    function __construct($_name, $_categoryId, $_price, $_make, $_model, $_description, $_country) {
        $this->name = $_name;
        $this->categoryId = $_categoryId;
        $this->price = $_price;
        $this->make = $_make;
        $this->model = $_model;
        $this->country = $_country;
        $this->description = $_description;
    }
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getCategoryId(){
        return $this->categoryId;
    }
    function getParamsString(){
        return "`_name`, `_price`, `_categoryId`, `_description`, `_make`, `_model`, `_country`";
    }
    function getInsertValueSqlString(){
        return "('$this->name','$this->price','$this->categoryId','$this->description','$this->make','$this->model','$this->country')";
    }
}