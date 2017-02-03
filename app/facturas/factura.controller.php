<?php
	class FacturasController{

		private $factura;

		public function __construct($db){
			$this->factura = new Factura($db);
		}

		/****************************************************************************
		*	index 		muestra todos los registros 								*
		*	show 		muestra un registro segun el id 							*
		*	create 		muestra el formulario para crear un nuevo registro 			*
		*	store 		guarda un nuevo registro 									*
		*	edit 		muestra el formulario para editar un registro segun el id 	*
		*	update 		actualiza un registro segun el id 							*
		*	destroy 	elimina un registro segun el id 							*
		*****************************************************************************/

		public function index(){
			
			//$datos = $this->factura->getAll();

			ob_start();
			include FACTURAS . '/getall.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function show($id){
			
			//$datos = $this->factura->show($id);

			ob_start();
			include FACTURAS . '/show.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}


		public function create(){

			ob_start();
			include FACTURAS . '/create.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function store($data){

		}

		public function edit($id){

			//$datos = $this->factura->show($id);

			ob_start();
			include FACTURAS . '/edit.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function update($data){
			//$datos = $this->factura->update($data);
		}

		public function destroy($id){
			//$datos = $this->factura->destroy($id);
		}

	}