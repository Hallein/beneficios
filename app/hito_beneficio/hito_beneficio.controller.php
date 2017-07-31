<?php

class HitoBeneficioController{

	private $hito_beneficio;
	private $etapa_beneficio;
	private $beneficio;

	public function __construct($db){
		$this->hito_beneficio 	= new HitoBeneficio($db);
		$this->etapa_beneficio 	= new EtapaBeneficio($db);
		$this->beneficio 	= new Beneficio($db);
	}

	/* Retorna los hitos de la última etapa de un beneficio*/
	public function getAllByBeneficio($ben_id){
		$datos = $this->hito_beneficio->getAllByBeneficio($ben_id);
		$ultima_etapa = $this->etapa_beneficio->getUltimaEtapa($ben_id);
		$hitos = $this->hito_beneficio->getHitosByEtapa($ultima_etapa);

		ob_start();
		include HITO_BENEFICIO . '/_create.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function store($data){
		$data = filtrar_variables($data);

		$required = array('ben_id', 'detalle', 'fecha', 'hito_id');
		if(hay_variables_vacias($data, $required)){
			return $datos['respuesta'] = respuesta('warning', '', 'Por favor complete todos los campos');
		}
		
		$data['rut'] 		= $_SESSION['session']['US_RUT'];

		$fecha 				= DateTime::createFromFormat('d/m/Y', $data['fecha']);
		$data['fecha']		= $fecha->format('Y-m-d');

		$datos = $this->hito_beneficio->store($data);
		return $datos['respuesta'];
	}

}