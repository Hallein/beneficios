<?php

$app->group('/usuario', function(){

	$this->get('/edit', function ($request, $response, $args) {

		$json = $this->usuario->edit();

		$response->write(json_encode($json));
		return $response;
	});

	$this->post('/update', function ($request, $response, $args) {

		$data = $request->getParsedBody(); //Campos: pass, newpass1, newpass2
		$json = $this->usuario->update($data);

		$response->write(json_encode($json));
		return $response;
	});

});