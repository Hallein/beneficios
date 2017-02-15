<?php
	class ContratosController{

		private $contrato;

		public function __construct($db){
			$this->contrato = new Contrato($db);
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
			
			$datos = $this->contrato->getAll();

			ob_start();
			include CONTRATOS . '/getall.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->contrato->show($id);

			ob_start();
			include CONTRATOS . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


		public function create(){

			ob_start();
			include CONTRATOS . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){

			$datos = $this->contrato->store($data);
			
			return $datos['respuesta'];
		}

		public function edit($id){

			$datos = $this->contrato->show($id);

			ob_start();
			include CONTRATOS . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->contrato->update($data);
		}

		public function destroy($id){
			$datos = $this->contrato->destroy($id);
		}

	}