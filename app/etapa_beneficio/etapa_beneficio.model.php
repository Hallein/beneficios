<?php

class EtapaBeneficio{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function store($data){
		$datos = array();
		$query = $this->db->prepare('	INSERT INTO PERSONA(PER_RUT, PER_NOMBRE ) 
										VALUES(:rut, :nombre) ');

		$query -> bindParam(':rut', 	$data['rut']);
		$query -> bindParam(':nombre', 	$data['nombre']);

		if($query -> execute()){
			$datos['respuesta'] = respuesta('success', '', 'Persona registrada correctamente');
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No se pudo registrar a la persona');
		}
		return $datos;
	}

	public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	PERSONA 
											SET 	PER_NOMBRE = :nombre,
											WHERE 	PER_RUT = :rut');

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