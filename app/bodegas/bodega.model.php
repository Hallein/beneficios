<?php
	class Bodega{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT * FROM bodega');
			$query->execute();
			$datos['bodegas'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM bodega WHERE ID_BODEGA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['bodega'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe la bodega';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('	INSERT INTO bodega(	RUT_PERSONA, 
																NOMBRE_BODEGA, 
																DIRECCION_BODEGA, 
																TIPO_BODEGA ) 
													VALUES(		:rut, 
																:nombre, 
																:direccion, 
																:tipo)');

			$query -> bindParam(':rut', 		$data['RUT_PERSONA']);
			$query -> bindParam(':nombre', 		$data['NOMBRE_BODEGA']);
			$query -> bindParam(':direccion', 	$data['DIRECCION_BODEGA']);
			$query -> bindParam(':tipo', 		$data['TIPO_BODEGA']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Bodega registrada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar la bodega';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	bodega 
											SET 	RUT_PERSONA = :rut, 
													NOMBRE_BODEGA = :nombre,
													DIRECCION_BODEGA = :direccion, 
													TIPO_BODEGA = :tipo 
											WHERE 	ID_INSUMO = :id');

			$query -> bindParam(':rut', 		$data['RUT_PERSONA']);
			$query -> bindParam(':nombre', 		$data['NOMBRE_BODEGA']);
			$query -> bindParam(':direccion', 	$data['DIRECCION_BODEGA']);
			$query -> bindParam(':tipo', 		$data['TIPO_BODEGA']);
			$query -> bindParam(':id', 			$data['ID_INSUMO']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Bodega modificada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar la bodega';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM bodega WHERE ID_BODEGA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Bodega eliminada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar la bodega';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}