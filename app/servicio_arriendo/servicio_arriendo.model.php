<?php
	class ServicioArriendo{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();

			$query = $this->db->prepare('SELECT * FROM arriendo');			
			$query->execute();

			$datos['arriendos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM arriendo WHERE ID_SERVICIO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['arriendo'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el arriendo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO arriendo(	FECHA_INICIO, 
																FECHA_TERMINO, 
																DETALLE, 
																NOMBRE_SERVICIO, 
																TIPO_SERVICIO, 
																ESTADO_SERVICIO) 
													VALUES(		:fecha_inicio, 
																:fecha_termino, 
																:detalle, 
																:nombre, 
																:tipo, 
																:estado)');

			$query -> bindParam(':fecha_inicio', 	$data['FECHA_INICIO']);
			$query -> bindParam(':fecha_termino', 	$data['FECHA_TERMINO']);
			$query -> bindParam(':detalle', 		$data['DETALLE']);
			$query -> bindParam(':nombre', 			$data['NOMBRE_SERVICIO']);
			$query -> bindParam(':tipo', 			$data['TIPO_SERVICIO']);
			$query -> bindParam(':estado', 			$data['ESTADO_SERVICIO']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Arriendo registrado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar el arriendo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	arriendo 
											SET 	FECHA_INICIO = :fecha_inicio, 
													FECHA_TERMINO = :fecha_termino, 
													DETALLE = :detalle, 
													NOMBRE_SERVICIO = :nombre, 
													TIPO_SERVICIO = :tipo, 
													ESTADO_SERVICIO = :estado
											WHERE 	ID_SERVICIO = :id');
											
			$query -> bindParam(':fecha_inicio', 	$data['FECHA_INICIO']);
			$query -> bindParam(':fecha_termino', 	$data['FECHA_TERMINO']);
			$query -> bindParam(':detalle', 		$data['DETALLE']);
			$query -> bindParam(':nombre', 			$data['NOMBRE_SERVICIO']);
			$query -> bindParam(':tipo', 			$data['TIPO_SERVICIO']);
			$query -> bindParam(':estado', 			$data['ESTADO_SERVICIO']);
			$query -> bindParam(':id', 				$data['ID_SERVICIO']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Arriendo modificado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar el arriendo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM arriendo WHERE ID_SERVICIO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Arriendo eliminado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar el arriendo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}