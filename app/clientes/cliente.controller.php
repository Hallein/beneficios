<?php
	class ClientesController{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function get(){

		}

		public function getAll(){
			$cliente = new Cliente($this->db);
			$clientes = $cliente->getAll();

			ob_start();
			include CLIENTES . '/getall.php';
			$clientes['html'] = ob_get_clean();

			return $clientes;
		}

		public function create(){

		}

		public function edit(){

		}

		public function delete(){

		}

	}