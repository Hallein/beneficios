<?php
	class Cliente{

		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function getAll(){
			//$query = $this->db->prepare(" 	SELECT * FROM pacientes ");
			//$query->bindParam(':fecha', $fecha);
			//$query->execute();

			$datos['clientes'] = array([
							'RUT_PERSONA' => '17416925-K',
							'NOMBRE_PERSONA' => 'Fernando',
							'APATERNO_PERSONA' => 'Diaz',
							'AMATERNO_PERSONA' => 'Nuñez',
							'TELEFONO_PERSONA' => '971063826',
							'EMAIL_PERSONA' => 'piratemani@gmail.com',
							'DIRECCION_PERSONA' => 'Alberto Genari #2110'
							]);
			/*$hola = array(['RUT_PERSONA' => '17095407-6',
							'NOMBRE_PERSONA' => 'Julio',
							'APATERNO_PERSONA' => 'Caruncho',
							'AMATERNO_PERSONA' => 'Arriagada',
							'TELEFONO_PERSONA' => '998664844',
							'EMAIL_PERSONA' => 'julio.caruncho.a@gmail.com',
							'DIRECCION_PERSONA' => 'Arturo Fernandez #751']);

			array_push($datos['clientes'], $hola);*/
			//$datos['clientes'] = $query->fetchAll();
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