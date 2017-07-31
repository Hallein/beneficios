<?php

function respuesta($status, $titulo = '', $mensaje = ''){
	$respuesta = array();
	$respuesta['status'] = $status;
	$respuesta['message']['title'] = $titulo;
	$respuesta['message']['body'] = $mensaje;
	$respuesta['message']['timeout'] = 2;

	return $respuesta;
}

function encriptar($cadena){
    $key='#mimamamemima';
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted;
 
}
 
function desencriptar($cadena){
     $key='#mimamamemima';
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;
}	

function filtrar_variables($data){
	foreach($data as $key => $variable) {
		$data[$key] = filter_var($variable, FILTER_SANITIZE_STRING);
	}
	
	return $data;
}

function hay_variables_vacias($data, $required){
	$error = false;
	foreach($required as $field) {
		if (empty($data[$field])) {
		$error = true;
		}
	}

	if ($error) {
		return true;
	} else {
		return false;
	}
}