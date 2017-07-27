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
						SELECT 		B.BEN_ID, 
									B.TIPBEN_ID,
									B.PER_RUT,
									B.BEN_EMPRESA,
									B.BEN_ESTADO,
									T.TIPBEN_NOMBRE,
									P.PER_NOMBRE
						FROM 		BENEFICIO B
						INNER JOIN 	TIPO_BENEFICIO T
						ON 			T.TIPBEN_ID = B.TIPBEN_ID
						INNER JOIN 	PERSONA P
						ON 			P.PER_RUT = B.PER_RUT
						WHERE 		B.BEN_ID = :id
						');

		$query -> bindParam(':id', $id);

		if($query -> execute()){

			$datos['beneficio'] = $query -> fetch();

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

}