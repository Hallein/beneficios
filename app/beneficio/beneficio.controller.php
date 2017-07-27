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
		$hitos = $this->beneficio->showHitos($id);

		$HE = array();
		$id_hito = '';
		foreach($hitos['hitos'] as $etapa){
			if($etapa['ETA_ID']!=$id_hito){
				$id_hito = $etapa['ETA_ID'];
				$array_etapa = array( 'id'	 => $etapa['ETA_ID'],
									'nombre' => $etapa['ETA_NOMBRE'],
									'hitos'  => array());
				foreach($hitos['hitos'] as $hito){
					if($hito['ETA_ID']==$id_hito){
						$array_hito = array( 'id'	 	=> $hito['HITO_ID'],
											'nombre' 	=> $hito['HITO_NOMBRE'],
											'fecha'  	=> $hito['HB_FECHA'],
											'detalle' 	=> $hito['HB_DETALLE']);
						$array_etapa['hitos'][] = $array_hito;
					}
				}
				$HE[] = $array_etapa;
			}
		}
		ob_start();
		include BENEFICIO . '/_show.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

}

/* 
	La idea es hacer un loop de etapas, dibujándolas una por una,
	y por cada etapa, hacer un loop con los hitos, dibujándolos donde corresponda
	ETAPA
		HITO
		HITO
		HITO
	ETAPA
		HITO
	ETAPA
*/

/* Hitos de un beneficio

SELECT 		B.BEN_ID, H.ETA_ID, HB.HITO_ID, H.HITO_NOMBRE
FROM 		BENEFICIO B
INNER JOIN 	HITO_BENEFICIO HB
ON			HB.BEN_ID = B.BEN_ID
INNER JOIN	HITO H
ON 			H.HITO_ID = HB.HITO_ID
WHERE 		B.BEN_ID = 1
ORDER BY 	H.ETA_ID ASC, HB.HITO_ID ASC

*/

/* Etapas de un beneficio

SELECT 		B.BEN_ID, EB.ETA_ID, E.ETA_NOMBRE
FROM 		BENEFICIO B
INNER JOIN 	ETAPA_BENEFICIO EB
ON 			EB.BEN_ID = B.BEN_ID
INNER JOIN	ETAPA E
ON 			E.ETA_ID = EB.ETA_ID
WHERE		B.BEN_ID = 1

*/

/* ETAPAS E HITOS DE UN BENEFICIO

SELECT 		B.BEN_ID, H.ETA_ID, E.ETA_NOMBRE, HB.HITO_ID, H.HITO_NOMBRE
FROM 		BENEFICIO B
INNER JOIN 	HITO_BENEFICIO HB
ON			HB.BEN_ID = B.BEN_ID
INNER JOIN	HITO H
ON 			H.HITO_ID = HB.HITO_ID
INNER JOIN	ETAPA E
ON			E.ETA_ID = H.ETA_ID
WHERE 		B.BEN_ID = 1
ORDER BY 	H.ETA_ID ASC, HB.HITO_ID ASC

*/