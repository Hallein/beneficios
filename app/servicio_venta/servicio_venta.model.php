<?php
	class ServicioVenta{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();

			$query = $this->db->prepare('SELECT * FROM venta');			
			$query->execute();

			$datos['ventas'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM venta WHERE ID_SERVICIO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['venta'] = $query -> fetch();
				if($datos['venta']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe la venta';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe la venta';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO venta(	TIPO_PAGO, 
															NOMBRE_SERVICIO, 
															TIPO_SERVICIO, 
															ESTADO_SERVICIO) 
												VALUES(		:tipo_pago, 
															:nombre, 
															:tipo_servicio, 
															:estado)');

			$query -> bindParam(':tipo_pago', 		$data['TIPO_PAGO']);
			$query -> bindParam(':nombre', 			$data['NOMBRE_SERVICIO']);
			$query -> bindParam(':tipo_servicio', 	$data['TIPO_SERVICIO']);
			$query -> bindParam(':estado', 			$data['ESTADO_SERVICIO']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Venta registrada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar la venta';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	venta 
											SET 	TIPO_PAGO = :vacordado, 
													NOMBRE_SERVICIO = :lentrega, 
													TIPO_SERVICIO = :lretiro, 
													ESTADO_SERVICIO = :flimite
											WHERE 	ID_SERVICIO = :id');
											
			$query -> bindParam(':tipo_pago', 		$data['TIPO_PAGO']);
			$query -> bindParam(':nombre', 			$data['NOMBRE_SERVICIO']);
			$query -> bindParam(':tipo_servicio', 	$data['TIPO_SERVICIO']);
			$query -> bindParam(':estado', 			$data['ESTADO_SERVICIO']);
			$query -> bindParam(':id', 				$data['ID_SERVICIO']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Venta modificada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar la venta';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM venta WHERE ID_SERVICIO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Venta eliminada correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar la venta';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}