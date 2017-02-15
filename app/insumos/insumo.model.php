<?php
	class Insumo{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT * FROM insumo');
			$query->execute();

			$datos = array();
			$datos['insumos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM insumo WHERE ID_INSUMO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['insumo'] = $query -> fetch();
				if($datos['insumo']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el insumo';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el insumo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO insumo(NOMBRE_INSUMO, 
															CATEGORIA_INSUMO, 
															SUBCATEGORIA_INSUMO, 
															PRECIO_VENTA, 
															PRECIO_COMPRA) 
												VALUES(		:nombre, 
															:categoria, 
															:subcategoria, 
															:precio_venta, 
															:precio_compra)');

			$query -> bindParam(':nombre', 			$data['NOMBRE_INSUMO']);
			$query -> bindParam(':categoria', 		$data['CATEGORIA_INSUMO']);
			$query -> bindParam(':subcategoria', 	$data['SUBCATEGORIA_INSUMO']);
			$query -> bindParam(':precio_venta', 	$data['PRECIO_VENTA']);
			$query -> bindParam(':precio_compra', 	$data['PRECIO_COMPRA']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Insumo registrado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar el insumo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	insumo 
											SET 	NOMBRE_INSUMO = :nombre, 
													CATEGORIA_INSUMO = :categoria, 
													SUBCATEGORIA_INSUMO = :subcategoria, 
													PRECIO_VENTA = :precio_venta, 
													PRECIO_COMPRA = :precio_compra 
											WHERE 	ID_INSUMO = :id');

			$query -> bindParam(':nombre', 			$data['NOMBRE_INSUMO']);
			$query -> bindParam(':categoria', 		$data['CATEGORIA_INSUMO']);
			$query -> bindParam(':subcategoria', 	$data['SUBCATEGORIA_INSUMO']);
			$query -> bindParam(':precio_venta', 	$data['PRECIO_VENTA']);
			$query -> bindParam(':precio_compra', 	$data['PRECIO_COMPRA']);
			$query -> bindParam(':id', 				$data['ID_INSUMO']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Insumo modificado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar el insumo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM insumo WHERE ID_INSUMO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Insumo eliminado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar el insumo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}