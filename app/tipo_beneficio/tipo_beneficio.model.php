<?php

class TipoBeneficio{

	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getAll(){
		$query = $this->db->prepare('
			SELECT 	TIPBEN_ID,
					TIPBEN_NOMBRE
			FROM 	TIPO_BENEFICIO
		');

		$query->execute();
		$datos = $query->fetchAll();
		
		return $datos;
	}

}