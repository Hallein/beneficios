<?php
	class Cliente{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			$query = $this->db->prepare(" SELECT * FROM cliente ");
			//$query->bindParam(':fecha', $fecha);
			$query->execute();
			$datos['clientes'] = $query->fetchAll();
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