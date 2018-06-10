<?php
namespace App;

class Database{

    protected static function connection (){
        $con = new \PDO('mysql:host=localhost;dbname=pbh', 'root', '12345'); //Conexão;;
        $con->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); //habilitando erros do PDO

        return $con;
    }
}
