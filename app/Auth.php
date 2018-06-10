<?php
namespace App;
use Models\Model;
use Controllers\Pessoa;
use App\Helpers;
class Auth extends Model{

    public static function login($app,$request = null){
        $app->render('login.php',['conf'=>(new Pessoa)->getSetup()]);
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
        $app->render('admin/home.php',['conf'=>(new Pessoa)->getSetup()]);
    }

    public function logout($app){
        Helpers::removeSession('auth');
        $app->redirect('../');

    }
    
}
