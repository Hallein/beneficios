<?php
	$login = function($request, $response, $next){
	//antes
	if( !isset($_SESSION) || empty($_SESSION) ){
		//crear nueva sesion
		$data = $request->getParsedBody();

		$u = filter_var($data['user'], FILTER_SANITIZE_STRING);
		$p = filter_var($data['pass'], FILTER_SANITIZE_STRING);

		$sql = $this->db->prepare('SELECT RUT_PERSONA, NOMBRE_PERSONA, APATERNO_PERSONA, AMATERNO_PERSONA, CARGO, CONTRASENA FROM trabajador WHERE RUT_PERSONA = :u');
		$sql->bindParam(':u', $u);
		$sql->execute();
		$usuario = $sql->fetch();	

		$p = hash('sha256', $p);

		if(strcmp($p, $usuario['CONTRASENA']) == 0){
			$_SESSION['usuario'] = $usuario;
			$response = $next($request, $response);

		}else{
			$msg['status'] = 'Error';
			$msg['message'] = 'Contraseña incorrecta';
		}
		return $response;
	}
	//pasar a ruta
	//despues
}