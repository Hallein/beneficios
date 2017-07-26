<?php 
	session_start(); 
	if(!isset($_SESSION['session'])){
		header('Location: ../login/');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Antofagasta Minerals</title>
	<link rel="stylesheet" href="../css/flexboxgrid.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<nav class="default-primary-color">
		<div class="sidenav-title text-primary-color">ANTOFAGASTA MINERALS</div>
		<div class="sidenav-logo">
			<div class="row middle-xs">
				<div class="col-xs-12">
					<img src="../img/main-logo.png" alt="">
				</div>
			</div>			
		</div>
		<div class="sidenav-content">
			<ul class="navbar text-primary-color">
				<li class="nav-element dark-primary-color">Opcion 1</li>
				<li class="nav-element dark-primary-color">Opcion 2</li>
				<li class="nav-element dark-primary-color">Opcion 3</li>
				<li class="nav-element dark-primary-color">Opcion 4</li>
			</ul>
		</div>
	</nav>
	<div class="main-content light-primary-color">
		<header class="dark-primary-color ">
			<div class="row middle-xs center-xs application-title-container">
				<div class="col-xs-12">
					<div class="application-title text-primary-color">Sistema de consulta de proceso de beneficio habitacional</div>
				</div>
			</div>
		</header>
		<section class="main-image">
			<div class="row middle-xs center-xs introduction-title">
				<div class="col-xs-12">
					<div class="main-title text-primary-color">Lorem ipsum dolor sit amet</div>
					<div class="subtitle text-primary-color">consectetur adipisicing elit.</div>
				</div>				
			</div>
		</section>
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="card over-background">
							<div class="card-body">
								<div class="row">
									<div class="col-xs-2">
										<input type="text" class="form-input" placeholder="Ingrese algo">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="card"></div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="card"></div>
					</div>
				</div>
			</div>
		</section>
		<footer class="dark-primary-color text-primary-color">
			<div>Contacto Call Center</div>
			<div>Lunes a Viernes 09:00 - 18:00 hrs</div>
			<div>(+56) 9 93093404 - (+56) 572 440 483</div>
			<div>contacto@crecerconsultoresltda.cl</div>
		</footer>
	</div>	
</body>
</html>