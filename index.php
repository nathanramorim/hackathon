<?php
session_start();

//Autoload
$loader = require 'vendor/autoload.php';


//Configurando a pasta templates
$app = new \Slim\Slim(array(
    'templates.path' => 'views'
));


/**
 *  Default Route
 */
$app->get('/',function() use ($app){
	(new \App\Auth)->userAuth($app,$app->request);
});

$app->post('/',function() use ($app){
	(new \App\Auth)->userAuth($app,$app->request);
});

/**
 * Admins Group Routes
 */
$app->group('/admin',function() use ($app){
	
	$app->get('/home', function() use ($app){
		(new \App\Auth)->index($app,$app->request);
	});	
	$app->get('/logout', function() use ($app){
		(new \App\Auth)->logout($app);
	});

	$app->group('/chamados', function() use ($app){

		$app->get('/listar', function() use ($app){
			(new \Controllers\Chamados)->listar($app);
		});

		$app->get('/cadastrar', function() use ($app){
			(new \Controllers\Chamados)->addNew($app,$app->request);
		});

		$app->post('/cadastrar', function() use ($app){
			(new \Controllers\Chamados)->addNew($app,$app->request);
		});

	});
	$app->group('/agentes', function() use ($app){

		$app->get('/listar', function() use ($app){
			(new \Controllers\Agentes)->listar($app);
		});

		$app->get('/cadastrar', function() use ($app){
			(new \Controllers\Agentes)->addNew($app,$app->request);
		});

		$app->post('/cadastrar', function() use ($app){
			(new \Controllers\Agentes)->addNew($app,$app->request);
		});

		$app->post('/location', function() use ($app){
			(new \Controllers\Agentes)->getLocation($app,$app->request);
		});

	});
});


$app->get('/procriativo',function() use ($app){
	$app->render('google-longitude-latitude.php');
});

/**
 * Route Map
 */
$app->get('/mapa',function() use ($app){
	$app->render('admin/map.php');
});



// });



//Rodando aplicação
$app->run();