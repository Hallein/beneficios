<?php

class Consulta{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function show($empresa, $rut){

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
							WHERE		EB.BEN_ID = B.BEN_ID
    						ORDER BY	EB.ETA_ID DESC
    						LIMIT 1
						) ID_ETAPA_ACTUAL
			FROM 		BENEFICIO B
			INNER JOIN 	TIPO_BENEFICIO T
			ON 			T.TIPBEN_ID = B.TIPBEN_ID
			INNER JOIN 	PERSONA P
			ON 			P.PER_RUT = B.PER_RUT
            WHERE 		B.BEN_EMPRESA LIKE :empresa
            AND 		B.PER_RUT = :rut
		');

		$query -> bindParam(':rut', $rut);
		$query -> bindParam(':empresa', $empresa);

		if($query -> execute()){

			$datos['beneficio'] = $query->fetch();

			if($datos['beneficio']){
				$datos['respuesta'] = respuesta('success');					
			}else{
				$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No existe el beneficio consultado');
			}
		}else{
			$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No se pudo ejecutar la consulta');
		}
		return $datos;
	}

	public function showEtapas($empresa, $rut){
		$query = $this->db->prepare('
				SELECT 		B.BEN_ID, 
							E.ETA_ID, 
							E.ETA_NOMBRE
				FROM 		BENEFICIO B
				INNER JOIN	ETAPA_BENEFICIO EB
				ON 			EB.BEN_ID = B.BEN_ID
				INNER JOIN 	ETAPA E 
				ON 			E.ETA_ID = EB.ETA_ID
				WHERE 		B.BEN_EMPRESA LIKE :empresa
            	AND 		B.PER_RUT = :rut
				ORDER BY 	ETA_ID DESC
		');

		$query -> bindParam(':rut', $rut);
		$query -> bindParam(':empresa', $empresa);

		$query -> execute();

		$etapas = $query->fetchAll();
		
		return $etapas;
	}

	public function showHitos2($empresa, $rut){
		$query = $this->db->prepare('
				SELECT 		E.ETA_ID, 
							H.HITO_ID, 
							H.HITO_NOMBRE, 
							DATE_FORMAT(HB.HB_FECHA, "%d/%m/%Y") AS HB_FECHA, 
							HB.HB_DETALLE
				FROM 		HITO_BENEFICIO HB
				INNER JOIN 	HITO H
				ON 			H.HITO_ID = HB.HITO_ID
				INNER JOIN 	ETAPA E 
				ON 			E.ETA_ID = H.ETA_ID
                INNER JOIN	BENEFICIO B 
                ON 			B.BEN_ID = HB.BEN_ID
				WHERE 		B.BEN_EMPRESA LIKE :empresa
            	AND 		B.PER_RUT = :rut
		');

		$query -> bindParam(':rut', $rut);
		$query -> bindParam(':empresa', $empresa);

		$query -> execute();

		$hitos = $query->fetchAll();

		return $hitos;
	}

}