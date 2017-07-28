<?php

class HitoBeneficio{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAllByBeneficio($ben_id){
		$datos = array();
		$query = $this->db->prepare('
				SELECT 		HB.HITO_ID,
							HB.BEN_ID,
							HB.HB_FECHA,
							HB.HB_DETALLE,
							H.HITO_NOMBRE
				FROM 		HITO_BENEFICIO HB
				INNER JOIN 	HITO H
				ON 			H.HITO_ID = HB.HITO_ID
				INNER JOIN 	ETAPA E 
				ON 			E.ETA_ID = H.ETA_ID
				AND 		E.ETA_ID = (
										SELECT 		E.ETA_ID
				                        FROM 		ETAPA E
				                        WHERE 		E.ETA_ID = 	(
				                                                    SELECT 		EB.ETA_ID
				                                                    FROM 		ETAPA_BENEFICIO EB
				                                                    WHERE		EB.BEN_ID = :ben_id
				                                                    ORDER BY	EB.ETA_ID DESC
				                                                    LIMIT 1
				                                                )
				    					)					
				WHERE 		HB.BEN_ID = :ben_id
			');

		$query->bindParam(':ben_id', $ben_id);

		if($query -> execute()){
			$datos['hito_beneficio'] = $query->fetchAll();
			$datos['respuesta'] = respuesta('success');
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No hay hitos');
		}
		return $datos;

	}

	public function getHitosByEtapa($etapa){
		$query = $this->db->prepare('
				SELECT 		H.HITO_ID,
							H.HITO_NOMBRE
				FROM 		HITO H
				WHERE 		H.ETA_ID = :eta_id
			');

		$query -> bindParam(':eta_id', $etapa);

		$query -> execute();
		$hitos = $query->fetchAll();

		return $hitos;
	}

	public function store($data){
		$datos = array();
		/* Verificar si el hito ingresado existe */
		$query = $this->db->prepare('	
				SELECT 	HB.HITO_ID
				FROM 	HITO_BENEFICIO HB
				WHERE	HB.HITO_ID = :hito_id
				AND 	HB.BEN_ID = :ben_id 
			');

		$query -> bindParam(':hito_id', $data['hito_id']);
		$query -> bindParam(':ben_id', 	$data['ben_id']);

		$query -> execute();
		$hito = $query->fetch();

		if($hito['HITO_ID']){ //ya existe el hito
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'El hito para esta etapa ya existe');
			return $datos;
		}

		$query = $this->db->prepare('	
				INSERT INTO HITO_BENEFICIO(HITO_ID, US_RUT, BEN_ID, HB_FECHA, HB_DETALLE) 
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