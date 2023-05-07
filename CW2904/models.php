<?php
class User implements JsonSerializable
{
    protected $login, $pass;
    function __construct($_login, $_pass) {
        $this->login = $_login;
        $this->pass = $_pass;
    }
    function getLogin(){
        return $this->login;
    }
    protected function getPass(){
        return $this->pass;
    }
    function Register(){
        $users = [];
        if(file_exists("users.json")){
            $arr = json_decode(file_get_contents("users.json"),true);
            foreach ($arr as $user) {
                $users[] = new User($user['login'],$user['pass']);
            }
        }
        $users[] = $this;
        $fs = fopen("users.json",'w');
        fwrite($fs,json_encode($users));
        fclose($fs);
    }
    function Login(){
        if(file_exists("users.json")){
            $arr = json_decode(file_get_contents("users.json"),true);
            foreach ($arr as $user) {
                $tmp = new User($user['login'],$user['pass']);
                if($tmp->Equals($this)) return true;
            }
        }
        return false;
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return [
            'login'=>$this->login,
            'pass'=>$this->pass
        ];
    }
    function Equals($_user){
        if(is_a($_user,'User')){    
            if($this->login==$_user->getLogin()&&$this->pass==$_user->getPass()) return true;
        }
        return false;
    }
}

class FileExplorer
{
    function MakeDirectory($_dirName){
        return mkdir($_dirName);
    }
    function LoadFile($_file, $_dir){
        print_r($_file);
        $tmpPath = $_file['tmp_path'];
        $path = "{$_dir}/{$_file['name']}";
        move_uploaded_file($tmpPath,$path);
    }
}
?>