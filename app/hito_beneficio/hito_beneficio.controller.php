<?php

class HitoBeneficioController{

	private $hito_beneficio;

	public function __construct($db){
		$this->hito_beneficio 	= new HitoBeneficio($db);
	}

	/* Retorna los hitos de la última etapa de un beneficio*/
	public function getAllByBeneficio($ben_id){
		$datos = $this->hito_beneficio->getAllByBeneficio($ben_id);

		ob_start();
		include HITO_BENEFICIO . '/_create.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

}