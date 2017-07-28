<?php

/****************************************************************************
*	index 		muestra todos los registros 								*
*	show 		muestra un registro segun el id 							*
*	create 		muestra el formulario para crear un nuevo registro 			*
*	store 		guarda un nuevo registro 									*
*	edit 		muestra el formulario para editar un registro segun el id 	*
*	update 		actualiza un registro segun el id 							*
*	destroy 	elimina un registro segun el id 							*
*****************************************************************************/
class BeneficioController{

	private $beneficio; 
	private $persona;
	private $tipo_beneficio;
	private $hito_beneficio;
	private $etapa_beneficio;

	public function __construct($db){
		$this->beneficio 		= new Beneficio($db);
		$this->persona 			= new Persona($db);
		$this->tipo_beneficio 	= new TipoBeneficio($db);
		$this->hito_beneficio 	= new HitoBeneficio($db);
		$this->etapa_beneficio 	= new EtapaBeneficio($db);
	}

	public function index(){
		
		$datos = $this->beneficio->getAll();

		ob_start();
		include BENEFICIO . '/_getAll.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function show($id){
		
		$datos = $this->beneficio->show($id);
		$hitos = $this->beneficio->showHitos($id);

		$HE = array();
		$id_hito = '';
		foreach($hitos['hitos'] as $etapa){
			if($etapa['ETA_ID']!=$id_hito){
				$id_hito = $etapa['ETA_ID'];
				$array_etapa = array( 'id'	 => $etapa['ETA_ID'],
									'nombre' => $etapa['ETA_NOMBRE'],
									'hitos'  => array());
				foreach($hitos['hitos'] as $hito){
					if($hito['ETA_ID']==$id_hito){
						$array_hito = array( 'id'	 	=> $hito['HITO_ID'],
											'nombre' 	=> $hito['HITO_NOMBRE'],
											'fecha'  	=> $hito['HB_FECHA'],
											'detalle' 	=> $hito['HB_DETALLE']);
						$array_etapa['hitos'][] = $array_hito;
					}
				}
				$HE[] = $array_etapa;
			}
		}
		ob_start();
		include BENEFICIO . '/_show.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function create(){
		//devolver formulario
	}

	public function store($data){
		//realizar tratamiento de rut
		$data['id'] 			= filter_var($data['id'], FILTER_SANITIZE_STRING);
		$data['tipo_beneficio'] = filter_var($data['tipo_beneficio'], FILTER_SANITIZE_STRING);
		$data['empresa'] 		= filter_var($data['empresa'], FILTER_SANITIZE_STRING);
		$data['estado'] 		= filter_var($data['estado'], FILTER_SANITIZE_STRING);
		$data['rut'] 			= filter_var($data['rut'], FILTER_SANITIZE_STRING);
		$data['nombre'] 		= filter_var($data['nombre'], FILTER_SANITIZE_STRING);

		$datos = $this->persona->store($data);
		if($datos['respuesta']['status'] === 'success'){
			$datos = $this->beneficio->store($data);
		}
		return $datos['respuesta'];
	}

	public function edit($id){
		$datos = $this->beneficio->show($id);
		$datos['tipo_beneficio'] = $this->tipo_beneficio->getAll($id);

		ob_start();
		include BENEFICIO . '/_edit.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function update($data){
		//realizar tratamiento de rut
		$data['id'] 			= filter_var($data['id'], FILTER_SANITIZE_STRING);
		$data['tipo_beneficio'] = filter_var($data['tipo'], FILTER_SANITIZE_STRING);
		$data['empresa'] 		= filter_var($data['empresa'], FILTER_SANITIZE_STRING);
		$data['estado'] 		= filter_var($data['estado'], FILTER_SANITIZE_STRING);
		$data['nombre'] 		= filter_var($data['nombre'], FILTER_SANITIZE_STRING);

		$datos = $this->beneficio->update($data);

		if($datos['respuesta']['status'] === 'success'){
			$persona = $this->persona->showByBeneficio($data['id']);
			$persona['PER_NOMBRE'] = $data['nombre'];
			$datos['respuesta']['persona'] = $this->persona->update($persona);
		}

		
		return $datos['respuesta'];
	}

	public function destroy($id){
		//Destruir los hito_beneficio
		//Destruir las etapa_beneficio
		//Destruir el beneficio

	}

}