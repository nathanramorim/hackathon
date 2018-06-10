<?php
namespace App;
use Models\Model;
use App\Helpers;
class Auth extends Model{

    public static function login($app,$request = null){
        $app->render('login.php',['conf'=>(new Helpers)->getSetup()]);
    }

    public function userAuth($app,$request){
        if($request->post('username') == 'nathan' && $request->post('password') == 1234){
            Helpers::setSession('auth',true);
            Helpers::setSession('user',$request->post('username'));
            $app->redirect('admin/home');
        }else{
            $app->flash('error', 'Usuário ou senha, inválidos.');
            self::login($app,$request); 
        }
    }

    public function index($app){
        $app->render('admin/home.php',['conf'=>(new Helpers)->getSetup()]);
    }

    public function logout($app){
        Helpers::removeSession('auth');
        $app->redirect('../');

    }

    public static function authenticationHTTP ($request){
        $user = $request->headers->get('Php-Auth-User');
        $pw = $request->headers->get('Php-Auth-Pw');
        if('bmF0aGFuOjEyMzQ=' == base64_encode($user.':'.$pw)){
            return 200;
        }else{
            return 400;
        }
    }
    
}
