<?php
	class Bodega{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT 	b.ID_BODEGA,
													b.RUT_PERSONA, 
													b.NOMBRE_BODEGA, 
													b.DIRECCION_BODEGA, 
													b.ID_TIPO_BODEGA,
													tp.DESCRIPCION_TIPO_BODEGA AS TIPO_BODEGA
										FROM 		bodega b
										INNER JOIN 	tipo_bodega tp
										ON 			tp.ID_TIPO_BODEGA = b.ID_TIPO_BODEGA');
			$query->execute();
			$datos['bodegas'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT 	b.ID_BODEGA,
													b.RUT_PERSONA, 
													b.NOMBRE_BODEGA, 
													b.DIRECCION_BODEGA, 
													b.ID_TIPO_BODEGA,
													tp.DESCRIPCION_TIPO_BODEGA AS TIPO_BODEGA
										FROM 		bodega b
										INNER JOIN 	tipo_bodega tp
										ON 			tp.ID_TIPO_BODEGA = b.ID_TIPO_BODEGA
										WHERE 		b.ID_BODEGA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['bodega'] = $query -> fetch();
				if($datos['bodega']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe la bodega';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe la bodega';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('	INSERT INTO bodega(	RUT_PERSONA, 
																NOMBRE_BODEGA, 
																DIRECCION_BODEGA, 
																ID_TIPO_BODEGA ) 
													VALUES(		:rut, 
																:nombre, 
																:direccion, 
																:tipo)');

			$query -> bindParam(':rut', 		$data['rut']);
			$query -> bindParam(':nombre', 		$data['nombre']);
			$query -> bindParam(':direccion', 	$data['direccion']);
			$query -> bindParam(':tipo', 		$data['tipo']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Bodega registrada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar la bodega';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	bodega 
											SET 	RUT_PERSONA = :rut, 
													NOMBRE_BODEGA = :nombre,
													DIRECCION_BODEGA = :direccion, 
													ID_TIPO_BODEGA = :tipo 
											WHERE 	ID_INSUMO = :id');

			$query -> bindParam(':rut', 		$data['rut']);
			$query -> bindParam(':nombre', 		$data['nombre']);
			$query -> bindParam(':direccion', 	$data['direccion']);
			$query -> bindParam(':tipo', 		$data['tipo']);
			$query -> bindParam(':id', 			$data['id']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Bodega modificada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar la bodega';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM bodega WHERE ID_BODEGA = :id');
			
			$query -> bindParam(':id', $data['id']);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Bodega eliminada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar la bodega';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}