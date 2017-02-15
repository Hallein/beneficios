<?php
	class Vehiculo{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){

			$query = $this->db->prepare('SELECT * FROM vehiculo');
			$query->execute();
			$datos['vehiculos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM vehiculo WHERE NRO_PATENTE = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['vehiculo'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el vehículo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO vehiculo(	ID_BODEGA, 
																MARCA, 
																MODELO, 
																ANHO_FABRICACION, 
																TIPO_VEHICULO, 
																ESTADO_VEHICULO, 
																TIPO_PATENTE) 
													VALUES(		:bodega, 
																:marca, 
																:modelo, 
																:anho, 
																:tipo_vehiculo, 
																:estado, 
																:tipo_patente)');

			$query -> bindParam(':bodega', 			$data['ID_BODEGA']);
			$query -> bindParam(':marca', 			$data['MARCA']);
			$query -> bindParam(':modelo', 			$data['MODELO']);
			$query -> bindParam(':anho', 			$data['ANHO_FABRICACION']);
			$query -> bindParam(':tipo_vehiculo', 	$data['TIPO_VEHICULO']);
			$query -> bindParam(':estado', 			$data['ESTADO_VEHICULO']);
			$query -> bindParam(':tipo_patente', 	$data['TIPO_PATENTE']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Vehículo registrado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar el vehículo';
				$datos['message']['timeout'] = 2;
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
													TIPO_VEHICULO = :tipo_vehiculo, 
													ESTADO_VEHICULO = :estado, 
													TIPO_PATENTE = :tipo_patente 
											WHERE 	NRO_PATENTE = :id');

			$query -> bindParam(':bodega', 			$data['ID_BODEGA']);
			$query -> bindParam(':marca', 			$data['MARCA']);
			$query -> bindParam(':modelo', 			$data['MODELO']);
			$query -> bindParam(':anho', 			$data['ANHO_FABRICACION']);
			$query -> bindParam(':tipo_vehiculo', 	$data['TIPO_VEHICULO']);
			$query -> bindParam(':estado', 			$data['ESTADO_VEHICULO']);
			$query -> bindParam(':tipo_patente', 	$data['TIPO_PATENTE']);
			$query -> bindParam(':id', 				$data['NRO_PATENTE']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Vehículo modificado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar el vehículo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM vehiculo WHERE NRO_PATENTE = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Vehículo eliminado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar el vehículo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}