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
														COUNT(dv.ID_VENTA) AS CANTIDAD_VENTAS
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
														c.EMAIL_PERSONA
											ORDER BY	CANTIDAD_VENTAS DESC
											LIMIT		10');
			$query->execute();
			$datos = $query->fetchAll();
			return $datos;
		}

		public function productoMasVendido(){

		}
	}