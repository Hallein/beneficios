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

		//$id = desencriptar($id);
		
		$datos = $this->beneficio->show($id);
		$etapas = $this->etapa_beneficio->showEtapas($id);
		$hitos = $this->hito_beneficio->showHitos2($id);

		ob_start();
		include BENEFICIO . '/_show.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function create(){
		$datos = array();
		$datos['tipo_beneficio'] = $this->tipo_beneficio->getAll();

		ob_start();
		include BENEFICIO . '/_create.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function store($data){
		$data = filtrar_variables($data);	

		$required = array('tipo', 'empresa', 'rut', 'nombre');
		if(hay_variables_vacias($data, $required)){
			return $datos['respuesta'] = respuesta('warning', '', 'Por favor complete todos los campos');
		}

		//realizar tratamiento de rut
		$data['rut'] = ObtieneRutSinDigito($data['rut']);

		//Verificar si la persona existe - show
		$persona = $this->persona->show($data['rut']);

		//Verificar beneficio activo
		$activo = $this->beneficio->consultarBeneficioActivo($data['rut']);
		if($activo['BEN_ESTADO'] == 1){
			return $datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'La persona ya tiene un beneficio activo');
		}

		if($persona['PER_RUT'] != $data['rut']){
			$datos = $this->persona->store($data);
			if($datos['respuesta']['status'] === 'success'){
				$datos = $this->beneficio->store($data);
			}
		}else{

			$datos = $this->beneficio->store($data);
		}	

		return $datos['respuesta'];
	}

	public function edit($id){

		//$id = desencriptar($id);

		$datos= $this->beneficio->show($id);
		$datos['tipo_beneficio'] = $this->tipo_beneficio->getAll();

		ob_start();
		include BENEFICIO . '/_edit.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function update($data){

		//$data['id'] = desencriptar($data['id']);

		$data = filtrar_variables($data);
		
		//realizar tratamiento de rut		

		$required = array('id', 'tipo', 'empresa', 'estado', 'nombre');
		if(hay_variables_vacias($data, $required)){
			return $datos['respuesta'] = respuesta('warning', '', 'Por favor complete todos los campos');
		}

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

	public function rechazarBeneficio($id){

		//$id = desencriptar($id);

		$datos = $this->beneficio->rechazarBeneficio($id);
		return $datos['respuesta'];
	}

}