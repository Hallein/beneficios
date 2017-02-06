<?php
	class Insumo{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('SELECT * FROM insumo');
			$query->execute();

			$datos = array();
			$datos['insumos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM insumo WHERE ID_INSUMO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['insumo'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el insumo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO insumo(NOMBRE_INSUMO, CATEGORIA_INSUMO, SUBCATEGORIA_INSUMO, PRECIO_VENTA, PRECIO_COMPRA) VALUES(:ninsumo, :cinsumo, :scinsumo, :pventa, :pcompra)');
			$query -> bindParam(':ninsumo', $data['VALOR_ACORDADO']);
			$query -> bindParam(':cinsumo', $data['LUGAR_ENTREGA']);
			$query -> bindParam(':scinsumo', $data['LUGAR_RETIRO']);
			$query -> bindParam(':pventa', $data['FECHA_LIMITE']);
			$query -> bindParam(':pcompra', $data['VALOR_TOTAL']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Insumo registrado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar el insumo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE insumo SET NOMBRE_INSUMO = :ninsumo, CATEGORIA_INSUMO = :cinsumo, SUBCATEGORIA_INSUMO = :scinsumo, PRECIO_VENTA = :pventa, PRECIO_COMPRA = :pcompra WHERE ID_INSUMO = :id');
			$query -> bindParam(':ninsumo', $data['VALOR_ACORDADO']);
			$query -> bindParam(':cinsumo', $data['LUGAR_ENTREGA']);
			$query -> bindParam(':scinsumo', $data['LUGAR_RETIRO']);
			$query -> bindParam(':pventa', $data['FECHA_LIMITE']);
			$query -> bindParam(':pcompra', $data['VALOR_TOTAL']);
			$query -> bindParam(':id', $data['ID_INSUMO']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Insumo modificado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar el insumo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM insumo WHERE ID_INSUMO = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Insumo eliminado correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar el insumo';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}