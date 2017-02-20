<?php

class Estadistica{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function topTrabajadores(){
		
	}

	public function topClientes(){

		$query = $this->db->prepare('	SELECT 		c.NOMBRE_PERSONA, 
													c.APATERNO_PERSONA, 
													c.AMATERNO_PERSONA,
													COUNT(dv.ID_VENTA) AS CANTIDAD_VENTAS
										FROM		cliente c
										INNER JOIN 	documento_venta dv
										ON 			dv.RUT_PERSONA = c.RUT_PERSONA
										GROUP BY 	c.NOMBRE_PERSONA, 
													c.APATERNO_PERSONA, 
													c.AMATERNO_PERSONA
										ORDER BY	CANTIDAD_VENTAS DESC
										LIMIT		10');
		$query->execute();
		$datos = $query->fetchAll();
		return $datos;
	}

	public function productoMasVendido(){

		$query = $this->db->prepare('	SELECT 		i.NOMBRE_INSUMO,
													SUM(dv.CANTIDAD_VENDIDA) AS CANTIDAD_VENTAS
										FROM		insumo i
										INNER JOIN	detalle_venta dv
										ON			dv.ID_INSUMO = i.ID_INSUMO
										GROUP BY	i.NOMBRE_INSUMO
										ORDER BY	CANTIDAD_VENTAS DESC
										LIMIT		10');
		$query->execute();
		$datos = $query->fetchAll();
		return $datos;
	}

	public function promedioVentas(){
		$query = $this->db->prepare('	SELECT 		DATE_FORMAT(documento_venta.FECHA_VENTA, "%m") AS MES, 
													DATE_FORMAT(documento_venta.FECHA_VENTA, "%Y") AS ANHO,
													SUM(documento_venta.VALOR_VENTA) AS VENTAS
										FROM 		documento_venta
										WHERE 		documento_venta.FECHA_VENTA 
										BETWEEN 	(now() - INTERVAL 7 month) 
										AND 		(now() - INTERVAL 1 month)
										GROUP BY 	MES, ANHO,documento_venta.FECHA_VENTA
										ORDER BY 	ANHO DESC, 
													MES DESC');
		$query->execute();
		$datos['ventas-por-mes'] = $query->fetchAll();

		$query = $this->db->prepare('	SELECT 	ROUND(AVG(p.VENTAS), 0) AS PROMEDIO
										FROM 	(
										    	SELECT 	SUM(documento_venta.VALOR_VENTA) AS VENTAS
										    	FROM 	documento_venta
										    	WHERE 	documento_venta.FECHA_VENTA 
										    	BETWEEN (now() - INTERVAL 7 month) 
										    	AND 	(now() - INTERVAL 1 month)
										)p');
		$query->execute();
		$datos['promedio'] = $query->fetchAll();


		return $datos;
	}
}


	/*
	SELECT DATE_FORMAT(documento_venta.FECHA_VENTA, "%m") AS MES, 
	DATE_FORMAT(documento_venta.FECHA_VENTA, "%Y") AS ANHO,
	SUM(documento_venta.VALOR_VENTA) AS VENTAS
	FROM documento_venta
	WHERE documento_venta.FECHA_VENTA BETWEEN (now() - INTERVAL 7 month) AND (now() - INTERVAL 1 month)
	GROUP BY MES, ANHO,documento_venta.FECHA_VENTA
	ORDER BY ANHO DESC, MES DESC;
*/

	/*
	SELECT AVG(p.VENTAS) AS PROMEDIO
	FROM (
	    SELECT SUM(documento_venta.VALOR_VENTA) AS VENTAS
	    FROM documento_venta
	    WHERE documento_venta.FECHA_VENTA BETWEEN (now() - INTERVAL 7 month) AND (now() - INTERVAL 1 month)
	)p
*/