<?php
	class InsumosController{

		private $insumo;

		public function __construct($db){
			$this->insumo = new Insumo($db);
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
			
			$datos = $this->insumo->getAll();

			ob_start();
			include INSUMOS . '/getall.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->insumo->show($id);

			ob_start();
			include INSUMOS . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


		public function create(){

			ob_start();
			include INSUMOS . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){

			$datos = $this->insumo->store($data);
			
			return $datos['respuesta'];
		}

		public function edit($id){

			$datos = $this->insumo->show($id);

			ob_start();
			include INSUMOS . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->insumo->update($data);
		}

		public function destroy($id){
			$datos = $this->insumo->destroy($id);
		}

	}