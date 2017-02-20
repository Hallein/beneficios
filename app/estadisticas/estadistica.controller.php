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
			
			$datos = $this->estadistica->topClientes();

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