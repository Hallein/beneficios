<?php

$app->group('/contratos', function(){

	$this->get('', function ($request, $response, $args) {

		$json = $this->contratos->index();

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/show/{id}', function ($request, $response, $args) {

		$id = $args['id'];
		$json = $this->contratos->show($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/create', function ($request, $response, $args) {

		$json = $this->contratos->create();

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/store', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->contratos->store($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->get('/edit/{id}', function ($request, $response, $args) {

		$json = $this->contratos->edit($id);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/update', function ($request, $response, $args) {

		$data = $request->getParsedBody();
		$json = $this->contratos->update($data);

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/destroy/{id}', function ($request, $response, $args) {
		
		$id = $args['id'];
		$json = $this->contratos->destroy($id);

		$response->write(json_encode($json));
		return $response;
	});

});