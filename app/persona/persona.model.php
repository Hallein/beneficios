<?php

class Persona{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function show($rut){
		$query = $this->db->prepare('	
			SELECT 	PER_RUT,
					PER_NOMBRE
			FROM	PERSONA
			WHERE 	PER_RUT = :rut
		 ');

		$query->bindParam(':rut', 	$rut);

		$query->execute();
		$datos = $query->fetch();
		return $datos;
	}

	public function showByBeneficio($id){
		$query = $this->db->prepare('	
			SELECT 	B.PER_RUT,
					P.PER_NOMBRE
			FROM 	BENEFICIO B
			INNER JOIN PERSONA P 
			ON 		P.PER_RUT = B.PER_RUT
			WHERE 	B.BEN_ID = :id
		 ');

		$query->bindParam(':id', 	$id);

		$query->execute();
		$datos = $query->fetch();
		return $datos;
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

	public function update($persona){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	PERSONA 
											SET 	PER_NOMBRE = :nombre
											WHERE 	PER_RUT = :rut');

			$query -> bindParam(':nombre', 	$persona['PER_NOMBRE']);
			$query -> bindParam(':rut', 	$persona['PER_RUT']);

			if($query -> execute()){
				$datos['respuesta'] = respuesta('success', '', 'Persona actualizada correctamente');
			}else{
				$datos['respuesta'] = respuesta('success', 'Ocurrió un error', 'No fue posible actualizar los datos de la persona');
			}

			return $datos;
		}

}