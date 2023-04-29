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

class Message implements JsonSerializable
{
    protected $user, $messText;
    function __construct($_user,$_messText) {
        $this->user = $_user;
        $this->messText = $_messText;
    }
    #[ReturnTypeWillChange]
    function jsonSerialize(){
        return [
            'name'=>$this->user,
            'message'=>$this->messText
        ];
    }
    function Save(){
        $messages = [];
        if(file_exists("message.json")){
            $arr = json_decode(file_get_contents("message.json"));
            if($arr!=null){
                foreach ($arr as $message) {
                    $messages[]=new Message($message->name,$message->message);
                }
            }
        }

        $messages[] = $this;
        $fs = fopen("message.json","w");
        fwrite($fs,json_encode($messages));
        fclose($fs);
        print_r($messages);
    }
    function print(){
        echo "<p>{$this->user}: {$this->messText}</p>";
    }
}
?>