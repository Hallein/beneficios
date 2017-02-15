<?php
	class Contrato{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();
			
			$query = $this->db->prepare('	SELECT 		co.*, 
														cli.NOMBRE_PERSONA, 
														cli.APATERNO_PERSONA, 
														cli.AMATERNO_PERSONA
											FROM 		contrato co
											INNER JOIN 	cliente cli 
											ON 			co.CLI_RUT_PERSONA = cli.RUT_PERSONA');			
			$query->execute();

			$datos['contratos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM contrato WHERE ID_CONTRATO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['contrato'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el contrato';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('	INSERT INTO contrato(
													NRO_PATENTE,
													RUT_PERSONA,
													CLI_RUT_PERSONA,
													ID_SERVICIO,
													VALOR_ACORDADO, 
													LUGAR_ENTREGA, 
													LUGAR_RETIRO, 
													FECHA_LIMITE, 
													VALOR_TOTAL, 
													DETALLE_CONTRATO, 
													ESTADO_CONTRATO) 
											VALUES(	:patente,
													:rut_trabajador,
													:rut_cliente,
													:id_servicio,
													:valor_acordado, 
													:lugar_entrega, 
													:lugar_retiro, 
													:fecha_limite, 
													:valor_total, 
													:detalle, 
													:estado)');

			$query -> bindParam(':patente', 		$data['NRO_PATENTE']);
			$query -> bindParam(':rut_trabajador', 	$data['RUT_PERSONA']);
			$query -> bindParam(':rut_cliente', 	$data['CLI_RUT_PERSONA']);
			$query -> bindParam(':id_servicio', 	$data['ID_SERVICIO']);
			$query -> bindParam(':valor_acordado', 	$data['VALOR_ACORDADO']);
			$query -> bindParam(':lugar_entrega', 	$data['LUGAR_ENTREGA']);
			$query -> bindParam(':lugar_retiro', 	$data['LUGAR_RETIRO']);
			$query -> bindParam(':fecha_limite', 	$data['FECHA_LIMITE']);
			$query -> bindParam(':valor_total', 	$data['VALOR_TOTAL']);
			$query -> bindParam(':detalle', 		$data['DETALLE_CONTRATO']);
			$query -> bindParam(':estado', 			$data['ESTADO_CONTRATO']);
			
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Contrato registrado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar el contrato';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	contrato 
											SET 	NRO_PATENTE = :patente,
													RUT_PERSONA = :rut_trabajador,
													CLI_RUT_PERSONA = :rut_cliente,
													ID_SERVICIO = :id_servicio,
													VALOR_ACORDADO = :valor_acordado, 
													LUGAR_ENTREGA = :lugar_entrega, 
													LUGAR_RETIRO = :lugar_retiro, 
													FECHA_LIMITE = :fecha_limite, 
													VALOR_TOTAL = :valor_total, 
													DETALLE_CONTRATO = :detalle, 
													ESTADO_CONTRATO = :estado 
											WHERE 	ID_CONTRATO = :id');

			$query -> bindParam(':patente', 		$data['NRO_PATENTE']);
			$query -> bindParam(':rut_trabajador', 	$data['RUT_PERSONA']);
			$query -> bindParam(':rut_cliente', 	$data['CLI_RUT_PERSONA']);
			$query -> bindParam(':id_servicio', 	$data['ID_SERVICIO']);
			$query -> bindParam(':valor_acordado', 	$data['VALOR_ACORDADO']);
			$query -> bindParam(':lugar_entrega', 	$data['LUGAR_ENTREGA']);
			$query -> bindParam(':lugar_retiro', 	$data['LUGAR_RETIRO']);
			$query -> bindParam(':fecha_limite', 	$data['FECHA_LIMITE']);
			$query -> bindParam(':valor_total', 	$data['VALOR_TOTAL']);
			$query -> bindParam(':detalle', 		$data['DETALLE_CONTRATO']);
			$query -> bindParam(':estado', 			$data['ESTADO_CONTRATO']);
			$query -> bindParam(':id', 				$data['ID_CONTRATO']);

			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Contrato modificado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar el contrato';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM contrato WHERE ID_CONTRATO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Contrato eliminado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar el contrato';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}