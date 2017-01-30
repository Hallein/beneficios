<?php
	class Cliente{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function get(){

		}

		public function getAll(){
			$query = $this->db->prepare(" 	SELECT * FROM pacientes ");
			//$query->bindParam(':fecha', $fecha);
			$query->execute();

			$clientes = array();
			$clientes['clientes'] = $query->fetchAll();
			return $clientes;
		}

		public function create(){

		}

		public function edit(){

		}

		public function delete(){

		}

	}