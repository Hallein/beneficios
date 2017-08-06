<?php

$app->group('/hitos', function () {

	/* Muestra los hitos de una etapa de un beneficio*/
	$this->get('/{ben_id}/{eta_id}', function ($request, $response, $args) {

		$ben_id = filter_var($args['ben_id'], FILTER_SANITIZE_STRING);
		$eta_id = filter_var($args['eta_id'], FILTER_SANITIZE_STRING);

		$json = $this->hito_beneficio->getAllByBeneficio($ben_id, $eta_id);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Registra un hito con el id del beneficio */
	$this->post('/store', function ($request, $response, $args) {

		$data = $request->getParsedBody(); //Campos: ben_id, detalle, fecha, hito_id
		$json = $this->hito_beneficio->store($data);

		$response->write(json_encode($json));	
		return $response;
	});

	/* Elimina un hito dado su id y el del beneficio asociado */
	$this->get('/destroy/{ben_id}/{hito_id}', function ($request, $response, $args) {

		$ben_id = filter_var($args['ben_id'], FILTER_SANITIZE_STRING);
		$hito_id = filter_var($args['hito_id'], FILTER_SANITIZE_STRING);

		$json = $this->hito_beneficio->destroy($ben_id, $hito_id);

		$response->write(json_encode($json));	
		return $response;
	});

})->add($login);