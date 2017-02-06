<?php
	class Proveedor{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();
			$query = $this->db->prepare('SELECT * FROM proveedor');			
			$query->execute();

			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM proveedor WHERE RUT_PROVEEDOR = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['proveedor'] = $query -> fetch();
				$datos['status'] = 'Success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el proveedor';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO proveedor VALUES(:rut, :nombre, :ciudad, :pais)');
			$query -> bindParam(':rut', $data['RUT_PROVEEDOR']);
			$query -> bindParam(':nombre', $data['NOMBRE_PROVEEDOR']);
			$query -> bindParam(':ciudad', $data['CIUDAD_PROVEEDOR']);
			$query -> bindParam(':pais', $data['PAIS_PROVEEDOR']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Proveedor registrado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar al proveedor';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE proveedor SET NOMBRE_PROVEEDOR = :nombre, CIUDAD_PROVEEDOR = :ciudad, PAIS_PROVEEDOR = :pais WHERE RUT_PROVEEDOR = :rut');			
			$query -> bindParam(':nombre', $data['NOMBRE_PROVEEDOR']);
			$query -> bindParam(':ciudad', $data['CIUDAD_PROVEEDOR']);
			$query -> bindParam(':pais', $data['PAIS_PROVEEDOR']);
			$query -> bindParam(':rut', $data['RUT_PROVEEDOR']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Proveedor modificado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar al proveedor';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM proveedor WHERE RUT_PROVEEDOR = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Proveedor eliminado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar al proveedor';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}