<?php 
	session_start(); 
	if(!isset($_SESSION['session'])){
		header('Location: ../login/');
	}
	require '../../app/libs/funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Antofagasta Minerals</title>
	<link rel="icon" href="../img/main-logo.png" type="image/png">
	<link rel="stylesheet" href="../css/flexboxgrid.min.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/dataTables.material.min.css">	
	<link rel="stylesheet" href="../css/datepicker/default.css">
	<link rel="stylesheet" href="../css/datepicker/default.date.css">	
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/utilities.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<nav class="default-primary-color">
		<div class="sidenav-title text-primary-color">ANTOFAGASTA MINERALS</div>
		<div class="sidenav-logo">
			<div class="row middle-xs">
				<div class="col-xs-12">
					<img src="../img/main-logo.png" alt="Antofahasta Minerals">
				</div>
			</div>			
		</div>
		<div class="sidenav-content">
			<div class="user-info">
				<div class="info-rut"><?php echo ObtieneRutFormateado($_SESSION['session']['US_RUT']); ?></div>
				<div class="info-name"><?php echo $_SESSION['session']['US_NOMBRE']; ?></div>
			</div>
			<ul class="navbar text-primary-color">
				<li id="beneficios-nav" class="nav-element dark-primary-color nav-element-active">Beneficios <i class="fa fa-lg fa-usd" aria-hidden="true"></i></li>
				<li id="cuenta-nav" class="nav-element dark-primary-color">Mi cuenta <i class="fa fa-lg fa-user-circle" aria-hidden="true"></i></li>
				<li id="salir-nav" class="nav-element dark-primary-color">Cerrar sesión<i class="fa fa-lg fa-sign-out" aria-hidden="true"></i></li>
			</ul>
		</div>
		<div class="secondary-logo"></div>
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
					<div id="main-title" class="main-title text-primary-color"></div>
				</div>				
			</div>
		</section>
		<section id="d-content"></section>
		<footer class="dark-primary-color text-primary-color">
			<div>Contacto Call Center</div>
			<div>Lunes a Viernes 09:00 - 18:00 hrs</div>
			<div>(+56) 9 93093404 - (+56) 572 440 483</div>
			<div>contacto@crecerconsultoresltda.cl</div>
		</footer>
		<div id="floating-loader">
			<svg class="spinner" width="50px" height="50px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
			   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
			</svg>
		</div>
	</div>	
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
	<script src="../js/dataTables.material.min.js"></script>
	<script src="../js/datepicker/picker.js"></script>
    <script src="../js/datepicker/picker.date.js"></script>
    <script src="../js/datepicker/legacy.js"></script>
    <script src="../js/datepicker/translations/es_ES.js"></script>
	<script src="../js/init.js"></script>
	<script src="../js/utilities.js"></script>	
	<script src="../js/admin.js"></script>
	<script src="../js/beneficios.js"></script>
</body>
</html>