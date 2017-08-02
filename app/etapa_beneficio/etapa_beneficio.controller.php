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
class EtapaBeneficioController{

	private $etapa_beneficio;

	public function __construct($db){
		$this->etapa_beneficio 	= new EtapaBeneficio($db);
	}

	public function finalizarEtapa($id){

		//$id = desencriptar($id); 

		$etapa = $this->etapa_beneficio->getUltimaEtapa($id);
		$datos = $this->etapa_beneficio->finalizarEtapa($id, $etapa);
		return $datos['respuesta'];
	}

}