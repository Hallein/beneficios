<?php 	/****************************************************************************
		*	index 		muestra todos los registros 								*
		*	show 		muestra un registro segun el id 							*
		*	create 		muestra el formulario para crear un nuevo registro 			*
		*	store 		guarda un nuevo registro 									*
		*	edit 		muestra el formulario para editar un registro segun el id 	*
		*	update 		actualiza un registro segun el id 							*
		*	destroy 	elimina un registro segun el id 							*
		*****************************************************************************/
	
class UsuarioController{

	private $usuario;

	public function __construct($db){
		$this->usuario = new Usuario($db);
	}

	public function edit($id){			
		ob_start();
		include USUARIO . '/edit.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function update($data){
		$data['nombre'] = filtrar_una_variable($data['nombre']);

		$required = array('nombre', 'pass');
		if(hay_variables_vacias($data, $required)){
			return $datos['respuesta'] = respuesta('warning', '', 'Por favor complete todos los campos');
		}

		//encriptar la pass
		$hash = new passwordHash();
		$data['pass'] = $hash->hash($data['pass']);

		$data['rut'] = $_SESSION['session']['rut'];

		$datos = $this->usuario->update($data);
		return $datos['respuesta'];
	}

}