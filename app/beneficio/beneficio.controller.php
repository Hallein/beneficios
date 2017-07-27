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

	public function __construct($db){
		$this->beneficio = new Beneficio($db);
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

		ob_start();
		include BENEFICIO . '/_show.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos;
	}

}