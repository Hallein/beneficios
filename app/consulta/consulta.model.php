<?php
	class Consulta{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function consultaBeneficio($empresa, $rut){
			$query = $this->db->prepare('SELECT * FROM BENEFICIO');
			$query->execute();

			if($query->execute()){

				$datos['consulta'] = $query->fetch();

				if($datos['consulta'])
					$datos['respuesta'] = respuesta('success');
				else
					$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'No existe el beneficiario');
				

			}else{
				$datos['respuesta'] = respuesta('error', 'Ocurrió un error', 'La consulta no se realizó correctamente');
			}

			return $datos;
		}

	}