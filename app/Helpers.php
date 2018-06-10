<?php
namespace App;
class Helpers {
    private $setup = [
        'page' => 'Web Service',
    ];

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
    
    public static function responseHTTP($status){
        $arr = [
            200 => '{"status":"OK"}',
            400 => '{"status":"Unauthorized"}',
            500 => '{"status":"Bad Request"}'
        ];
        return $arr[$status];
    }
    
    public function setSetup($index,$label){
        if(array_key_exists($index, $this->setup))
        $this->setup[$index] = $label;
    }

    public function getSetup (){
        return $this->setup;
    }

    
}
