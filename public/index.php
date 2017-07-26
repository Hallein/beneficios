<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consulta de Beneficios</title>
</head>
<body>
	<h1>Consulta de beneficios habitacionales</h1>
	<p>Esta página será estática, tendrá un formulario con dos inputs: RUT (text) y Empresa (select).</p>
	<p>Mediante AJAX llamará a la ruta GET '/consulta/{empresa}/{rut}', la que devolderá las Etapas e Hitos de la persona consultada.</p>
</body>
</html>