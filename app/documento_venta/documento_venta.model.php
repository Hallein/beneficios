<?php
	class DocumentoVenta{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('	SELECT 		dv.ID_VENTA,
														dv.RUT_PERSONA,
														dv.ID_SERVICIO,
														dv.FECHA_VENTA, 
														dv.VALOR_VENTA, 
														dv.IVA, 
														dv.FOLIO,
													 	dv.NUMERO_SERIE,
														cli.RUT_PERSONA, 
														cli.NOMBRE_PERSONA,
														cli.APATERNO_PERSONA,
														cli.AMATERNO_PERSONA,
														s.ID_SERVICIO,
														s.NOMBRE_SERVICIO,
                                                        co.COMUNA
											FROM 		documento_venta dv
											INNER JOIN 	cliente cli 
											ON 			dv.RUT_PERSONA = cli.RUT_PERSONA
											INNER JOIN 	venta s 
											ON 			dv.ID_SERVICIO = s.ID_SERVICIO
                                            INNER JOIN	comuna co
                                            ON			cli.ID_COMUNA = co.ID_COMUNA');
			$query->execute();

			$datos = array();
			$datos['documentos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('	SELECT 		dv.ID_VENTA,
														dv.RUT_PERSONA,
														dv.ID_SERVICIO,
														dv.FECHA_VENTA, 
														dv.VALOR_VENTA, 
														dv.IVA, 
														dv.FOLIO,
													 	dv.NUMERO_SERIE,
													 	cli.RUT_PERSONA, 
														cli.NOMBRE_PERSONA,
														cli.APATERNO_PERSONA,
														cli.AMATERNO_PERSONA,
														cli.EMPRESA,
														cli.DIRECCION_PERSONA,
														co.COMUNA,
														s.ID_SERVICIO,
														s.NOMBRE_SERVICIO,
														(dv.VALOR_VENTA + dv.IVA) AS TOTAL
										 	FROM 		documento_venta dv
										 	INNER JOIN 	cliente cli 
											ON 			dv.RUT_PERSONA = cli.RUT_PERSONA
											INNER JOIN 	venta s 
											ON 			dv.ID_SERVICIO = s.ID_SERVICIO
                                            LEFT JOIN	detalle_venta det
                                            ON			det.ID_VENTA = dv.ID_VENTA
                                            LEFT JOIN 	insumo i
                                            ON			i.ID_INSUMO = det.ID_INSUMO
                                            INNER JOIN	comuna co
                                            ON			co.ID_COMUNA = cli.ID_COMUNA
										 	WHERE 		dv.ID_VENTA = :id');

			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['documento'] = $query -> fetch();
				if($datos['documento']){
					$datos['respuesta']['status'] = 'success';

					//Sacamos los insumos asociados
					$query = $this->db->prepare('	SELECT 		dv.ID_VENTA,
																dv.ID_INSUMO,
																dv.CANTIDAD_VENDIDA,
																dv.SUB_TOTAL_VENTA,
																i.NOMBRE_INSUMO,
																i.PRECIO_VENTA AS PRECIO_UNITARIO,
																ROUND( ((i.PRECIO_VENTA) * 0.19) ) AS IVA_UNITARIO,
																dv.SUB_TOTAL_VENTA AS IMPORTE,
																ROUND( dv.SUB_TOTAL_VENTA * 0.19 ) AS IVA
													FROM 		detalle_venta dv
													INNER JOIN 	insumo i 
													ON 			i.ID_INSUMO = dv.ID_INSUMO
                                                    INNER JOIN 	documento_venta doc
                                                    ON			doc.ID_VENTA = dv.ID_VENTA
                                                    WHERE		doc.ID_VENTA = :id_venta');

					$query -> bindParam(':id_venta', $id);	
					if($query -> execute()){
						$datos['documento']['insumos'] = $query -> fetchAll();
						if(!$datos['documento']['insumos']){

						}
					}

				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el documento';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el documento';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO documento_venta(	RUT_PERSONA,
																		ID_SERVICIO,
																		FECHA_VENTA, 
																		VALOR_VENTA, 
																		IVA, 
																		FOLIO,
																	 	NUMERO_SERIE) 
															VALUES( 	:rut,
																		:id_servicio,
																		:fecha, 
																		:valor, 
																		:iva, 
																		:folio, 
																		:nserie)');

			$query -> bindParam(':rut', 		$data['RUT_PERSONA']);
			$query -> bindParam(':id_servicio', $data['ID_SERVICIO']);
			$query -> bindParam(':fecha', 		$data['FECHA_VENTA']);
			$query -> bindParam(':valor', 		$data['VALOR_VENTA']);
			$query -> bindParam(':iva', 		$data['IVA']);
			$query -> bindParam(':folio', 		$data['FOLIO']);
			$query -> bindParam(':nserie', 		$data['NUMERO_SERIE']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Documento registrada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar el documento';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	documento_venta 
											SET 	RUT_PERSONA = :rut,
													ID_SERVICIO = :id_servicio,
													FECHA_VENTA = :fecha, 
													VALOR_VENTA = :valor, 
													IVA = :iva, 
													FOLIO = :folio, 
													NUMERO_SERIE = :nserie 
											WHERE 	ID_VENTA = :id_venta');

			$query -> bindParam(':rut', 		$data['RUT_PERSONA']);
			$query -> bindParam(':id_servicio', $data['ID_SERVICIO']);
			$query -> bindParam(':fecha', 		$data['FECHA_VENTA']);
			$query -> bindParam(':valor', 		$data['VALOR_VENTA']);
			$query -> bindParam(':iva', 		$data['IVA']);
			$query -> bindParam(':folio', 		$data['FOLIO']);
			$query -> bindParam(':nserie', 		$data['NUMERO_SERIE']);
			$query -> bindParam(':id_venta', 	$data['ID_VENTA']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Documento modificada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar el documento';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM documento_venta WHERE ID_VENTA = :id');
			$query -> bindParam(':id', $data['id']);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Documento eliminada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar el documento';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}