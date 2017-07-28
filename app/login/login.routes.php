<?php

$app->post('/login', function ($request, $response, $args){
	$data = $request->getParsedBody();

	$rut = filter_var($data['rut'], FILTER_SANITIZE_STRING);
	$pass = filter_var($data['pass'], FILTER_SANITIZE_STRING);

	$sql = $this->db->prepare('	SELECT 	US_RUT, US_NOMBRE, US_CLAVE 
								FROM 	USUARIO 
								WHERE 	US_RUT = :rut ');

	$sql->bindParam(':rut', $rut);

	if($sql->execute()){
		$usuario = $sql->fetch();
		if($usuario){
			//Si existe el usuario, verificamos las contraseñas
			$hash = new passwordHash();
			$pass_correcta = $hash->check_password($pass, $usuario['US_CLAVE']);

			if($pass_correcta){
				//Si la contraseña es correcta, guardamos el usuario en una sesión
				$_SESSION['session'] = $usuario;
				$datos['respuesta'] = respuesta('success', 'OK', 'Identificación exitosa');
				
			}else{
				$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'Usuario o contraseña incorrectos');
			}

		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'Usuario o contraseña incorrectos');
		}
	}
	else{
		$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'Error de conexión');
	}
	return json_encode($datos['respuesta']);
 	
});

$app->post('/logout', function ($request, $response, $args){
	session_unset();
	session_destroy();
	return json_encode(respuesta('success'));
});