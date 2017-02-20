<?php

$app->group('/estadisticas', function(){

	$this->get('', function ($request, $response, $args) {

		$json = $this->estadisticas->index();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/top-trabajadores', function ($request, $response, $args) {

		$json = $this->estadisticas->topTrabajadores();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/top-clientes', function ($request, $response, $args) {

		$json = $this->estadisticas->topClientes();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/producto-mas-vendido', function ($request, $response, $args) {

		$json = $this->estadisticas->productoMasVendido();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/promedio-ventas', function ($request, $response, $args) {

		$json = $this->estadisticas->promedioVentas();

		$response->write(json_encode($json));
		return $response;
	});

});