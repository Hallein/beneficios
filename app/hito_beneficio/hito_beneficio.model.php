<?php

class HitoBeneficio{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function store($data){
		$datos = array();
		$query = $this->db->prepare('	
				INSERT INTO HITO_BENEFICIO(HITO_ID, UD_RUT, BEN_ID, HB_FECHA, HB_DETALLE) 
				VALUES(:hito_id, :rut, :ben_id, :fecha, :detalle) 
			');

		$query -> bindParam(':hito_id', $data['hito_id']);
		$query -> bindParam(':rut', 	$data['rut']);
		$query -> bindParam(':ben_id', 	$data['ben_id']);
		$query -> bindParam(':fecha', 	$data['fecha']);
		$query -> bindParam(':detalle', $data['detalle']);

		if($query -> execute()){
			$datos['respuesta'] = respuesta('success', '', 'Hito ingresado correctamente');
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No se pudo ingresar el hito');
		}
		return $datos;
	}

	public function update($data){
		$datos = array();
		$query = $this->db->prepare('	UPDATE 	HITO_BENEFICIO 
										SET 	HB_FECHA = :fecha, 
												HB_DETALLE = :detalle,
												UD_RUT = :rut 
										WHERE 	HITO_ID = :hito_id
										AND		BEN_ID = :ben_id
									');

		$query -> bindParam(':nombre', $data['nombre']);
		$query -> bindParam(':rut', $data['rut']);

		if($query -> execute()){
			$datos['respuesta'] = respuesta('success', '', 'Persona actualizada correctamente');
		}else{
			$datos['respuesta'] = respuesta('success', 'Ocurrió un error', 'No fue posible actualizar los datos de la persona');
		}

		return $datos;
	}

}