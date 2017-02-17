<?php

$app->group('/clientes', function(){

	$this->get('', function ($request, $response, $args) {

		$json = $this->clientes->index();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/show/{id}', function ($request, $response, $args) {

		$id = $args['id'];
		$json = $this->clientes->show($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/create', function ($request, $response, $args) {

		$json = $this->clientes->create();

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/store', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->clientes->store($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/edit/{id}', function ($request, $response, $args) {

		$json = $this->clientes->edit($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/update', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->clientes->update($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/destroy/{id}', function ($request, $response, $args) {
		
		$id = $args['id'];
		$json = $this->clientes->destroy($id);

		$response->write(json_encode($json));
		return $response;
	});

})->add($login);