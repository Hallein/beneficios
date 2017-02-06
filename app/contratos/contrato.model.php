<?php
	class Contrato{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();

			$query = $this->db->prepare('SELECT * FROM contrato');			
			$query->execute();

			datos['contratos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM contrato WHERE ID_CONTRATO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['contrato'] = $query -> fetch();
				$datos['status'] = 'Success';
				$datos['msg'] = 'Contrato encontrado';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No existe el contrato';
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO contrato(VALOR_ACORDADO, LUGAR_ENTREGA, LUGAR_RETIRO, FECHA_LIMITE, VALOR_TOTAL, DETALLE_CONTRATO, ESTADO_CONTRATO) VALUES(:vacordado, :lentrega, :lretiro, :flimite, :vtotal, :dcontrato, :econtrato)');
			$query -> bindParam(':vacordado', $data['VALOR_ACORDADO']);
			$query -> bindParam(':lentrega', $data['LUGAR_ENTREGA]');
			$query -> bindParam(':lretiro', $data['LUGAR_RETIRO]');
			$query -> bindParam(':flimite', $data['FECHA_LIMITE']);
			$query -> bindParam(':vtotal', $data['VALOR_TOTAL']);
			$query -> bindParam(':dcontrato', $data['DETALLE_CONTRATO']);
			$query -> bindParam(':econtrato', $data['ESTADO_CONTRATO']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Contrato registrado';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible registrar el contrato';
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE contrato SET VALOR_ACORDADO = :vacordado, LUGAR_ENTREGA = :lentrega, LUGAR_RETIRO = :lretiro, FECHA_LIMITE = :flimite, VALOR_TOTAL = :vtotal, DETALLE_CONTRATO = :dcontrato, ESTADO_CONTRATO = :econtrato WHERE ID_CONTRATO = :id');
			$query -> bindParam(':vacordado', $data['VALOR_ACORDADO']);
			$query -> bindParam(':lentrega', $data['LUGAR_ENTREGA]');
			$query -> bindParam(':lretiro', $data['LUGAR_RETIRO]');
			$query -> bindParam(':flimite', $data['FECHA_LIMITE']);
			$query -> bindParam(':vtotal', $data['VALOR_TOTAL']);
			$query -> bindParam(':dcontrato', $data['DETALLE_CONTRATO']);
			$query -> bindParam(':econtrato', $data['ESTADO_CONTRATO']);
			$query -> bindParam(':id', $data['ID_CONTRATO']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Contrato modificado';	
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible modificar el contrato';
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM contrato WHERE ID_CONTRATO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Contrato eliminado';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible eliminar el contrato';
			}
			return $datos;
		}

	}