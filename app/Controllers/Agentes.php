<?php
namespace Controllers;
use Models\Model;

class Agentes extends Model
{
    public function getLocation($request){
        $data = json_decode($request->getBody(), true);
        $user = $request->headers->get('Php-Auth-User');
        $pw = $request->headers->get('Php-Auth-Pw');
        $lt = $data['location']['latitude'];
        $lg = $data['location']['longitude'];

        $encrypted = base64_encode($user.':'.$pw);
        if($encrypted == 'bmF0aGFuOjEyMzQ=')
        var_dump($data);


        
        

    }    
}



