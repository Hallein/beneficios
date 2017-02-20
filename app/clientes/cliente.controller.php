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
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->cliente->show($id);

			ob_start();
			include CLIENTES . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


		public function create(){

			$datos['regiones'] = $this->cliente->getRegiones();
			
			$datos['sexos'] = $this->cliente->getSexos();

			ob_start();
			include CLIENTES . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){

			$datos = $this->cliente->store($data);
			
			return $datos['respuesta'];
		}

		public function edit($id){
			$datos = $this->cliente->show($id);

			$datos['sexos'] = $this->cliente->getSexos();		

			$datos['regiones'] = $this->cliente->getRegiones();	

			$datos['comunas'] = $this->cliente->getComunas($datos['cliente']['ID_REGION']);
			
			ob_start();
			include CLIENTES . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->cliente->update($data);
			return $datos['respuesta'];
		}

		public function destroy($id){
			$datos = $this->cliente->delete($id);
			return $datos['respuesta'];
		}

		public function getComunas($id){
			$datos['comunas'] = $this->cliente->getComunas($id);
			ob_start();
			include CLIENTES . '/getcomunas.php';
			$datos['respuesta']['html'] = ob_get_clean();
			return $datos['respuesta'];
		}

	}