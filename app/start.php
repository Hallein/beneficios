<?php

require '../../vendor/autoload.php';	// industrial/public/api

$config['displayErrorDetails'] = true;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "industrial";

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

//Ruta Inicio
$app->get('/inicio', function($request, $response, $args){

	$datos['respuesta'] = $this->estadisticas->index();

	return json_encode($datos['respuesta']);
});


$app->post('/login', function ($request, $response, $args){
	$data = $request->getParsedBody();

	$usuario['rut'] = filter_var($data['user'], FILTER_SANITIZE_STRING);
	$usuario['pass'] = filter_var($data['pass'], FILTER_SANITIZE_STRING);

	//$usuario['pass'] = hash('sha256', $usuario['pass']);
	
	$sql = $this->db->prepare('	SELECT 	RUT_PERSONA, CARGO, CONTRASENA 
								FROM 	TRABAJADOR 
								WHERE 	RUT_PERSONA = :rut 
								AND 	CONTRASENA = :pass');

	$sql->bindParam(':rut', $usuario['rut']);
	$sql->bindParam(':pass', $usuario['pass']);
	if($sql->execute()){
		unset($usuario);
		$usuario = $sql->fetch();
		if($usuario){
			$_SESSION['session'] = $usuario;
			$datos['respuesta']['status'] = 'success';
			$datos['respuesta']['message']['title'] = '¡Listo!';
			$datos['respuesta']['message']['body'] = 'Identificación exitosa';
			$datos['respuesta']['message']['timeout'] = 2;
			$datos['respuesta']['html'] = $this->auth->index();

		}else{
			$datos['respuesta']['status'] = 'error';
			$datos['respuesta']['message']['title'] = 'Error!';
			$datos['respuesta']['message']['body'] = 'Usuario o contraseña incorrectos';
			$datos['respuesta']['message']['timeout'] = 2;	
		}
	}
	else{
		$datos['respuesta']['status'] = 'error';
		$datos['respuesta']['message']['title'] = 'Ocurrió un error';
		$datos['respuesta']['message']['body'] = 'Error de conexión';
		$datos['respuesta']['message']['timeout'] = 2;
	}
	return json_encode($datos['respuesta']);
 	
});

$app->run();