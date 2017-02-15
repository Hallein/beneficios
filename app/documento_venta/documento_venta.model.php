<?php
	class DocumentoVenta{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('	SELECT 		dv.*, 
														cli.RUT_PERSONA, 
														cli.NOMBRE_PERSONA,
														cli.APATERNO_PERSONA,
														cli.AMATERNO_PERSONA,
														s.ID_SERVICIO,
														s.NOMBRE_SERVICIO
											FROM 		documento_venta dv
											INNER JOIN 	cliente cli 
											ON 			dv.RUT_PERSONA = cli.RUT_PERSONA
											INNER JOIN 	venta s 
											ON 			dv.ID_SERVICIO = s.ID_SERVICIO');
			$query->execute();

			$datos = array();
			$datos['documentos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM documento_venta WHERE ID_VENTA = :id');
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

			$query -> bindParam(':fecha', 	$data['FECHA_VENTA']);
			$query -> bindParam(':valor', 	$data['VALOR_VENTA']);
			$query -> bindParam(':iva', 	$data['IVA']);
			$query -> bindParam(':folio', 	$data['FOLIO']);
			$query -> bindParam(':nserie', 	$data['NUMERO_SERIE']);

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
											SET 	FECHA_VENTA = :fecha, 
													VALOR_VENTA = :valor, 
													IVA = :iva, 
													FOLIO = :folio, 
													NUMERO_SERIE = :nserie 
											WHERE 	ID_VENTA = :id');

			$query -> bindParam(':fecha', 	$data['FECHA_VENTA']);
			$query -> bindParam(':valor', 	$data['VALOR_VENTA']);
			$query -> bindParam(':iva', 	$data['IVA']);
			$query -> bindParam(':folio', 	$data['FOLIO']);
			$query -> bindParam(':nserie', 	$data['NUMERO_SERIE']);
			$query -> bindParam(':id', 		$data['ID_VENTA']);

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