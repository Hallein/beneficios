<?php

class AuthController{
	

	public function index(){
		ob_start();
		include AUTH . '/principal.php';
		$datos = ob_get_clean();

		return $datos;
	}

}