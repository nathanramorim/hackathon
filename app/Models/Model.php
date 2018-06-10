<?php 
namespace Models;
use App\Database;

class Model extends Database{
   
    public static function connection(){
       return parent::connection();
    }
}
