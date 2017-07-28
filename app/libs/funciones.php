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