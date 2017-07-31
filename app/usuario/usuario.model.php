<?php
	class Usuario{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getPass($rut){
			$datos = array();
			$query = $this->db->prepare(' 	SELECT 	US_CLAVE
											FROM 	USUARIO
											WHERE 	US_RUT = :rut ');

			$query -> bindParam(':rut', $rut);
			$query -> execute();
			$pass = $query->fetch();
			return $pass;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	USUARIO 
											SET 	US_CLAVE = :pass
											WHERE 	US_RUT = :rut');

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