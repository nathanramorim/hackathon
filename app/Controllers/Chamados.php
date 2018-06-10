<?php 
namespace Controllers;

use Models\Model;

class Chamados extends Model
{
    public function __construct(){
        
    }
    
    public function addNew($app,$request){
        var_dump($app);
    }

    public function listar($app){
        echo 'Listar';
    }
}
