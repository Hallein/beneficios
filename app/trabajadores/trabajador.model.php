<?php
	class Trabajador{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();

			$query = $this->db->prepare('SELECT 	t.RUT_PERSONA,
													t.ID_PREVISION_SOCIAL, 
													t.ID_PREVISION_SALUD, 
													t.CARGO, 
													t.NOMBRE_PERSONA, 
													t.APATERNO_PERSONA, 
													t.AMATERNO_PERSONA, 
													t.FECHA_NACIMIENTO, 
													t.DIRECCION_PERSONA, 
													t.TELEFONO_PERSONA, 
													t.EMAIL_PERSONA, 
													s.SEXO,
													pso.DESCRIPCION_PREVISION_SOCIAL AS PREVISION_SOCIAL,
													psa.DESCRIPCION_PREVISION_SALUD AS PREVISION_SALUD
										FROM 		trabajador t
										INNER JOIN 	sexo s
										ON			s.ID_SEXO = t.ID_SEXO
										INNER JOIN	prevision_social pso
										ON			pso.ID_PREVISION_SOCIAL = t.ID_PREVISION_SOCIAL
										INNER JOIN 	prevision_salud psa
										ON			psa.ID_PREVISION_SALUD = t.ID_PREVISION_SALUD');
			$query->execute();

			$datos['trabajadores'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('	SELECT 		t.RUT_PERSONA,
														t.ID_PREVISION_SOCIAL, 
														t.ID_PREVISION_SALUD, 
														t.CARGO, 
														t.NOMBRE_PERSONA, 
														t.APATERNO_PERSONA, 
														t.AMATERNO_PERSONA, 
														t.FECHA_NACIMIENTO, 
														t.DIRECCION_PERSONA, 
														t.TELEFONO_PERSONA, 
														t.EMAIL_PERSONA, 
														s.SEXO,
														pso.DESCRIPCION_PREVISION_SOCIAL AS PREVISION_SOCIAL,
														psa.DESCRIPCION_PREVISION_SALUD AS PREVISION_SALUD
											FROM 		trabajador t
											INNER JOIN 	sexo s
											ON			s.ID_SEXO = t.ID_SEXO
											INNER JOIN	prevision_social pso
											ON			pso.ID_PREVISION_SOCIAL = t.ID_PREVISION_SOCIAL
											INNER JOIN 	prevision_salud psa
											ON			psa.ID_PREVISION_SALUD = t.ID_PREVISION_SALUD 
											WHERE 		t.RUT_PERSONA = :rut');
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
			$query = $this->db->prepare('INSERT INTO trabajador(	ID_PREVISION_SOCIAL, 
																	ID_PREVISION_SALUD, 
																	CARGO, 
																	SEXO,
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
																	:sexo,
																	:nombre, 
																	:apaterno, 
																	:amaterno, 
																	:fecha, 
																	:direccion, 
																	:telefono, 
																	:email)');

			$query -> bindParam(':social', 		$data['ID_PREVISION_SOCIAL']);
			$query -> bindParam(':salud', 		$data['ID_PREVISION_SALUD']);
			$query -> bindParam(':cargo', 		$data['CARGO']);
			$query -> bindParam(':sexo', 		$data['SEXO']);
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
											SET 	ID_PREVISION_SOCIAL = :social, 
													ID_PREVISION_SALUD = :salud, 
													CARGO = :cargo, 
													SEXO = :sexo,
													NOMBRE_PERSONA = :nombre, 
													APATERNO_PERSONA = :apaterno, 
													AMATERNO_PERSONA = :amaterno, 
													FECHA_NACIMIENTO = :fecha,
													DIRECCION_PERSONA = :direccion,
													TELEFONO_PERSONA = :telefono,
													EMAIL_PERSONA = :email
											WHERE 	RUT_PERSONA = :rut');

			$query -> bindParam(':social', 		$data['ID_PREVISION_SOCIAL']);
			$query -> bindParam(':salud', 		$data['ID_PREVISION_SALUD']);
			$query -> bindParam(':cargo', 		$data['CARGO']);
			$query -> bindParam(':sexo', 		$data['SEXO']);
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