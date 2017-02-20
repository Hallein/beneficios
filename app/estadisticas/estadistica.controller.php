<?php
	class EstadisticasController{

		private $estadistica;

		public function __construct($db){
			$this->estadistica = new Estadistica($db);
		}

		public function index(){

			//$datos['respuesta']['top-trabajadores'] = $this->topTrabajadores();
			$datos['respuesta']['top-clientes'] = $this->topClientes();
			$datos['respuesta']['producto-mas-vendido'] = $this->productoMasVendido();
			$datos['respuesta']['promedio-ventas'] = $this->promedioVentas();

			return $datos['respuesta'];
		}

		public function topTrabajadores(){
			
			/*$trabajadores = $this->estadistica->topTrabajadores();

			$datos['respuesta']['values'] = array();
			$datos['respuesta']['labels'] = array();

			$i = 0;
			foreach($trabajadores as $trabajador){
				$datos['respuesta']['values'][$i] = $trabajador['CANTIDAD_VENTAS'];
				$datos['respuesta']['labels'][$i] = $trabajador['NOMBRE_PERSONA'] . ' ' . $trabajador['APATERNO_PERSONA'];
				$i++; 
			}

			ob_start();
			include ESTADISTICAS . '/topTrabajadores.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];*/
		}

		public function topClientes(){
			
			$clientes = $this->estadistica->topClientes();

			$datos['respuesta']['values'] = array();
			$datos['respuesta']['labels'] = array();

			$i = 0;
			foreach($clientes as $cliente){
				$datos['respuesta']['values'][$i] = $cliente['CANTIDAD_VENTAS'];
				$datos['respuesta']['labels'][$i] = $cliente['NOMBRE_PERSONA'] . ' ' .  $cliente['APATERNO_PERSONA'];
				$i++; 
			}

			ob_start();
			include ESTADISTICAS . '/topClientes.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function productoMasVendido(){
			
			$insumos = $this->estadistica->productoMasVendido();

			$datos['respuesta']['values'] = array();
			$datos['respuesta']['labels'] = array();

			$i = 0;
			foreach($insumos as $insumo){
				$datos['respuesta']['values'][$i] = $insumo['CANTIDAD_VENTAS'];
				$datos['respuesta']['labels'][$i] = $insumo['NOMBRE_INSUMO'];
				$i++; 
			}

			ob_start();
			include ESTADISTICAS . '/productoMasVendido.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function promedioVentas(){

			$ventas = $this->estadistica->promedioVentas();

			$datos['respuesta']['promedio'] = $ventas['promedio'];
			$datos['respuesta']['values'] = array();
			$datos['respuesta']['labels'] = array();

			$i = 0;
			foreach($ventas['ventas-por-mes'] as $venta){
				$datos['respuesta']['values'][$i] = $venta['VENTAS'];
				$datos['respuesta']['labels'][$i] = $venta['MES'] . '/' . $venta['ANHO'];
				$i++; 
			}

			ob_start();
			include ESTADISTICAS . '/promedioVentas.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos;
		}


	}