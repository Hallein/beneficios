<?php
	class EstadisticasController{

		private $estadistica;

		public function __construct($db){
			$this->estadistica = new Estadistica($db);
		}

		public function topTrabajadores(){
			
			$datos = $this->estadistica->topTrabajadores();

			ob_start();
			include ESTADISTICAS . '/topTrabajadores.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function topClientes(){
			
			$clientes = $this->estadistica->topClientes();

			$datos['respuesta']['values'] = array();
			$datos['respuesta']['labels'] = array();
			
			$i = 0;
			foreach($clientes as $cliente){
				$datos['respuesta']['values'][$i] = $cliente['CANTIDAD_VENTAS'];
				$datos['respuesta']['labels'][$i] = $cliente['NOMBRE_PERSONA'] . $cliente['APATERNO_PERSONA'];
				$i++;
			}

			ob_start();
			include ESTADISTICAS . '/topClientes.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function productoMasVendido(){
			
			$datos = $this->estadistica->productoMasVendido();

			ob_start();
			include ESTADISTICAS . '/productoMasVendido.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


	}