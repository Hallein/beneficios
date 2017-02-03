<?php
//crear grupo

	$app->get('/clientes', function ($request, $response, $args) {

		//$controller = new ClientesController($this->db);
		$controller = new ClientesController('hola');
		$clientes = $controller->getAll();

		$response->write(json_encode($clientes));
		return $response;
	});

	$app->get('/clientes/nuevo', function ($request, $response, $args) {

		//$controller = new ClientesController($this->db);
		$controller = new ClientesController('hola');
		$clientes = $controller->create();

		$response->write(json_encode($clientes));
		return $response;
	});