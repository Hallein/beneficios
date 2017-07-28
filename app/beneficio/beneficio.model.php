<?php
/* 
 * Estados de los beneficios:
 * 1: En Proceso
 * 2: Rechazado
 * 3: Finalizado
 */
class Beneficio{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAll(){

		$query = $this->db->prepare('	
			SELECT  	B.BEN_ID, 
						B.TIPBEN_ID,
						B.PER_RUT,
						B.BEN_EMPRESA,
			CASE 		B.BEN_ESTADO
				WHEN 	1 THEN "En Proceso"
				WHEN 	2 THEN "Rechazado"
				WHEN 	3 THEN "Finalizado"
			END AS 		ESTADO,
						B.BEN_ESTADO,
						T.TIPBEN_NOMBRE,
						P.PER_NOMBRE,
						(
							SELECT 		E.ETA_NOMBRE
							FROM 		ETAPA E
							WHERE 		E.ETA_ID = 	(
														SELECT 		EB.ETA_ID
														FROM 		ETAPA_BENEFICIO EB
														WHERE		EB.BEN_ID = B.BEN_ID
                                						ORDER BY	EB.ETA_ID DESC
                                						LIMIT 1
													)
						) ETAPA_ACTUAL
			FROM 		BENEFICIO B
			INNER JOIN 	TIPO_BENEFICIO T
			ON 			T.TIPBEN_ID = B.TIPBEN_ID
			INNER JOIN 	PERSONA P
			ON 			P.PER_RUT = B.PER_RUT
			ORDER BY	B.BEN_ID DESC
		');

		$query->execute();

		if($query->execute()){
			$datos['beneficio'] = $query->fetchAll();	
			$datos['respuesta'] = respuesta('success');
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'La consulta no se realizó correctamente');
		}

		return $datos;
	}

	public function show($id){

		$query = $this->db->prepare('
			SELECT  	B.BEN_ID, 
						B.TIPBEN_ID,
						B.PER_RUT,
						B.BEN_EMPRESA,
			CASE 		B.BEN_ESTADO
				WHEN 	1 THEN "En Proceso"
				WHEN 	2 THEN "Rechazado"
				WHEN 	3 THEN "Finalizado"
			END AS 		ESTADO,
						B.BEN_ESTADO,
						T.TIPBEN_NOMBRE,
						P.PER_NOMBRE,
						(
							SELECT 		E.ETA_NOMBRE
							FROM 		ETAPA E
							WHERE 		E.ETA_ID = 	(
														SELECT 		EB.ETA_ID
														FROM 		ETAPA_BENEFICIO EB
														WHERE		EB.BEN_ID = B.BEN_ID
                                						ORDER BY	EB.ETA_ID DESC
                                						LIMIT 1
													)
						) ETAPA_ACTUAL,
						(
							SELECT 		EB.ETA_ID
							FROM 		ETAPA_BENEFICIO EB
							WHERE		EB.BEN_ID = :id
    						ORDER BY	EB.ETA_ID DESC
    						LIMIT 1
						) ID_ETAPA_ACTUAL
			FROM 		BENEFICIO B
			INNER JOIN 	TIPO_BENEFICIO T
			ON 			T.TIPBEN_ID = B.TIPBEN_ID
			INNER JOIN 	PERSONA P
			ON 			P.PER_RUT = B.PER_RUT
            WHERE 		B.BEN_ID = :id
		');

		$query -> bindParam(':id', $id);

		if($query -> execute()){

			$datos['beneficio'] = $query->fetch();

			if($datos['beneficio']){
				$datos['respuesta'] = respuesta('success');					
			}else{
				$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No existe el beneficio');
			}
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No existe el beneficio consultado');
		}
		return $datos;
	}

	public function showHitos($id){

		$query = $this->db->prepare('
			SELECT 		B.BEN_ID, H.ETA_ID, E.ETA_NOMBRE, HB.HITO_ID, H.HITO_NOMBRE, HB.HB_FECHA, HB.HB_DETALLE
			FROM 		BENEFICIO B
			INNER JOIN 	HITO_BENEFICIO HB
			ON			HB.BEN_ID = B.BEN_ID
			INNER JOIN	HITO H
			ON 			H.HITO_ID = HB.HITO_ID
			INNER JOIN	ETAPA E
			ON			E.ETA_ID = H.ETA_ID
			WHERE 		B.BEN_ID = :id
			ORDER BY 	H.ETA_ID DESC, HB.HITO_ID ASC
		');

		$query -> bindParam(':id', $id);

		if($query->execute()){
			$datos['hitos'] = $query->fetchAll();	
			$datos['respuesta'] = respuesta('success');
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'La consulta no se realizó correctamente');
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

	public function store($data){
		$datos = array();
		$query = $this->db->prepare(' 	
			INSERT INTO BENEFICIO(TIPBEN_ID, PER_RUT, BEN_EMPRESA, BEN_ESTADO) 
			VALUES(:tipo_beneficio, :rut, :empresa, 1) ');
		
		$query -> bindParam(':tipo_beneficio', 	$data['tipo_beneficio']);
		$query -> bindParam(':rut', 			$data['rut']);
		$query -> bindParam(':empresa', 		$data['empresa']);

		if($query -> execute()){
			//Insertar primera etapa
			$id_ben = $this->db->lastInsertId();
			$datos['respuesta'] = respuesta('success', $id_ben, 'Beneficio registrado correctamente ');
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No se pudo registrar el beneficio');
		}
		return $datos;
	}

	public function update($data){
		$datos = array();
		$query = $this->db->prepare('	UPDATE 	BENEFICIO 
										SET 	BEN_EMPRESA = :empresa, 
												TIPBEN_ID = :tipo_beneficio, 
												BEN_ESTADO = :estado 
										WHERE 	BEN_ID = :id');

		$query -> bindParam(':empresa', 		$data['empresa']);
		$query -> bindParam(':tipo_beneficio', 	$data['tipo_beneficio']);
		$query -> bindParam(':estado', 			$data['estado']);
		$query -> bindParam(':id', 				$data['id']);

		if($query -> execute()){
			$datos['respuesta'] = respuesta('success', '', 'Beneficio actualizado correctamente');
		}else{
			$datos['respuesta'] = respuesta('success', 'Ocurrió un error', 'No fue posible actualizar el beneficio');
		}

		return $datos;
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

	public function showHitos2($id){
		$query = $this->db->prepare('
				SELECT 		E.ETA_ID, 
							H.HITO_ID, 
							H.HITO_NOMBRE, 
							HB.HB_FECHA, 
							HB.HB_DETALLE
				FROM 		HITO_BENEFICIO HB
				INNER JOIN 	HITO H
				ON 			H.HITO_ID = HB.HITO_ID
				INNER JOIN 	ETAPA E 
				ON 			E.ETA_ID = H.ETA_ID
				WHERE 		HB.BEN_ID = :id
		');

		$query -> bindParam(':id', $id);

		$query -> execute();

		$hitos = $query->fetchAll();

		return $hitos;
	}

		
}

/* Obtener todas las etapas de un beneficio

SELECT 		B.BEN_ID, E.ETA_NOMBRE
FROM 		BENEFICIO B
INNER JOIN	ETAPA_BENEFICIO EB
ON 			EB.BEN_ID = B.BEN_ID
INNER JOIN 	ETAPA E 
ON 			E.ETA_ID = EB.ETA_ID
WHERE 		B.BEN_ID = 2

*/

/* Obtener todos los hitos de un beneficio por etapa

SELECT 		E.ETA_ID, H.HITO_ID, H.HITO_NOMBRE
FROM 		HITO_BENEFICIO HB
INNER JOIN 	HITO H
ON 			H.HITO_ID = HB.HITO_ID
INNER JOIN 	ETAPA E 
ON 			E.ETA_ID = H.ETA_ID
WHERE 		HB.BEN_ID = 1

*/