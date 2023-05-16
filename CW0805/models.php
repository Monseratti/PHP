<?php
class DB
{
    static function DbConnect($server,$login,$pass,$database = null){
        if($database == null){
            $conn = mysqli_connect($server,$login,$pass);
        }
        else{
            $conn = mysqli_connect($server,$login,$pass, $database);
        }
        if(!$conn){
            return mysqli_connect_error();
        }
        return $conn;
    }
    static function CreateDataBase($conn,$name){
        $sql = "CREATE DATABASE IF NOT EXISTS _$name";
        return mysqli_query($conn,$sql);
    }
    static function UseDataBase($conn,$name){
        $sql = "USE _$name";
        return mysqli_query($conn,$sql);
    }
    static function CurrentDataBase($conn){
        $sql = "SELECT DATABASE()";
        $result=mysqli_query($conn,$sql);
        return $result->fetch_array()[0];  
    }

    static function CreateTable($conn,$name,$params){
        $sql = "CREATE TABLE IF NOT EXISTS $name";
        $strParams = "(";
        foreach ($params as $parameter) {
            $strParams = $strParams."$parameter,";
        }
        $strParams = rtrim($strParams,',');
        $strParams = $strParams.");";
        $sql = $sql."$strParams";
        return mysqli_query($conn,$sql);
    }

    static function AlterTable($conn,$name,$type, $params){
        $sql = "ALTER TABLE $name";
        $strParams = "$type ";
        switch ($type) {
            case 'ADD':
                foreach ($params as $parameter) {
                    $strParams = $strParams."$parameter,";
                }
                break;
            case 'MODIFY':
                foreach ($params as $parameter) {
                    $p = str_split($parameter)[0];
                    $strParams = $strParams."$p,";
                }
                break;
            case 'CHANGE':
                foreach ($params as $parameter) {
                    $p = str_split($parameter)[0];
                    $strParams = $strParams."$p,";
                }
                break;
            case 'DROP':
                foreach ($params as $parameter) {
                    $p = str_split($parameter)[0];
                    $strParams = $strParams."$p,";
                }
                break;
            default:
                # code...
                break;
        }
        $strParams = rtrim($strParams,',');
        $sql = $sql."$strParams";
        return mysqli_query($conn,$sql);
    }

    static function InsertIntoTable($conn,$tableName,$object){
        if(!method_exists($object,"getPropsNames")) return false;
        $sql = "INSERT INTO $tableName";
        $strParams = "(";
        foreach ($object->getPropsNames() as $propName) {
            $strParams = $strParams.strtolower($propName).", ";
        }
        $strParams = rtrim($strParams,',');
        $strParams = $strParams.")";
        $sql = $sql."$strParams";
        $sql = $sql." VALUES ";

        $strParams = "(";
        foreach ($object->getPropsNames() as $propName) {
            $strParams = $strParams.$object->get($propName).",";
        }
        $strParams = rtrim($strParams,',');
        $strParams = $strParams.")";
        $sql = $sql."$strParams);";
        return mysqli_query($conn,$sql);
    }
}

interface OwnMySQLConnectable
{
    function get($propName);
    function getPropsNames();
}

class Product implements OwnMySQLConnectable
{
    protected $id, $name, $price;
    function __construct($_name, $_price) {
        $this->name = $_name;
        $this->price = $_price;
    }
    function getID(){
        return $this->id;
    }
    function setID($value){
        $this->id = $value;
    }
    function getName(){
        return $this->name;
    }
    function getPrice(){
        return $this->price;
    }
    function setPrice($value){
        $this->price = $value;
    }
    function get($propName){
        switch ($propName) {
            case 'Name':
                return $this->getName();
            case 'Price':
                return $this->getPrice();
            default:
                return null;
        }
    }
    function getPropsNames(){
        return ['Name','Price'];
    }

}