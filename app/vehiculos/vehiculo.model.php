<?php
	class Vehiculo{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){

			$query = $this->db->prepare('	SELECT 		v.NRO_PATENTE,
														v.ID_BODEGA, 
														v.MARCA, 
														v.MODELO, 
														v.ANHO_FABRICACION, 
														v.ID_TIPO_VEHICULO, 
														v.ESTADO_VEHICULO, 
														v.TIPO_PATENTE,
														tv.DESCRIPCION_TIPO_VEHICULO AS TIPO_VEHICULO  
											FROM		vehiculo v
											INNER JOIN 	tipo_vehiculo tv
											ON 			tv.ID_TIPO_VEHICULO = v.ID_TIPO_VEHICULO');
			$query->execute();
			$datos['vehiculos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('	SELECT 		v.NRO_PATENTE,
														v.ID_BODEGA, 
														v.MARCA, 
														v.MODELO, 
														v.ANHO_FABRICACION, 
														v.ID_TIPO_VEHICULO, 
														v.ESTADO_VEHICULO, 
														v.TIPO_PATENTE 
											FROM		vehiculo v
											INNER JOIN 	tipo_vehiculo tv
											ON 			tv.ID_TIPO_VEHICULO = v.ID_TIPO_VEHICULO 
											WHERE		v.NRO_PATENTE = :id');

			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['vehiculo'] = $query -> fetch();
				if($datos['vehiculo']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el vehículo';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el vehículo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO vehiculo(	NRO_PATENTE,
																ID_BODEGA, 
																MARCA, 
																MODELO, 
																ANHO_FABRICACION, 
																ID_TIPO_VEHICULO, 
																ESTADO_VEHICULO, 
																TIPO_PATENTE) 
													VALUES(		:patente,
																:bodega, 
																:marca, 
																:modelo, 
																:anho, 
																:tipo_vehiculo, 
																:estado, 
																:tipo_patente)');

			$query -> bindParam(':patente', 		$data['patente']);
			$query -> bindParam(':bodega', 			$data['bodega']);
			$query -> bindParam(':marca', 			$data['marca']);
			$query -> bindParam(':modelo', 			$data['modelo']);
			$query -> bindParam(':anho', 			$data['anho']);
			$query -> bindParam(':tipo_vehiculo', 	$data['tipo_vehiculo']);
			$query -> bindParam(':estado', 			$data['estado']);
			$query -> bindParam(':tipo_patente', 	$data['tipo_patente']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Vehículo registrado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar el vehículo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	vehiculo 
											SET 	ID_BODEGA = :bodega, 
													MARCA = :marca, 
													MODELO = :modelo, 
													ANHO_FABRICACION = :anho, 
													ID_TIPO_VEHICULO = :tipo_vehiculo, 
													ESTADO_VEHICULO = :estado, 
													TIPO_PATENTE = :tipo_patente 
											WHERE 	NRO_PATENTE = :id');

			$query -> bindParam(':bodega', 			$data['ID_BODEGA']);
			$query -> bindParam(':marca', 			$data['MARCA']);
			$query -> bindParam(':modelo', 			$data['MODELO']);
			$query -> bindParam(':anho', 			$data['ANHO_FABRICACION']);
			$query -> bindParam(':tipo_vehiculo', 	$data['ID_TIPO_VEHICULO']);
			$query -> bindParam(':estado', 			$data['ESTADO_VEHICULO']);
			$query -> bindParam(':tipo_patente', 	$data['TIPO_PATENTE']);
			$query -> bindParam(':id', 				$data['NRO_PATENTE']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Vehículo modificado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar el vehículo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM vehiculo WHERE NRO_PATENTE = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Vehículo eliminado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar el vehículo';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function getBodegas(){
			$query = $this->db->prepare('	SELECT 	ID_BODEGA,
													NOMBRE_BODEGA	  
											FROM	bodega');
			$query->execute();
			$datos = $query->fetchAll();
			return $datos;
		}

	}