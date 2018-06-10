<?php
namespace Controllers;
use Models\Model;
use App\Helpers;
use App\Auth;

class Agentes extends Model
{
    public function getLocation($app,$request){
        $data = json_decode($request->getBody(), true);
        
        $lt = $data['location']['latitude'];
        $lg = $data['location']['longitude'];

        $status = Auth::authenticationHTTP($request);
        $app->response->setStatus($status);
        
        echo Helpers::responseHTTP($status);
    }   

}



