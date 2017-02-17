<?php
	class Cliente{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT RUT_PERSONA,
												NOMBRE_PERSONA, 
												APATERNO_PERSONA, 
												AMATERNO_PERSONA,
												FECHA_NACIMIENTO,
												DIRECCION_PERSONA,
												TELEFONO_PERSONA,
												EMAIL_PERSONA,
												COMUNA 
										FROM 	cliente');
			$query->execute();
			$datos['clientes'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT RUT_PERSONA,
												NOMBRE_PERSONA, 
												APATERNO_PERSONA, 
												AMATERNO_PERSONA,
												FECHA_NACIMIENTO,
												DIRECCION_PERSONA,
												TELEFONO_PERSONA,
												EMAIL_PERSONA,
												COMUNA 
										FROM 	cliente 
										WHERE 	RUT_PERSONA = :rut');

			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['cliente'] = $query -> fetch();
				if($datos['cliente']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el cliente';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el cliente consultado';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO cliente(	RUT_PERSONA, 
																NOMBRE_PERSONA, 
																APATERNO_PERSONA, 
																AMATERNO_PERSONA,
																FECHA_NACIMIENTO,
																DIRECCION_PERSONA,
																TELEFONO_PERSONA,
																EMAIL_PERSONA,
																COMUNA ) 
													VALUES	(	:rut, 
																:nombres, 
																:apaterno, 
																:amaterno, 
																:fnac, 
																:direccion, 
																:telefono, 
																:email, 
																:comuna)'); //Falta EMPRESA y CIUDAD
			
			$query -> bindParam(':rut', 		$data['rut']);
			$query -> bindParam(':nombres', 	$data['nombre']);
			$query -> bindParam(':apaterno', 	$data['apaterno']);
			$query -> bindParam(':amaterno', 	$data['amaterno']);
			$query -> bindParam(':fnac', 		$data['fechanac']);
			$query -> bindParam(':direccion', 	$data['direccion']);
			$query -> bindParam(':telefono', 	$data['telefono']);
			$query -> bindParam(':email', 		$data['email']);
			$query -> bindParam(':comuna', 		$data['comuna']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Cliente registrado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No se pudo registrar al cliente';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	cliente 
											SET 	NOMBRE_PERSONA = :nombres, 
													APATERNO_PERSONA = :apaterno, 
													AMATERNO_PERSONA = :amaterno, 
													FECHA_NACIMIENTO = :fecha, 
													DIRECCION_PERSONA = :direccion, 
													TELEFONO_PERSONA = :telefono, 
													EMAIL_PERSONA = :email, 
													EMPRESA = :empresa,
													COMUNA = :comuna 
											WHERE 	RUT_PERSONA = :rut');	

			$query -> bindParam(':nombres', 	$data['NOMBRE_PERSONA']);
			$query -> bindParam(':apaterno', 	$data['APATERNO_PERSONA']);
			$query -> bindParam(':amaterno', 	$data['AMATERNO_PERSONA']);
			$query -> bindParam(':fecha', 		$data['FECHA_NACIMIENTO']);
			$query -> bindParam(':direccion', 	$data['DIRECCION_PERSONA']);
			$query -> bindParam(':telefono', 	$data['TELEFONO_PERSONA']);
			$query -> bindParam(':email', 		$data['EMAIL_PERSONA']);
			$query -> bindParam(':empresa', 	$data['EMPRESA']);
			$query -> bindParam(':comuna', 		$data['COMUNA']);
			$query -> bindParam(':rut', 		$data['RUT_PERSONA']);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Cliente modificado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'No fue posible modificar el cliente';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar el cliente';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('	DELETE FROM cliente 
											WHERE RUT_PERSONA = :rut');

			$query -> bindParam(':rut', $data['rut']);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Cliente eliminado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar el cliente';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}