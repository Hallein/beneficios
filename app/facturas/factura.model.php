<?php
	class Factura{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			//$query = $this->db->prepare(" 	SELECT * FROM pacientes ");
			//$query->bindParam(':fecha', $fecha);
			$query->execute();

			$datos = array();
			$datos['facturas'] = $query->fetchAll();
			return $datos;
		}

		public function show($id){

		}

		

		public function store($data){

		}

		public function update(){

		}

		public function delete(){

		}

	}