<?php

/* Ruta que cambia el estado de una etapa */
$app->post('/etapa/finalizar/{id}', function ($request, $response, $args) {

	$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
	$json = $this->etapa_beneficio->finalizarEtapa($id);

	$response->write(json_encode($json));	
	return $response;
});