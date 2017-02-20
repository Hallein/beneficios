<?php
	class Proveedor{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$datos = array();
			$query = $this->db->prepare('	SELECT 		p.RUT_PROVEEDOR,
														p.NOMBRE_PROVEEDOR,
														c.COMUNA,
														COUNT(dc.ID_COMPRA) AS COMPRAS_REALIZADAS
											FROM 		proveedor p
											INNER JOIN 	comuna c
											ON 			c.ID_COMUNA = p.ID_COMUNA
											INNER JOIN	documento_compra dc
											ON			dc.RUT_PROVEEDOR = p.RUT_PROVEEDOR
											GROUP BY 	p.RUT_PROVEEDOR,
														p.NOMBRE_PROVEEDOR,
														c.COMUNA');			
			$query->execute();
			$datos['proveedores'] = $query->fetchAll();

			return $datos;
		}

		public function show($id){
			$query = $this->db->prepare('	SELECT 		p.RUT_PROVEEDOR,
														p.NOMBRE_PROVEEDOR,
														c.COMUNA,
														COUNT(dc.ID_COMPRA) AS COMPRAS_REALIZADAS
											FROM 		proveedor p
											INNER JOIN 	comuna c
											ON 			c.ID_COMUNA = p.ID_COMUNA
											INNER JOIN	documento_compra dc
											ON			dc.RUT_PROVEEDOR = p.RUT_PROVEEDOR
											WHERE 		p.RUT_PROVEEDOR = :rut
											GROUP BY 	p.RUT_PROVEEDOR,
														p.NOMBRE_PROVEEDOR,
														c.COMUNA');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['proveedor'] = $query -> fetch();
				if($datos['proveedor']){
					$datos['respuesta']['status'] = 'success';					
				}else{
					$datos['respuesta']['status'] = 'error';
					$datos['respuesta']['message']['title'] = 'Ocurrió un error';
					$datos['respuesta']['message']['body'] = 'No existe el proveedor';
					$datos['respuesta']['message']['timeout'] = 2;
				}
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No existe el proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}		

		public function store($data){
			$datos = array();
			$query = $this->db->prepare('INSERT INTO proveedor(	RUT_PROVEEDOR,
																NOMBRE_PROVEEDOR
																ID_COMUNA)
													VALUES(		:rut, 
																:nombre, 
																:ciudad, 
																:pais)');

			$query -> bindParam(':rut', 	$data['RUT_PROVEEDOR']);
			$query -> bindParam(':nombre', 	$data['NOMBRE_PROVEEDOR']);
			$query -> bindParam(':ciudad', 	$data['CIUDAD_PROVEEDOR']);
			$query -> bindParam(':pais', 	$data['PAIS_PROVEEDOR']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Proveedor registrado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible registrar al proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function update($data){
			$datos = array();
			$query = $this->db->prepare('	UPDATE 	proveedor 
											SET 	NOMBRE_PROVEEDOR = :nombre, 
													ID_COMUNA = :comuna
											WHERE 	RUT_PROVEEDOR = :rut');

			$query -> bindParam(':nombre', 	$data['NOMBRE_PROVEEDOR']);
			$query -> bindParam(':comuna', 	$data['ID_COMUNA']);

			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Proveedor modificado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible modificar al proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

		public function delete($id){
			$datos = array();
			$query = $this->db->prepare('DELETE FROM proveedor WHERE RUT_PROVEEDOR = :rut');
			$query -> bindParam(':rut', $id);
			if($query -> execute()){
				$datos['respuesta']['status'] = 'success';
				$datos['respuesta']['message']['title'] = '¡Listo!';
				$datos['respuesta']['message']['body'] = 'Proveedor eliminado correctamente';
				$datos['respuesta']['message']['timeout'] = 2;
			}else{
				$datos['respuesta']['status'] = 'error';
				$datos['respuesta']['message']['title'] = 'Ocurrió un error';
				$datos['respuesta']['message']['body'] = 'No fue posible eliminar al proveedor';
				$datos['respuesta']['message']['timeout'] = 2;
			}
			return $datos;
		}

	}