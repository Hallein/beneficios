<?php 
	session_start(); 
	if(isset($_SESSION['session'])){
		header('Location: ../admin/');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Antofagasta Minerals</title>
	<link rel="stylesheet" href="../css/flexboxgrid.min.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.css">
	<style>
		body{
			background-color: #eee;
		}
	</style>
</head>
<body class="login-background">
	<section>
		<div class="container">
			<div class="container-fluid center-xs center-sm start-md">
				<div class="login-title text-primary-color"><strong>Beneficio hanitacional</strong><br>Antofagasta Minerals S.A.</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row center-xs">
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card login-card">
						<div class="card-title text-primary-color dark-primary-color">
							Login
						</div>
						<div class="login-form">
							<div class="container-fluid">
								<div class="rut-user">
									<label for="rut-user">RUT</label>
									<input id="rut-user" type="text" placeholder="Ingrese su RUT">
									<div class="input-underline"></div>
								</div>
								<div class="pass-user">
									<label for="pass-user">Constraseña</label>
									<input id="pass-user" type="text" placeholder="Ingrese su clave">
									<div class="input-underline"></div>
								</div>
							</div>
						</div>
						<div>
							<button id="login-button" class="btn btn-primary">Ingresar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="login-footer text-primary-color">
			<div>Contacto Call Center</div>
			<div>Lunes a Viernes 09:00 - 18:00 hrs</div>
			<div>(+56) 9 93093404 - (+56) 572 440 483</div>
			<div>contacto@crecerconsultoresltda.cl</div>
		</div>
	</section>

	<script src="../js/jquery.min.js"></script>
	<script>
	$(function(){

		$('#login-button').on('click', login);

		function login(){
			var data = {
				rut: $('#rut-user').val(),
				pass: $('#pass-user').val()
			};
			$.post('../api/login', data).done(function(respuesta){
				console.log(respuesta);
			});

		}

	});

	</script>
</body>
</html>