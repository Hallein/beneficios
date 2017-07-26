<?php
	class ConsultaController{

		private $consulta;

		public function __construct($db){
			$this->consulta = new Consulta($db);
		}

		public function consultaBeneficio($empresa, $rut){
			
			$datos = $this->consulta->consultaBeneficio($empresa, $rut);

			ob_start();
			include CONSULTA . '/_consulta.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

	}