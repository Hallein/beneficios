<?php
	class VehiculosController{

		private $vehiculo;

		public function __construct($db){
			$this->vehiculo = new Vehiculo($db);
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
			
			$datos = $this->vehiculo->getAll();

			ob_start();
			include VEHICULOS . '/getall.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->vehiculo->show($id);

			ob_start();
			include VEHICULOS . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


		public function create(){

			$datos['respuesta']['bodegas'] = $this->vehiculo->getBodegas();

			ob_start();
			include VEHICULOS . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){
			$datos = $this->vehiculo->store($data);
			return $datos;
		}

		public function edit($id){

			$datos = $this->vehiculo->show($id);
			$datos['respuesta']['bodegas'] = $this->vehiculo->getBodegas();

			ob_start();
			include VEHICULOS . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->vehiculo->update($data);
		}

		public function destroy($id){
			$datos = $this->vehiculo->destroy($id);
		}

	}