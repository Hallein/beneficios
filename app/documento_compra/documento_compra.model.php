<?php
	class DocumentoCompra{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('	SELECT 		dc.ID_COMPRA,
														dc.RUT_PROVEEDOR,
														dc.FECHA_COMPRA, 
														dc.VALOR_COMPRA, 
														dc.IVA, 
														dc.FOLIO, 
														dc.NUMERO_SERIE,
														p.RUT_PROVEEDOR, 
														p.NOMBRE_PROVEEDOR
											FROM 		documento_compra dc
											INNER JOIN 	proveedor p 
											ON 			dc.RUT_PROVEEDOR = p.RUT_PROVEEDOR');

			$query->execute();

			$datos = array();
			$datos['documentos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('	SELECT 		dc.ID_COMPRA,
														dc.RUT_PROVEEDOR,
														dc.FECHA_COMPRA, 
														dc.VALOR_COMPRA, 
														dc.IVA, 
														dc.FOLIO,
													 	dc.NUMERO_SERIE,
													 	pro.RUT_PROVEEDOR, 
														pro.NOMBRE_PROVEEDOR,
														co.COMUNA,
														(dc.VALOR_COMPRA + dc.IVA) AS TOTAL
										 	FROM 		documento_compra dc
										 	INNER JOIN 	proveedor pro 
											ON 			dc.RUT_PROVEEDOR = pro.RUT_PROVEEDOR
                                            INNER JOIN	comuna co
                                            ON			co.ID_COMUNA = pro.ID_COMUNA
										 	WHERE 		dc.ID_COMPRA = :id');

			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['documento'] = $query -> fetch();
				if($datos['documento']){
					$datos['respuesta']['status'] = 'success';

					//Sacamos los insumos asociados
					$query = $this->db->prepare('	SELECT 		dc.ID_COMPRA,
																dc.ID_INSUMO,
																dc.CANTIDAD_COMPRADA,
																dc.SUB_TOTAL_COMPRA,
																i.NOMBRE_INSUMO,
																i.PRECIO_COMPRA AS PRECIO_UNITARIO,
																( dc.SUB_TOTAL_COMPRA - ROUND( dc.SUB_TOTAL_COMPRA * 0.19 )) AS IMPORTE,
																ROUND( dc.SUB_TOTAL_COMPRA * 0.19 ) AS IVA
													FROM 		detalle_compra dc
													INNER JOIN 	insumo i 
													ON 			i.ID_INSUMO = dc.ID_INSUMO
                                                    INNER JOIN 	documento_compra doc
                                                    ON			doc.ID_COMPRA = dc.ID_COMPRA
                                                    WHERE		doc.ID_COMPRA = :id_compra');

					$query -> bindParam(':id_compra', $id);	
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
			$query = $this->db->prepare('INSERT INTO documento_compra(	RUT_PROVEEDOR,
																		FECHA_COMPRA, 
																		VALOR_COMPRA, 
																		IVA, 
																		FOLIO, 
																		NUMERO_SERIE) 	
															VALUES(		:rut,
																		:fecha_compra, 
																		:valor_compra, 
																		:iva, 
																		:folio, 
																		:numero_serie)'); //Folio y numero de serie podrian ser autoincrementales

			$query -> bindParam(':rut', 			$data['RUT_PROVEEDOR']);
			$query -> bindParam(':fecha_compra', 	$data['FECHA_COMPRA']);
			$query -> bindParam(':valor_compra', 	$data['VALOR_COMPRA']);
			$query -> bindParam(':iva', 			$data['IVA']);
			$query -> bindParam(':folio', 			$data['FOLIO']);
			$query -> bindParam(':numero_serie', 	$data['NUMERO_SERIE']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Documento registrado correctamente';
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
			$query = $this->db->prepare('	UPDATE 	documento_compra 
											SET 	RUT_PROVEEDOR = :rut,
													FECHA_COMPRA = :fecha, 
													VALOR_COMPRA = :valor, 
													IVA = :iva, 
													FOLIO = :folio, 
													NUMERO_SERIE = :nserie 
											WHERE 	ID_COMPRA = :id');

			$query -> bindParam(':rut', 	$data['RUT_PROVEEDOR']);
			$query -> bindParam(':fecha', 	$data['FECHA_COMPRA']);
			$query -> bindParam(':valor', 	$data['VALOR_COMPRA']);
			$query -> bindParam(':iva', 	$data['IVA']);
			$query -> bindParam(':folio', 	$data['FOLIO']);
			$query -> bindParam(':nserie', 	$data['NUMERO_SERIE']);
			$query -> bindParam(':id', 		$data['ID_COMPRA']);

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
			$query = $this->db->prepare('DELETE FROM documento_compra WHERE ID_COMPRA = :id');
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