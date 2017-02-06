<?php
	class Factura{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT * FROM factura_venta');
			$query->execute();

			$datos = array();
			$datos['facturas'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM factura_venta WHERE ID_VENTA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['factura'] = $query -> fetch();
				$datos['status'] = 'Success';
				$datos['msg'] = 'Factura encontrada';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No existe la factura';
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO factura_venta(FECHA_VENTA, VALOR_VENTA, IVA, FOLIO, NUMERO_SERIE) VALUES(:fventa, :vventa, :iva, :folio, :nserie)');
			$query -> bindParam(':fventa', $data['FECHA_VENTA']);
			$query -> bindParam(':vventa', $data['VALOR_VENTA']);
			$query -> bindParam(':iva', $data['IVA']);
			$query -> bindParam(':folio', $data['FOLIO']);
			$query -> bindParam(':nserie', $data['NUMERO_SERIE']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Factua registrada';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible registrar la factura';
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE factura_venta SET FECHA_VENTA = :fventa, VALOR_VENTA = :vvente, IVA = :iva, FOLIO = :folio, NUMERO_SERIE = :nserie WHERE ID_VENTA = :id');
			$query -> bindParam(':fventa', $data['FECHA_VENTA']);
			$query -> bindParam(':vventa', $data['VALOR_VENTA']);
			$query -> bindParam(':iva', $data['IVA']);
			$query -> bindParam(':folio', $data['FOLIO']);
			$query -> bindParam(':nserie', $data['NUMERO_SERIE']);
			$query -> bindParam(':id', $data['ID_VENTA']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Factura modificada';	
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible modificar la factura';
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM factura_venta WHERE ID_VENTA = :id');
			$query -> bindParam(':id', $data['id']);
			if($query -> execute()){
				$datos['status'] = 'Success';
				$datos['msg'] = 'Factura eliminada';
			}else{
				$datos['status'] = 'Error';
				$datos['msg'] = 'No fue posible eliminar la factura';
			}
			return $datos;
		}

	}