<?php
	class PagosController{

		private $pago;

		public function __construct($db){
			$this->pago = new Pago($db);
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
			
			//$datos = $this->pago->getAll();

			ob_start();
			include PAGOS . '/getall.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function show($id){
			
			//$datos = $this->pago->show($id);

			ob_start();
			include PAGOS . '/show.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}


		public function create(){

			ob_start();
			include PAGOS . '/create.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function store($data){

		}

		public function edit($id){

			//$datos = $this->pago->show($id);

			ob_start();
			include PAGOS . '/edit.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function update($data){
			//$datos = $this->pago->update($data);
		}

		public function destroy($id){
			//$datos = $this->pago->destroy($id);
		}

	}