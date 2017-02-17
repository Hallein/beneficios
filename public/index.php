<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/getmdl-select.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/flexboxgrid.min.css">
	<link rel="stylesheet" href="css/dataTables.material.min.css">
	<link rel="stylesheet" href="css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<!--<link rel="stylesheet" href="css/sweetalert.css">	-->
	<title>Dashboard 2.0</title>
</head>
<body>	
	<div id="d-header">
		<ul>
			<li>
				<div id="d-hamburguer" class="d-toggle-hamburguer">
					<span></span>
				</div>
			</li>
			<li class="d-title">Titulo Aplicación</li>
		</ul>
	</div>
	<div id="d-top-header">
		<ul id="d-top-breadcrumbs">
		</ul>
	</div>
	<div id="d-nav">
		<div class="d-nav-content">
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-1-crumb d-active d-active-crumb" onclick="MostrarInicio();">Inicio</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarClientes();">Clientes</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarTrabajadores();">Trabajadores</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarInsumos();">Insumos</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarVentas();">Ventas</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarArriendos();">Arriendos</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarCompras();">Compras</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarProveedores();">Proveedores</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarBodegas();">Bodegas</li>
				</ul>
			</div>
			<div class="d-nav-list">
				<ul>
					<li class="mdl-button mdl-js-button mdl-js-ripple-effect d-2-crumb" onclick="MostrarVehiculos();">Vehiculos</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="d-content">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="mdl-card">
					<div class="d-canvas">
						<div class="d-canvas-container">
							<div class="d-canvas-top-title d-new_user-icon">
								Nuevos clientes
							</div>
							<div class="d-canvas-middle-title">
								659
							</div>
							<div class="d-canvas-clientes-bottom-title">
								+15% desde ayer
							</div>
						</div>
						<canvas id="GraficoBarras" width="220" height="40"></canvas>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="mdl-card">
					<div class="d-canvas">
						<div class="d-canvas-container">
							<div class="d-canvas-top-title d-new_user-icon">
								Nuevos clientes
							</div>
							<div class="d-canvas-middle-title">
								659
							</div>
							<div class="d-canvas-clientes-bottom-title">
								+15% desde ayer
							</div>
						</div>
						<canvas id="GraficoLinea" width="220" height="40"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="d-footer">
		<div class="d-footer-content">Footer</div>		
	</div>
	<div id="overlay-loader">
		<div id="loader"></div>
	</div>
	<script src="js/libraries/jquery.min.js"></script>
	<script src="js/libraries/bootstrap.min.js"></script>
	<script src="js/libraries/material.min.js"></script>
	<script src="js/libraries/getmdl-select.min.js"></script>
	<script src="js/libraries/jquery.dataTables.min.js"></script>
	<script src="js/libraries/dataTables.material.min.js"></script>
	<script src="js/libraries/Chart.bundle.min.js"></script>
	<script src="js/libraries/dataTables.responsive.min.js"></script>
	<!--<script src="js/libraries/sweetalert.min.js"></script>-->
	<script src="js/init/init.js"></script>
	<script src="js/utilities/dashboard.js"></script>
	<script src="js/utilities/utilities.js"></script>
	<script src="js/utilities/charts.js"></script>
	<script src="js/utilities/multi-button.js"></script>
	<script src="js/utilities/Test.js"></script> <!--SOLO PARA VER MIS DISEÑOS-->
	<script src="js/inicio.js"></script>
	<script src="js/clientes.js"></script>
	<script src="js/insumos.js"></script>
	<script src="js/bodegas.js"></script>
	<script src="js/ventas.js"></script>
	<script src="js/arriendos.js"></script>
	<script src="js/proveedores.js"></script>
	<script src="js/compras.js"></script>
	<script src="js/vehiculos.js"></script>
	<script src="js/trabajadores.js"></script>

	<script src="js/auth.js"></script>
</body>
</html>