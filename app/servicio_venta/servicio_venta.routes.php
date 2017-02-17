<?php

$app->group('/servicios/venta', function(){

	$this->get('', function ($request, $response, $args) {

		$json = $this->servicio_venta->index();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/show/{id}', function ($request, $response, $args) {

		$id = $args['id'];
		$json = $this->servicio_venta->show($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/create', function ($request, $response, $args) {

		$json = $this->servicio_venta->create();

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/store', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->servicio_venta->store($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/edit/{id}', function ($request, $response, $args) {

		$json = $this->servicio_venta->edit($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/update', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->servicio_venta->update($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/destroy/{id}', function ($request, $response, $args) {
		
		$id = $args['id'];
		$json = $this->servicio_venta->destroy($id);

		$response->write(json_encode($json));
		return $response;
	});

});