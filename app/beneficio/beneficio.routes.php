<?php

/* Ruta que trae todos los beneficios */
$app->get('/beneficios', function ($request, $response, $args) {

	$json = $this->beneficio->index();

	$response->write(json_encode($json));	
	return $response;
});

/* Ruta que trae un beneficio dado su id */
$app->get('/beneficios/{id}', function ($request, $response, $args) {

	$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
	$json = $this->beneficio->show($id);

	$response->write(json_encode($json));	
	return $response;
});

//POST $data = $request->getParsedBody();
//filter_var($data['user'], FILTER_SANITIZE_STRING);