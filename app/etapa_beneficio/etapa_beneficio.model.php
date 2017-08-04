<?php

class EtapaBeneficio{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function showEtapas($id){
		$query = $this->db->prepare('
				SELECT 		B.BEN_ID, 
							E.ETA_ID, 
							E.ETA_NOMBRE
				FROM 		BENEFICIO B
				INNER JOIN	ETAPA_BENEFICIO EB
				ON 			EB.BEN_ID = B.BEN_ID
				INNER JOIN 	ETAPA E 
				ON 			E.ETA_ID = EB.ETA_ID
				WHERE 		B.BEN_ID = :id
				ORDER BY 	ETA_ID DESC
		');

		$query -> bindParam(':id', $id);

		$query -> execute();

		$etapas = $query->fetchAll();
		
		return $etapas;
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

	public function getUltimaEtapa($id){
		$query = $this->db->prepare('
			SELECT 		E.ETA_ID
            FROM 		ETAPA E
            WHERE 		E.ETA_ID = 	(
                                        SELECT 		EB.ETA_ID
                                        FROM 		ETAPA_BENEFICIO EB
                                        WHERE		EB.BEN_ID = :id
                                        ORDER BY	EB.ETA_ID DESC
                                        LIMIT 1
                                    )
		');

		$query->bindParam(':id', $id);

		$query->execute();
		$datos = $query->fetch();	

		return $datos['ETA_ID'];
	}

	public function finalizarEtapa($id, $etapa){
		$datos = array();

		if($etapa == 6){
			//Finalizar beneficio
			$query = $this->db->prepare('	UPDATE 	BENEFICIO 
											SET 	BEN_ESTADO = 3 
											WHERE 	BEN_ID = :id ');

			$query -> bindParam(':id', 		$id);
			if($query -> execute()){
			$datos['respuesta'] = respuesta('success', '', 'Beneficio finalizado correctamente');
			}else{
				$datos['respuesta'] = respuesta('success', 'Ocurrió un error', 'No fue posible finalizar el beneficio');
			}

			return $datos;
		}

		$query = $this->db->prepare('	UPDATE 	ETAPA_BENEFICIO 
										SET 	EB_ESTADO = 2,
												EB_FECHAFIN = sysdate()
										WHERE 	BEN_ID = :id
										AND 	ETA_ID = :etapa');

		$query -> bindParam(':id', 		$id);
		$query -> bindParam(':etapa', 	$etapa);

		if($query -> execute()){

			//Insertar siguiente etapa
			$query = $this->db->prepare(' 	
					INSERT INTO ETAPA_BENEFICIO(ETA_ID, BEN_ID, EB_FECHAINI, EB_ESTADO) 
					VALUES(:etapa, :ben_id, sysdate(), 1) ');
			$nueva_etapa = ($etapa + 1);
			$query -> bindParam(':etapa', 	$nueva_etapa);
			$query -> bindParam(':ben_id', 	$id);

			$query -> execute();
			$datos['respuesta'] = respuesta('success', '', 'Etapa finalizada correctamente');
			
		}else{
			$datos['respuesta'] = respuesta('success', 'Ocurrió un error', 'No fue posible finalizar la etapa');
		}

		return $datos;
	}

	public function deleteEtapasByBeneficio($ben_id){
		$query = $this->db->prepare('
						DELETE FROM ETAPA_BENEFICIO		
						WHERE 		BEN_ID = :ben_id
			');

		$query -> bindParam(':ben_id', $ben_id);
		$query -> execute();

		return;
	}

}