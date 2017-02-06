<?php
	class Cliente{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT * FROM CLIENTE');
			$query->execute();
			$datos['clientes'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM cliente WHERE RUT_PERSONA = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['cliente'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el cliente consultado';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO cliente(	RUT_PERSONA, 
																NOMBRE_PERSONA, 
																APATERNO_PERSONA, 
																AMATERNO_PERSONA,
																FECHA_NACIMIENO,
																DIRECCION_PERSONA,
																TELEFONO_PERSONA,
																EMAIL_PERSONA,
																COMUNA ) 
													VALUES	(	:rut, 
																:nombres, 
																:apaterno, 
																:amaterno, 
																:fnac, 
																:dir, 
																:tel, 
																:email, 
																:comuna)');
			$query -> bindParam(':rut', $data['rut']);
			$query -> bindParam(':nombres', $data['nombre']);
			$query -> bindParam(':apaterno', $data['apaterno']);
			$query -> bindParam(':amaterno', $data['amaterno']);
			$query -> bindParam(':fnac', $data['fechanac']);
			$query -> bindParam(':dir', $data['direccion']);
			$query -> bindParam(':tel', $data['telefono']);
			$query -> bindParam(':email', $data['email']);
			//$query -> bindParam(':empresa', $data['EMPRESA']);
			//$query -> bindParam(':ciudad', $data['CIUDAD']);
			$query -> bindParam(':comuna', $data['comuna']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Cliente registrado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No se pudo registrar al cliente';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE cliente 
											SET NOMBRE_PERSONA = :nombres, 
												APATERNO_PERSONA = :apaterno, 
												AMATERNO_PERSONA = :amaterno, 
												FECHA_NACIMIENTO = :fnac, 
												DIRECCION_PERSONA = :dir, 
												TELEFONO_PERSONA = :tel, 
												EMAIL_PERSONA = :email, 
												EMPRESA = :empresa, 
												CIUDAD = :ciudad, 
												COMUNA = :comuna 
											WHERE RUT_PERSONA = :rut');	

			$query -> bindParam(':nombres', $data['NOMBRE_PERSONA']);
			$query -> bindParam(':apaterno', $data['APATERNO_PERSONA']);
			$query -> bindParam(':amaterno', $data['AMATERNO_PERSONA']);
			$query -> bindParam(':fnac', $data['FECHA_NACIMIENTO']);
			$query -> bindParam(':dir', $data['DIRECCION_PERSONA']);
			$query -> bindParam(':tel', $data['TELEFONO_PERSONA']);
			$query -> bindParam(':email', $data['EMAIL_PERSONA']);
			$query -> bindParam(':empresa', $data['EMPRESA']);
			$query -> bindParam(':ciudad', $data['CIUDAD']);
			$query -> bindParam(':comuna', $data['COMUNA']);
			$query -> bindParam(':rut', $data['RUT_PERSONA']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Cliente modificado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'No fue posible modificar el cliente';
				$datos['message']['body'] = 'No fue posible modificar el cliente';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('	DELETE FROM cliente 
											WHERE RUT_PERSONA = :rut');
			$query -> bindParam(':rut', $data['rut']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Cliente eliminado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar el cliente';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}