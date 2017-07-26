<?php

$app->get('/consulta/{empresa}/{rut}', function ($request, $response, $args) {

	$empresa = $args['empresa'];
	$rut = $args['rut'];

	$json = $this->consulta->consultaBeneficio($empresa, $rut);

	$response->write(json_encode($json));	
	return $response;
});

//POST $data = $request->getParsedBody();
//filter_var($data['user'], FILTER_SANITIZE_STRING);