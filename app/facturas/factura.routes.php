<?php

$app->group('/facturas', function(){

	$this->get('', function ($request, $response, $args) {

		$json = $this->facturas->index();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/show/{id}', function ($request, $response, $args) {

		$id = $args['id'];
		$json = $this->facturas->show($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/create', function ($request, $response, $args) {

		$json = $this->facturas->create();

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/store', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->facturas->store($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/edit/{id}', function ($request, $response, $args) {

		$json = $this->facturas->edit($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/update', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->facturas->update($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/destroy/{id}', function ($request, $response, $args) {
		
		$id = $args['id'];
		$json = $this->facturas->destroy($id);

		$response->write(json_encode($json));
		return $response;
	});

});