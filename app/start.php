<?php

require '../../vendor/autoload.php';	// industrial/public/api

$config['displayErrorDetails'] = true;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "beneficios";

//Instancia de Slim
$app = new Slim\App(["settings" => $config]);
$container = $app->getContainer();

//Configuración de la BD con PDO dentro del container
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    try{
	    $pdo = new PDO("mysql:host=" . $db['host'] . ";
				    	dbname=" . $db['dbname'], 
				    	$db['user'], 
				    	$db['pass'],
				    	array('charset'=>'utf8'));

		$pdo->query("SET CHARACTER SET utf8");
		$pdo->query("SET lc_time_names = 'es_ES'");
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);    	
    }
    catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
    return $pdo;
};

session_start();

require 'partials.php';
require 'models.php';
require 'controllers.php';
require 'middlewares.php';
require 'routes.php';
require 'container.php';
require 'seeder.php';
require 'libs/password_hash.php';
require 'libs/funciones.php';

/*========== PRUEBAS DE PASSWORD HASH ==========*/
$app->get('/test/{password}', function($request, $response, $args){
	try {
		$password = $args['password'];
		$hash = new passwordHash();
		$newpass = $hash->hash($password);

		$response->write($newpass);
    	return $response;

	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
})->add($login);

$app->get('/verify/{pass}/{hash}', function($request, $response, $args){
	try {
		$hash = $args['hash'];
		$pass = $args['pass'];
		$verify = new passwordHash();
		$newpass = $verify->check_password($pass, $hash);
		$success = array();

		if($newpass){
			$success['success'] = 1;
		}else{
			$success['success'] = 0;
		}

		$response->write(json_encode($success));
    	return $response;

	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
})->add($login);
/*========== FIN PRUEBAS PASSWORD HASH ==========*/

$app->run();