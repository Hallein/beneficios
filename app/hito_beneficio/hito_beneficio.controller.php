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
	public function getAllByBeneficio($ben_id, $eta_id){

		//$ben_id = desencriptar($ben_id);

		$datos = $this->hito_beneficio->getAllByBeneficio($ben_id);
		//$ultima_etapa = $this->etapa_beneficio->getUltimaEtapa($ben_id);
		$hitos = $this->hito_beneficio->getHitosByEtapa($eta_id);

		ob_start();
		include HITO_BENEFICIO . '/_create.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function store($data){

		//$data['ben_id'] = desencriptar($data['ben_id']);

		$data = filtrar_variables($data);

		$required = array('ben_id', 'fecha', 'hito_id');
		if(hay_variables_vacias($data, $required)){
			return $datos['respuesta'] = respuesta('warning', '', 'Por favor complete todos los campos');
		}
		
		$data['rut'] 		= $_SESSION['session']['US_RUT'];

		if(!valida_fecha($data['fecha'])){
			return $datos['respuesta'] = respuesta('warning', '', 'La fecha ingresada es inválida');
		}

		$fecha 				= DateTime::createFromFormat('d/m/Y', $data['fecha']);
		$data['fecha']		= $fecha->format('Y-m-d');

		$datos = $this->hito_beneficio->store($data);
		return $datos['respuesta'];
	}

	public function destroy($ben_id, $hito_id){

		$datos = $this->hito_beneficio->destroy($ben_id, $hito_id);
		return $datos['respuesta'];
	}

}