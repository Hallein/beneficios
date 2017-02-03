<?php
	class ServiciosController{

		private $servicio;

		public function __construct($db){
			$this->servicio = new Servicio($db);
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
			
			//$datos = $this->servicio->getAll();

			ob_start();
			include SERVICIOS . '/getall.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function show($id){
			
			//$datos = $this->servicio->show($id);

			ob_start();
			include SERVICIOS . '/show.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}


		public function create(){

			ob_start();
			include SERVICIOS . '/create.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function store($data){

		}

		public function edit($id){

			//$datos = $this->servicio->show($id);

			ob_start();
			include SERVICIOS . '/edit.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function update($data){
			//$datos = $this->servicio->update($data);
		}

		public function destroy($id){
			//$datos = $this->servicio->destroy($id);
		}

	}