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
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="../css/dataTables.material.min.css">	
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
			<ul class="navbar text-primary-color">
				<li class="nav-element dark-primary-color">Opcion 1</li>
				<li class="nav-element dark-primary-color">Opcion 2</li>
				<li class="nav-element dark-primary-color">Opcion 3</li>
				<li class="nav-element dark-primary-color">Opcion 4</li>
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
					<div class="main-title text-primary-color">Lorem ipsum dolor sit amet</div>
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
									<div class="col-xs-12">
										<div id="d-content">
											<table id="listado-beneficios" class="mdl-data-table dataTable" width="100%" cellspacing="0">
										        <thead>
										            <tr>
										                <th>Rut</th>
										                <th>Nombre</th>
										                <th>Empresa</th>
										                <th>Tipo beneficio</th>
										                <th>Estado</th>
										                <th class="all">Opcion</th>
										            </tr>
										        </thead>
										        <tfoot>
										            <tr>
										                <th>Rut</th>
										                <th>Nombre</th>
										                <th>Empresa</th>
										                <th>Tipo beneficio</th>
										                <th>Estado</th>
										                <th>Opcion</th>
										            </tr>
										        </tfoot>
										        <tbody>
										            <tr>
										            	<td>asdsa</td>
										                <td>asdsa</td>		                
										                <td>asdasd</td>
										                <td>asdasd</td>
										                <td>sadas</td>
										                <td>asdsa</td>
										            </tr>
										        </tbody>
										    </table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="card">
							<div class="card-title text-primary-color dark-primary-color">
								<div class="row center-xs center-sm start-md">
									<div class="col-xs-12">
										Ingresar nuevo beneficio ministerial
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="secondary-text-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae et cupiditate, eum accusamus quas suscipit vel ex fugiat voluptate illo dolorum repellendus debitis dolore, laboriosam incidunt, ullam ratione. Officiis.</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">
										<div class="form-input">
											<label for="user-rut">Rut</label>
											<input id="user-rut" type="text">
											<div class="input-underline"></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4">
										<div class="form-input">
											<label for="user-name">Nombre</label>
											<input id="user-name" type="text">
											<div class="input-underline"></div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">
										<div class="form-input">
											<label for="user-company">Empresa</label>
											<select id="user-company">
												<option value="">1</option>
												<option value="">2</option>
											</select>
											<div class="input-underline"></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4">
										<div class="form-input">
											<label for="user-benefit">Tipo de beneficio</label>
											<select id="user-benefit">
												<option value="">1</option>
												<option value="">2</option>
											</select>
											<div class="input-underline"></div>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="row center-xs">
									<div class="col-xs-12">
										<button id="login-button" class="btn btn-primary">Ingresar</button>
									</div>
								</div>
								<br>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="card">
							<div class="card-title text-primary-color dark-primary-color">
								<div class="row center-xs center-sm start-md">
									<div class="col-xs-12">
										Ingresar nuevo hito
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-xs-12">
										<div class="secondary-text-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae et cupiditate, eum accusamus quas suscipit vel ex fugiat voluptate illo dolorum repellendus debitis dolore, laboriosam incidunt, ullam ratione. Officiis.</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
										<div class="form-input">
											<label for="user-company">Hito</label>
											<select id="user-company">
												<option value="">1</option>
												<option value="">2</option>
											</select>
											<div class="input-underline"></div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
										<div class="form-input">
											<label for="textarea-prueba1">Detalle</label>
											<textarea id="textarea-prueba1"></textarea>
											<div class="input-underline"></div>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="row center-xs">
									<div class="col-xs-12">
										<button id="login-button" class="btn btn-primary">Ingresar</button>
									</div>
								</div>
								<br>
							</div>
						</div>
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
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.responsive.min.js"></script>
	<script src="../js/dataTables.material.min.js"></script>		
	<script src="../js/j-form.js"></script>
	<script src="../js/admin.js"></script>
</body>
</html>