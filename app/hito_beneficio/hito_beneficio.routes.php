<?php

/* Muestra los hitos de la última etapa de un beneficio*/
$app->get('/hitos/{ben_id}', function ($request, $response, $args) {

	$ben_id = $args['ben_id'];
	$json = $this->hito_beneficio->getAllByBeneficio($ben_id);

	$response->write(json_encode($json));	
	return $response;
});

/* Registra un hito con el id del beneficio */
$app->post('/hitos/store', function ($request, $response, $args) {

	$data = $request->getParsedBody();
	$json = $this->hito_beneficio->store($data);

	$response->write(json_encode($json));	
	return $response;
});