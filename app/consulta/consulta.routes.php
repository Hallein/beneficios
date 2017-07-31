<?php

$app->group('/consulta', function () {

	$this->get('/{empresa}/{rut}', function ($request, $response, $args) {

		$empresa = $args['empresa'];
		$rut = $args['rut'];

		$json = $this->consulta->consultaBeneficio($empresa, $rut); //Campos: empresa, rut

		$response->write(json_encode($json));	
		return $response;
	});

	$this->get('/{empresa}/', function ($request, $response, $args) {

		return json_encode(respuesta('error', '', 'Por favor complete los campos solicitados'));
	});

});

