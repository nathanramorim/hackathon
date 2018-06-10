<?php
session_start();


//Autoload
$loader = require 'vendor/autoload.php';


//Configurando a pasta templates
$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

/**
 * Admins Group Routes
 */

// $app->group('/', function () use ($app) {

// 	// $authenticateForRole = function ( $role = 'member' ) {
//     // return function () use ( $role ) {
        
//     //     if ( $role == 'page' ) {
//     //         $app = \Slim\Slim::getInstance();
//     //         $app->flash('error', 'Login required');
//     //         $app->redirect('login');
//     //     }
//     // 	};
// 	// };

	$app->group('/admin',function() use ($app){
		
		$app->get('/home', function() use ($app){
			(new \App\Auth)->index($app,$app->request);
		});	
		$app->get('/logout', function() use ($app){
			(new \App\Auth)->logout($app);
		});
	});

	
	$app->get('/procriativo',function() use ($app){
		$app->render('google-longitude-latitude.php');
	});

	$app->get('/',function() use ($app){
		(new \App\Auth)->userAuth($app,$app->request);
	});

	$app->get('/mapa',function() use ($app){
		$app->render('admin/map.php');
	});

	$app->post('/',function() use ($app){
		(new \App\Auth)->userAuth($app,$app->request);
	});

// });



//Rodando aplicação
$app->run();