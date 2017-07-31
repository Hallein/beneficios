<?php
	class ConsultaController{

		private $consulta;

		public function __construct($db){
			$this->consulta = new Consulta($db);
		}

		public function consultaBeneficio($empresa, $rut){

			$empresa = filtrar_una_variable($empresa);	
			$rut = filtrar_una_variable($rut);	

			//validar rut
			if(!valida_rut($rut)){
				return respuesta('error', '', 'El rut no es válido');
			}

			$rut = ObtieneRutSinDigito($rut);
			
			$datos = $this->consulta->show($empresa, $rut);
			$etapas = $this->consulta->showEtapas($empresa, $rut);
			$hitos = $this->consulta->showHitos2($empresa, $rut);

			ob_start();
			include CONSULTA . '/_consulta.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

	}