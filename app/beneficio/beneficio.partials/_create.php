<div class="row center-xs">
	<div class="col-xs-12 col-md-6">
		<div class="card over-background">
			<div class="card-title text-primary-color dark-primary-color">
				<div class="row center-xs center-sm start-md">
					<div class="col-xs-12">
						<span class="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i>
</span>Ingresar nuevo beneficio habitacional
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row start-xs">
					<div class="col-xs-12">
						<div class="secondary-text-color">Ingrese los datos para crear un nuevo proceso de beneficio habitacional.</div>
					</div>
				</div>
				<div class="row center-xs">
					<div class="col-xs-12 col-sm-12 col-md-4">
						<div class="form-input">
							<label for="user-rut">Rut</label>
							<input id="user-rut" type="text" maxlength="8">
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
				<div class="row center-xs">
					<div class="col-xs-12 col-sm-12 col-md-4">
						<div class="form-input">
							<label for="benefit-type">Tipo de beneficio</label>
							<select id="benefit-type">
							<?php
							foreach ($datos['tipo_beneficio'] as $tipo):
							?>
								<option value="<?php echo $tipo['TIPBEN_ID'];?>"><?php echo $tipo['TIPBEN_NOMBRE'] ?></option>
							<?php
							endforeach;
							?>
							</select>
							<div class="input-underline"></div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4">
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
				<br>
				<br>
				<div class="row center-xs">
					<div class="col-xs-12">
						<button id="create-button" class="btn btn-primary">Ingresar</button>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>