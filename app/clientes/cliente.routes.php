<?php
//crear grupo

	$app->get('/clientes', function ($request, $response, $args) {

		$controller = new ClientesController($this->db);
		$clientes = $controller->getAll();

		$response->write(json_encode($clientes));
		return $response;
	});