<?php

function respuesta($status, $titulo = '', $mensaje = ''){
	$respuesta = array();
	$respuesta['status'] = $status;
	$respuesta['message']['title'] = $titulo;
	$respuesta['message']['body'] = $mensaje;

	return $respuesta;
}