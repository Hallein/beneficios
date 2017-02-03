<?php
	class ClientesController{

		private $db;

		public function __construct($db){
			$this->db = $db;
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
			$cliente = new Cliente($this->db);
			//$clientes = $cliente->getAll();

			ob_start();
			include CLIENTES . '/getall.php';
			$clientes['html'] = ob_get_clean();

			return $clientes;
		}

		public function show($id){

		}


		public function create(){
			ob_start();
			include CLIENTES . '/create.php';
			$clientes['html'] = ob_get_clean();

			return $clientes;
		}

		public function store($data){

		}

		public function edit($id){

		}

		public function update($data){

		}

		public function destroy($id){

		}

	}