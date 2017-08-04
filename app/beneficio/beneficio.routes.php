<?php

$app->group('/beneficios', function () {

	/* Ruta que trae todos los beneficios */
	$this->get('', function ($request, $response, $args) {

		$json = $this->beneficio->index();

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que trae un beneficio dado su id */
	$this->get('/{id}', function ($request, $response, $args) {

		$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
		$json = $this->beneficio->show($id);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que trae el formulario para crear un beneficio */
	$this->get('/create/new', function ($request, $response, $args) {

		$json = $this->beneficio->create();

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que trae el formulario para editar un beneficio dado su id */
	$this->get('/edit/{id}', function ($request, $response, $args) {

		$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
		$json = $this->beneficio->edit($id);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que actualiza un beneficio según su id */
	$this->post('/update', function ($request, $response, $args) {
		$data = $request->getParsedBody(); //Campos: empresa, estado, nombre, id, tipo
		$json = $this->beneficio->update($data);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que elimina un beneficio según su id */
	$this->post('/delete/{id}', function ($request, $response, $args) {

		$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
		$json = $this->beneficio->destroy($id);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que guarda un nuevo beneficio */
	$this->post('/store', function ($request, $response, $args) {
		$data = $request->getParsedBody(); //Campos: empresa, nombre, rut, tipo
		$json = $this->beneficio->store($data);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que cambia el estado de un beneficio */
	$this->post('/rechazar/{id}', function ($request, $response, $args) {

		$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
		$json = $this->beneficio->rechazarBeneficio($id);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Ruta que elimina un beneficio */
	$this->post('/eliminar/{id}', function ($request, $response, $args) {

		$id = filter_var($args['id'], FILTER_SANITIZE_STRING);
		$json = $this->beneficio->eliminarBeneficio($id);

		$response->write(json_encode($json));	
		return $response;
	});

})->add($login);

//POST $data = $request->getParsedBody();
//filter_var($data['user'], FILTER_SANITIZE_STRING);