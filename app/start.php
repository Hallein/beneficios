<?php

require '../../vendor/autoload.php';	// tesis/public/api

$config['displayErrorDetails'] = true;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "";

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
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);    	
    }
    catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
    return $pdo;
};

require 'partials.php';
require 'models.php';
require 'controllers.php';
require 'routes.php';
require 'container.php';


$app->run();