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

	public function edit(){			
		ob_start();
		include USUARIO . '/_edit.php';
		$datos['respuesta']['html'] = ob_get_clean();

		return $datos['respuesta'];
	}

	public function update($data){

		$required = array('pass', 'newpass1', 'newpass2');
		if(hay_variables_vacias($data, $required)){
			return $datos['respuesta'] = respuesta('warning', '', 'Por favor complete todos los campos');
		}

		$hash = new passwordHash();
		$data['rut'] = $_SESSION['session']['rut'];

		//recibir dos contraseñas: la nueva y la nueva-confirmacion y ver si son iguales
		if(strcmp($data['newpass1'], $data['newpass2']) !== 0){
			return respuesta('error', '', 'Las contraseñas no coinciden');
		}

		//recibir la contraseña actual y validarla
		$pass = $this->usuario->getPass($data['rut']);
		if(!check_password($data['pass'], $pass)){
			return respuesta('error', '', 'La contraseña es incorrecta');
		}

		//si son iguales, actualizar la contraseña
		$data['pass'] = $hash->hash($data['newpass1']);

		$datos = $this->usuario->update($data);
		return $datos['respuesta'];
	}

}