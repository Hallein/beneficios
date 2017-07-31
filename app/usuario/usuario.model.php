<?php
	class Usuario{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	USUARIO 
											SET 	US_NOMBRE = :nombre, 
													US_CLAVE = :pass
											WHERE 	US_RUT = :rut');

			$query -> bindParam(':nombre', 	$data['nombre']);
			$query -> bindParam(':pass', 	$data['pass']);
			$query -> bindParam(':rut', 	$data['rut']);

			if($query -> execute()){
				$datos['respuesta'] = respuesta('success', '', 'Datos de la cuenta actualizados');
			}else{
				$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No fue posible actualizar los datos de la cuenta');
			}
			return $datos;
		}

	}