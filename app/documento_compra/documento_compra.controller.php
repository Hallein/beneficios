<?php
	class DocumentoCompraController{

		private $documento;

		public function __construct($db){
			$this->documento = new DocumentoCompra($db);
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
			
			$datos = $this->documento->getAll();

			ob_start();
			include DOCUMENTO_COMPRA . '/getall.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->documento->show($id);

			ob_start();
			include DOCUMENTO_COMPRA . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function create(){

			ob_start();
			include DOCUMENTO_COMPRA . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){
			
			$datos = $this->documento->store($data);

			return $datos['respuesta'];
		}

		public function edit($id){

			$datos = $this->documento->show($id);

			ob_start();
			include DOCUMENTO_COMPRA . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->documento->update($data);
		}

		public function destroy($id){
			$datos = $this->documento->destroy($id);
		}

	}