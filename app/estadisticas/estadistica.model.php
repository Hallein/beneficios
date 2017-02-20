<?php

	class Estadistica{
		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function topTrabajadores(){
			$query = $this->db->prepare('	SELECT 		c.RUT_PERSONA,
														c.ID_COMUNA, 
														c.ID_SEXO, 
														c.EMPRESA, 
														c.NOMBRE_PERSONA, 
														c.APATERNO_PERSONA, 
														c.AMATERNO_PERSONA, 
														c.FECHA_NACIMIENTO,
														c.DIRECCION_PERSONA,
														c.TELEFONO_PERSONA,
														c.EMAIL_PERSONA
											FROM		cliente c
											INNER JOIN 	tipo_vehiculo tv
											ON 			tv.ID_TIPO_VEHICULO = c.ID_TIPO_VEHICULO');
			$query->execute();
			$datos['vehiculos'] = $query->fetchAll();
			return $datos;
		}

		public function topClientes(){

		}

		public function productoMasVendido(){

		}
	}