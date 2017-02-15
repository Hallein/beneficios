<?php
	class ProveedoresController{

		private $proveedor;

		public function __construct($db){
			$this->proveedor = new Proveedor($db);
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
			
			$datos = $this->proveedor->getAll();

			ob_start();
			include PROVEEDORES . '/getall.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function show($id){
			
			$datos = $this->proveedor->show($id);

			ob_start();
			include PROVEEDORES . '/show.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}


		public function create(){

			ob_start();
			include PROVEEDORES . '/create.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function store($data){

			$datos = $this->proveedor->store($data);
			
			return $datos['respuesta'];
		}

		public function edit($id){

			$datos = $this->proveedor->show($id);

			ob_start();
			include PROVEEDORES . '/edit.php';
			$datos['respuesta']['html'] = ob_get_clean();

			return $datos['respuesta'];
		}

		public function update($data){
			$datos = $this->proveedor->update($data);
		}

		public function destroy($id){
			$datos = $this->proveedor->destroy($id);
		}

	}