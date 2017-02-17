<?php
	class ServicioVentaController{

		private $servicio;

		public function __construct($db){
			$this->servicio = new ServicioVenta($db);
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
			
			$datos = $this->servicio->getAll();

			ob_start();
			include SERVICIO_VENTA . '/getall.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->servicio->show($id);

			ob_start();
			include SERVICIO_VENTA . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


		public function create(){

			ob_start();
			include SERVICIO_VENTA . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){
			$datos = $this->servicio->store($data);
			return $datos['respuesta'];
		}

		public function edit($id){

			$datos = $this->servicio->show($id);

			ob_start();
			include SERVICIO_VENTA . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->servicio->update($data);
		}

		public function destroy($id){
			$datos = $this->servicio->destroy($id);
		}

	}