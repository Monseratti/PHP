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
    static function GetAny($conn, $tableName){
        $sql = "SELECT * FROM $tableName LIMIT 1";
        if(mysqli_query($conn,$sql)->fetch_array()){
            return true;
        }
        return false;
    }
    static function GetAll($conn, $tableName){
        $sql = "SELECT * FROM $tableName";
        if(mysqli_query($conn,$sql)->fetch_array()){
            return mysqli_query($conn,$sql);
        }
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

    static function InsertIntoTable($conn, $tableName, $paramsString, $valueString){
        $sql = "INSERT INTO $tableName($paramsString) VALUES $valueString";
        return mysqli_query($conn,$sql);
    }
}