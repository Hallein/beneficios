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
	<div id="d-main">
		<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
			<div class="mdl-card mdl-shadow--3dp d-login">
				<div class="d-marker"></div>	
				<div class="col-xs-12">
					<div class="d-login-main">					
						<h3>Login</h3>
						<form>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						    	<input class="mdl-textfield__input" id="usuario_login" type="text">
						    	<label class="mdl-textfield__label" for="usuario_login">Usuario</label>
						  	</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						    	<input class="mdl-textfield__input" id="contrasena_login" type="password">
						    	<label class="mdl-textfield__label" for="contrasena_login">Contraseña</label>
						  	</div>
						  	<button type="button" id="enviar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored d-center-block d-accent-color" onclick="LoginUsuario();">
								Ingresar
							</button>
					  	</form>
					</div>
				</div>
			</div>
		</div>
		<div id="d-background"></div>
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
	<script src="js/utilities/Test.js"></script> <!--SOLO PARA VER MIS DISEÑOS-->
	<script src="js/utilities/dashboard.js"></script>
	<script src="js/utilities/utilities.js"></script>
	<script src="js/utilities/charts.js"></script>
	<script src="js/utilities/multi-button.js"></script>	
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
	<script src="js/login.js"></script>
	<script src="js/init/init.js"></script>
</body>
</html>