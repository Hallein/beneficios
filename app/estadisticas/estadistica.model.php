<?php

	class Estadistica{
		private $db;

		public function __construct($db){
			$this->db = $db;
		}

		public function topTrabajadores(){
			
		}

		public function topClientes(){
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
														c.EMAIL_PERSONA,
														COUNT(dv.ID_VENTA)
											FROM		cliente c
											INNER JOIN 	documento_venta dv
											ON 			dv.RUT_PERSONA = c.RUT_PERSONA
											GROUP BY 	c.RUT_PERSONA,
														c.ID_COMUNA, 
														c.ID_SEXO, 
														c.EMPRESA, 
														c.NOMBRE_PERSONA, 
														c.APATERNO_PERSONA, 
														c.AMATERNO_PERSONA, 
														c.FECHA_NACIMIENTO,
														c.DIRECCION_PERSONA,
														c.TELEFONO_PERSONA,
														c.EMAIL_PERSONA');
			$query->execute();
			$datos['vehiculos'] = $query->fetchAll();
			return $datos;
		}

		public function productoMasVendido(){

		}
	}