<?php
	class DocumentoCompra{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('	SELECT 		dc.*, 
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
			$query = $this->db->prepare('SELECT * FROM documento_compra WHERE ID_COMPRA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['documento'] = $query -> fetch();
				if($datos['documento']){
					$datos['respuesta']['status'] = 'success';					
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
											SET 	FECHA_COMPRA = :fecha, 
													VALOR_COMPRA = :valor, 
													IVA = :iva, 
													FOLIO = :folio, 
													NUMERO_SERIE = :nserie 
											WHERE 	ID_COMPRA = :id');

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