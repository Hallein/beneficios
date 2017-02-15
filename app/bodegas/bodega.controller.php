<?php
	class BodegasController{

		private $bodega;

		public function __construct($db){
			$this->bodega = new Bodega($db);
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
			
			$datos = $this->bodega->getAll();

			ob_start();
			include BODEGAS . '/getall.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function show($id){
			
			$datos = $this->bodega->show($id);

			ob_start();
			include BODEGAS . '/show.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}


		public function create(){

			ob_start();
			include BODEGAS . '/create.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function store($data){
			$datos = $this->bodega->store($data);
			return $datos;
		}

		public function edit($id){

			$datos = $this->bodega->show($id);

			ob_start();
			include BODEGAS . '/edit.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function update($data){
			$datos = $this->bodega->update($data);
		}

		public function destroy($id){
			$datos = $this->bodega->destroy($id);
		}

	}