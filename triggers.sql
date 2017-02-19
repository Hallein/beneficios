--Trigger para calcular el sub total de un detalle de compra, multiplicando el valor del insumo con la cantidad

DELIMITER //
DROP TRIGGER IF EXISTS CALCULO_SUB_TOTAL_DETALLE_COMPRA //

CREATE TRIGGER CALCULO_SUB_TOTAL_DETALLE_COMPRA BEFORE INSERT ON detalle_compra
FOR EACH ROW BEGIN

  	SET NEW.SUB_TOTAL_COMPRA = (SELECT i.PRECIO_COMPRA FROM insumo i WHERE i.ID_INSUMO = NEW.ID_INSUMO) * NEW.CANTIDAD_COMPRADA; 
  
END//

DELIMITER ;


--Trigger para calcular el total y el iva de un documento de compra, a medida que se van insertando los detalles de compra

DELIMITER //
DROP TRIGGER IF EXISTS CALCULO_TOTAL_E_IVA_DOCUMENTO_COMPRA //

CREATE TRIGGER CALCULO_TOTAL_E_IVA_DOCUMENTO_COMPRA AFTER INSERT ON detalle_compra
FOR EACH ROW BEGIN
	DECLARE iva INT;
	DECLARE total INT;

  	SET iva = ROUND( NEW.SUB_TOTAL_COMPRA * 0.19 );
  	SET total = NEW.SUB_TOTAL_COMPRA;

  	UPDATE 	documento_compra dc
  	SET 	dc.VALOR_COMPRA = dc.VALOR_COMPRA + total,
  			dc.IVA = dc.IVA + iva
  	WHERE	dc.ID_COMPRA = NEW.ID_COMPRA;
  
END//

DELIMITER ;

--
--Trigger para calcular el sub total de un detalle de venta, multiplicando el valor del insumo con la cantidad

DELIMITER //
DROP TRIGGER IF EXISTS CALCULO_SUB_TOTAL_DETALLE_VENTA //

CREATE TRIGGER CALCULO_SUB_TOTAL_DETALLE_VENTA BEFORE INSERT ON detalle_venta
FOR EACH ROW BEGIN

  	SET NEW.SUB_TOTAL_VENTA = (SELECT i.PRECIO_VENTA FROM insumo i WHERE i.ID_INSUMO = NEW.ID_INSUMO) * NEW.CANTIDAD_VENDIDA; 
  
END//

DELIMITER ;


--Trigger para calcular el total y el iva de un documento de venta, a medida que se van insertando los detalles de venta

DELIMITER //
DROP TRIGGER IF EXISTS CALCULO_TOTAL_E_IVA_DOCUMENTO_VENTA //

CREATE TRIGGER CALCULO_TOTAL_E_IVA_DOCUMENTO_VENTA AFTER INSERT ON detalle_venta
FOR EACH ROW BEGIN
	DECLARE iva INT;
	DECLARE total INT;

  	SET iva = ROUND( NEW.SUB_TOTAL_VENTA * 0.19 );
  	SET total = NEW.SUB_TOTAL_VENTA;

  	UPDATE 	documento_VENTA dc
  	SET 	dc.VALOR_VENTA = dc.VALOR_VENTA + total,
  			dc.IVA = dc.IVA + iva
  	WHERE	dc.ID_VENTA = NEW.ID_VENTA;
  
END//

DELIMITER ;