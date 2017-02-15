<?php
	class ClientesController{

		private $cliente;

		public function __construct($db){
			$this->cliente = new Cliente($db);
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
			
			$datos = $this->cliente->getAll();

			ob_start();
			include CLIENTES . '/getall.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function show($id){
			
			$datos = $this->cliente->show($id);

			ob_start();
			include CLIENTES . '/show.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}


		public function create(){

			ob_start();
			include CLIENTES . '/create.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function store($data){
			$datos = $this->cliente->store($data);
			return $datos;
		}

		public function edit($id){

			$datos = $this->cliente->show($id);

			ob_start();
			include CLIENTES . '/edit.php';
			$datos['html'] = ob_get_clean();

			return $datos;
		}

		public function update($data){
			$datos = $this->cliente->update($data);
		}

		public function destroy($id){
			$datos = $this->cliente->destroy($id);
		}

	}