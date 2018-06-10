<?php
namespace App;
class Helpers {

    public function __construct(){
        echo 'Hello';
    }

    public static function setSession($name,$session){
        $_SESSION[$name] = $session;
    }
    public static function getSession($name = null){
        if($name)
        return $_SESSION[$name];

        if($name != null)
        return $_SESSION;
    }
    public static function removeSession($name){
        unset($_SESSION[$name]);
    }

    public static function base_url($path = ""){
        $url = "//{$_SERVER['SERVER_NAME']}/{$path}";
        return $url;
    }

    

    
}
