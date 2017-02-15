<?php
	class Trabajador{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();

			$query = $this->db->prepare('SELECT RUT_PERSONA,
												PREVISION_SOCIAL, 
												PREVISION_SALUD, 
												CARGO, 
												NOMBRE_PERSONA, 
												APATERNO_PERSONA, 
												AMATERNO_PERSONA, 
												FECHA_NACIMIENTO, 
												DIRECCION_PERSONA, 
												TELEFONO_PERSONA, 
												EMAIL_PERSONA 
										FROM 	trabajador');
			$query->execute();

			$datos['trabajadores'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM trabajador WHERE RUT_PERSONA = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['trabajador'] = $query -> fetch();
				if($datos['trabajador']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el trabajador';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el trabajador';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO trabajador(	PREVISION_SOCIAL, 
																	PREVISION_SALUD, 
																	CARGO, 
																	NOMBRE_PERSONA, 
																	APATERNO_PERSONA, 
																	AMATERNO_PERSONA, 
																	FECHA_NACIMIENTO, 
																	DIRECCION_PERSONA, 
																	TELEFONO_PERSONA, 
																	EMAIL_PERSONA) 
														VALUES(		:social, 
																	:salud, 
																	:cargo, 
																	:nombre, 
																	:apaterno, 
																	:amaterno, 
																	:fecha, 
																	:direccion, 
																	:telefono, 
																	:email)');

			$query -> bindParam(':social', 		$data['PREVISION_SOCIAL']);
			$query -> bindParam(':salud', 		$data['PREVISION_SALUD']);
			$query -> bindParam(':cargo', 		$data['CARGO']);
			$query -> bindParam(':nombre', 		$data['NOMBRE_PERSONA']);
			$query -> bindParam(':apaterno', 	$data['APATERNO_PERSONA']);
			$query -> bindParam(':amaterno', 	$data['AMATERNO_PERSONA']);
			$query -> bindParam(':fecha', 		$data['FECHA_NACIMIENTO']);
			$query -> bindParam(':direccion', 	$data['DIRECCION_PERSONA']);
			$query -> bindParam(':telefono', 	$data['TELEFONO_PERSONA']);
			$query -> bindParam(':email', 		$data['EMAIL_PERSONA']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Trabajador registrado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar el trabajador';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	trabajador 
											SET 	PREVISION_SOCIAL = :social, 
													PREVISION_SALUD = :salud, 
													CARGO = :cargo, 
													NOMBRE_PERSONA = :nombre, 
													APATERNO_PERSONA = :apaterno, 
													AMATERNO_PERSONA = :amaterno, 
													FECHA_NACIMIENTO = :fecha,
													DIRECCION_PERSONA = :direccion,
													TELEFONO_PERSONA = :telefono,
													EMAIL_PERSONA = :email
											WHERE 	RUT_PERSONA = :rut');

			$query -> bindParam(':social', 		$data['PREVISION_SOCIAL']);
			$query -> bindParam(':salud', 		$data['PREVISION_SALUD']);
			$query -> bindParam(':cargo', 		$data['CARGO']);
			$query -> bindParam(':nombre', 		$data['NOMBRE_PERSONA']);
			$query -> bindParam(':apaterno', 	$data['APATERNO_PERSONA']);
			$query -> bindParam(':amaterno', 	$data['AMATERNO_PERSONA']);
			$query -> bindParam(':fecha', 		$data['FECHA_NACIMIENTO']);
			$query -> bindParam(':direccion', 	$data['DIRECCION_PERSONA']);
			$query -> bindParam(':telefono', 	$data['TELEFONO_PERSONA']);
			$query -> bindParam(':email', 		$data['EMAIL_PERSONA']);
			$query -> bindParam(':rut', 		$data['RUT_PERSONA']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Trabajador modificado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar el trabajador';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM trabajador WHERE RUT_PERSONA = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Trabajador eliminado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar el trabajador';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}