<?php
	class DocumentoVenta{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare('	SELECT 		dv.*, 
														cli.RUT_PERSONA, 
														cli.NOMBRE_PERSONA,
														cli.APATERNO_PERSONA,
														cli.AMATERNO_PERSONA,
														s.ID_SERVICIO,
														s.NOMBRE_SERVICIO
											FROM 		documento_venta dv
											INNER JOIN 	cliente cli ON dv.RUT_PERSONA = cli.RUT_PERSONA
											INNER JOIN 	venta s ON dv.ID_SERVICIO = s.ID_SERVICIO');
			$query->execute();

			$datos = array();
			$datos['documentos'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('SELECT * FROM documento_venta WHERE ID_VENTA = :id');
			$query -> bindParam(':id', $id);
			if($query -> execute()){
				$datos['documento'] = $query -> fetch();
				$datos['status'] = 'success';
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No existe el documento';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO documento_venta(FECHA_VENTA, VALOR_VENTA, IVA, FOLIO, NUMERO_SERIE) VALUES(:fventa, :vventa, :iva, :folio, :nserie)');
			$query -> bindParam(':fventa', $data['FECHA_VENTA']);
			$query -> bindParam(':vventa', $data['VALOR_VENTA']);
			$query -> bindParam(':iva', $data['IVA']);
			$query -> bindParam(':folio', $data['FOLIO']);
			$query -> bindParam(':nserie', $data['NUMERO_SERIE']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Documento registrada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible registrar el documento';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('UPDATE documento_venta SET FECHA_VENTA = :fventa, VALOR_VENTA = :vvente, IVA = :iva, FOLIO = :folio, NUMERO_SERIE = :nserie WHERE ID_VENTA = :id');
			$query -> bindParam(':fventa', $data['FECHA_VENTA']);
			$query -> bindParam(':vventa', $data['VALOR_VENTA']);
			$query -> bindParam(':iva', $data['IVA']);
			$query -> bindParam(':folio', $data['FOLIO']);
			$query -> bindParam(':nserie', $data['NUMERO_SERIE']);
			$query -> bindParam(':id', $data['ID_VENTA']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Documento modificada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible modificar el documento';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($data){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM documento_venta WHERE ID_VENTA = :id');
			$query -> bindParam(':id', $data['id']);
			if($query -> execute()){
				$datos['status'] = 'success';
				$datos['message']['title'] = '¡Listo!';
				$datos['message']['body'] = 'Documento eliminada correctamente';
				$datos['message']['timeout'] = 2;
			}else{
				$datos['status'] = 'error';
				$datos['message']['title'] = 'Ocurrió un error';
				$datos['message']['body'] = 'No fue posible eliminar el documento';
				$datos['message']['timeout'] = 2;
			}
			return $datos;
		}

	}