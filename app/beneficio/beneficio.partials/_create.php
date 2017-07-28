<div class="row center-xs">
	<div class="col-xs-12 col-md-6">
		<div class="card over-background">
			<div class="card-title text-primary-color dark-primary-color">
				<div class="row center-xs center-sm start-md">
					<div class="col-xs-12">
						Modificar beneficio habitacional
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row start-xs">
					<div class="col-xs-12">
						<div class="secondary-text-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus vitae et cupiditate, eum accusamus quas suscipit vel ex fugiat voluptate illo dolorum repellendus debitis dolore, laboriosam incidunt, ullam ratione. Officiis.</div>
					</div>
				</div>
				<div class="row center-xs">
					<div class="col-xs-12 col-sm-12 col-md-4">
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