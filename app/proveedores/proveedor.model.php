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
				$datos['msg'] = 'Proveedor encontrado';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No existe el proveedor';
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO proveedor VALUES(:rut, :nombre, :ciudad, :pais)');
			$query -> bindParam(':rut', $data['RUT_PROVEEDOR']);
			$query -> bindParam(':nombre', $data['NOMBRE_PROVEEDOR]');
			$query -> bindParam(':ciudad', $data['CIUDAD_PROVEEDOR]');
			$query -> bindParam(':pais', $data['PAIS_PROVEEDOR']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Proveedor registrado';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible registrar al proveedor';
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE proveedor SET NOMBRE_PROVEEDOR = :nombre, CIUDAD_PROVEEDOR = :ciudad, PAIS_PROVEEDOR = :pais WHERE RUT_PROVEEDOR = :rut');			
			$query -> bindParam(':nombre', $data['NOMBRE_PROVEEDOR]');
			$query -> bindParam(':ciudad', $data['CIUDAD_PROVEEDOR]');
			$query -> bindParam(':pais', $data['PAIS_PROVEEDOR']);
			$query -> bindParam(':rut', $data['RUT_PROVEEDOR']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Proveedor modificado';	
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible modificar el proveedor';
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM proveedor WHERE RUT_PROVEEDOR = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Proveedor eliminado';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible eliminar al proveedor';
			}
			return $datos;
		}

	}