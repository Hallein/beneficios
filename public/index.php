<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Antofagasta Minerals</title>
	<link rel="stylesheet" href="css/flexboxgrid.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/utilities.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="login-background">
	<section>
		<div class="container">
			<div class="container-fluid center-xs center-sm start-md">
				<div class="login-title text-primary-color"><strong>Beneficio habitacional</strong><br>Antofagasta Minerals S.A.</div>
			</div>
		</div>
		<div id="d-content" class="container-fluid">
			<div class="row center-xs">
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="card login-card">
						<div class="card-title text-primary-color dark-primary-color">
							Consultar por un beneficio
						</div>
						<div class="card-body over-background">
							<div class="row">
								<div class="col-xs-12">
									<div class="secondary-text-color">Ingrese sus datos para consultar por su beneficio habitacional activo.</div>
								</div>
							</div>
							<div class="row center-xs">
								<div class="col-xs-12 col-md-10 col-lg-10">
									<div class="form">
										<div class="container-fluid">
											<div class="form-input">
												<label for="user-rut">Rut</label>
												<input id="user-rut" type="text" maxlength="8">
												<div class="input-underline"></div>
											</div>
											<div class="form-input">
												<label for="user-company">Empresa</label>
												<select id="user-company">
													<option value="Los Pelambres">Los Pelambres</option>
													<option value="Centinela">Centinela</option>
													<option value="Antucoya">Antucoya</option>
													<option value="Zaldívar">Zaldívar</option>
												</select>
												<div class="input-underline"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div class="row center-xs">
							<div class="col-xs-12">
								<button id="send-button" class="btn btn-primary">Consultar</button>
							</div>
						</div>
						<br>
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
	<div id="floating-loader">
		<svg class="spinner" width="50px" height="50px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
		   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
		</svg>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/utilities.js"></script>
	<script src="js/init.js"></script>
	<script src="js/consulta.js"></script>
</body>
</html>