<?php
	class TrabajadoresController{

		private $trabajador;

		public function __construct($db){
			$this->trabajador = new Trabajador($db);
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
			
			$datos = $this->trabajador->getAll();

			ob_start();
			include TRABAJADORES . '/getall.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function show($id){
			
			$datos = $this->trabajador->show($id);

			ob_start();
			include TRABAJADORES . '/show.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}


		public function create(){

			ob_start();
			include TRABAJADORES . '/create.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function store($data){
			$datos = $this->trabajador->store($data);
			return $datos;
		}

		public function edit($id){

			$datos = $this->trabajador->show($id);

			ob_start();
			include TRABAJADORES . '/edit.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function update($data){
			$datos = $this->trabajador->update($data);
		}

		public function destroy($id){
			$datos = $this->trabajador->destroy($id);
		}

	}