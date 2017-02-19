<?php 
	
	$login = function($request, $response, $next){
	//antes
	if( !isset($_SESSION) || empty($_SESSION) ){
		//crear nueva sesion
		$data = $request->getParsedBody();

		$rut = filter_var($data['user'], FILTER_SANITIZE_STRING);
		$password = filter_var($data['pass'], FILTER_SANITIZE_STRING);

		$sql = $this->db->prepare('	SELECT 	RUT_PERSONA, 
											NOMBRE_PERSONA, 
											APATERNO_PERSONA, 
											AMATERNO_PERSONA, 
											CARGO, 
											CONTRASENA 
									FROM 	trabajador 
									WHERE 	RUT_PERSONA = :rut');

		$sql->bindParam(':rut', $rut);
		$sql->execute();
		$usuario = $sql->fetch();	
		$response->getBody()->write('BEFORE');
			$response = $next($request, $response);
			$response->getBody()->write('AFTER');
		$password = hash('sha256', $password);
		if(strcmp($password, $usuario['CONTRASENA']) == 0){
			$_SESSION['usuario'] = $usuario;
			$response->getBody()->write('BEFORE');
			$response = $next($request, $response);
			$response->getBody()->write('AFTER');

		}else{
			$msg['status'] = 'Error';
			$msg['message'] = 'Contraseña incorrecta';
			$response->getBody->write('pinche wei');
		}
	}
	return $response;
};