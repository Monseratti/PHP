<?php
class User{
    protected $id, $login, $password, $name, $surname, $phone, $country;
    function __construct($_login, $_pass, $_name, $_surname, $_phone, $_country) {
        $this->login = $_login;
        $this->password = $_pass;
        $this->name = $_name;
        $this->surname = $_surname;
        $this->phone = $_phone;
        $this->country = $_country;
    }
    function getId(){
        return $this->id;
    }
    function getLogin(){
        return $this->login;
    }
    function getPassword(){
        return $this->password;
    }
    function getParamsString(){
        return "`_name`, `_surname`, `_login`, `_password`, `_phone`, `_country`";
    }
    function getInsertValueSqlString(){
        return "('$this->name','$this->surname','$this->login','$this->password','$this->phone','$this->country')";
    }
}