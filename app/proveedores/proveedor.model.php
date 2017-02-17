<?php
	class Proveedor{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();
			$query = $this->db->prepare('	SELECT 	RUT_PROVEEDOR,
													NOMBRE_PROVEEDOR,
													CIUDAD_PROVEEDOR,
													PAIS_PROVEEDOR 
											FROM 	proveedor');			
			$query->execute();
			$datos['proveedores'] = $query->fetchAll();

			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('	SELECT 	RUT_PROVEEDOR,
													NOMBRE_PROVEEDOR,
													CIUDAD_PROVEEDOR,
													PAIS_PROVEEDOR 
											FROM 	proveedor 
											WHERE 	RUT_PROVEEDOR = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['proveedor'] = $query -> fetch();
				if($datos['proveedor']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el proveedor';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO proveedor(	RUT_PROVEEDOR,
																NOMBRE_PROVEEDOR,
																CIUDAD_PROVEEDOR,
																PAIS_PROVEEDOR)
													VALUES(		:rut, 
																:nombre, 
																:ciudad, 
																:pais)');

			$query -> bindParam(':rut', 	$data['RUT_PROVEEDOR']);
			$query -> bindParam(':nombre', 	$data['NOMBRE_PROVEEDOR']);
			$query -> bindParam(':ciudad', 	$data['CIUDAD_PROVEEDOR']);
			$query -> bindParam(':pais', 	$data['PAIS_PROVEEDOR']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Proveedor registrado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar al proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	proveedor 
											SET 	NOMBRE_PROVEEDOR = :nombre, 
													CIUDAD_PROVEEDOR = :ciudad, 
													PAIS_PROVEEDOR = :pais 
											WHERE 	RUT_PROVEEDOR = :rut');

			$query -> bindParam(':nombre', 	$data['NOMBRE_PROVEEDOR']);
			$query -> bindParam(':ciudad', 	$data['CIUDAD_PROVEEDOR']);
			$query -> bindParam(':pais', 	$data['PAIS_PROVEEDOR']);
			$query -> bindParam(':rut', 	$data['RUT_PROVEEDOR']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Proveedor modificado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar al proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM proveedor WHERE RUT_PROVEEDOR = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Proveedor eliminado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar al proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}