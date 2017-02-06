<?php
	class FacturaCompra{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT * FROM factura_compra');
			$query->execute();

			$datos = array();
			$datos['facturas'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM factura_compra WHERE ID_COMPRA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['factura'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe la factura';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO factura_compra(FECHA_COMPRA, VALOR_COMPRA, IVA, FOLIO, NUMERO_SERIE) VALUES(:fcompra, :vcompra, :iva, :folio, :nserie)');
			$query -> bindParam(':fcompra', $data['FECHA_COMPRA']);
			$query -> bindParam(':vcompra', $data['VALOR_COMPRA']);
			$query -> bindParam(':iva', $data['IVA']);
			$query -> bindParam(':folio', $data['FOLIO']);
			$query -> bindParam(':nserie', $data['NUMERO_SERIE']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Factua registrada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar la factura';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE factura_compra SET FECHA_COMPRA = :fcompra, VALOR_COMPRA = :vvente, IVA = :iva, FOLIO = :folio, NUMERO_SERIE = :nserie WHERE ID_COMPRA = :id');
			$query -> bindParam(':fcompra', $data['FECHA_COMPRA']);
			$query -> bindParam(':vcompra', $data['VALOR_COMPRA']);
			$query -> bindParam(':iva', $data['IVA']);
			$query -> bindParam(':folio', $data['FOLIO']);
			$query -> bindParam(':nserie', $data['NUMERO_SERIE']);
			$query -> bindParam(':id', $data['ID_COMPRA']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Factura modificada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar la factura';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM factura_compra WHERE ID_COMPRA = :id');
			$query -> bindParam(':id', $data['id']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Factura eliminada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar la factura';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}