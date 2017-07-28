<?php

class HitoBeneficioController{

	private $hito_beneficio;
	private $beneficio;

	public function __construct($db){
		$this->hito_beneficio 	= new HitoBeneficio($db);
		$this->beneficio 	= new Beneficio($db);
	}

	/* Retorna los hitos de la última etapa de un beneficio*/
	public function getAllByBeneficio($ben_id){
		$datos = $this->hito_beneficio->getAllByBeneficio($ben_id);
		$ultima_etapa = $this->beneficio->getUltimaEtapa($ben_id);
		$hitos = $this->hito_beneficio->getHitosByEtapa($ultima_etapa);

		ob_start();
		include HITO_BENEFICIO . '/_create.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function store($data){
		//realizar tratamiento de rut
		$data['rut'] 		= $_SESSION['session']['US_RUT'];
		$data['hito_id'] 	= filter_var($data['hito_id'], FILTER_SANITIZE_STRING);
		$data['ben_id'] 	= filter_var($data['ben_id'], FILTER_SANITIZE_STRING);
		$data['fecha'] 		= filter_var($data['fecha'], FILTER_SANITIZE_STRING);
		$data['detalle'] 	= filter_var($data['detalle'], FILTER_SANITIZE_STRING);

		$datos = $this->hito_beneficio->store($data);
		return $datos['respuesta'];
	}

}