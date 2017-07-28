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
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">
						<div class="form-input">
							<label for="user-rut">Rut</label>
							<input id="user-rut" type="text" disabled value="<?php echo $datos['beneficio']['PER_RUT']; ?>">
							<div class="input-underline"></div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4">
						<div class="form-input">
							<label for="user-name">Nombre</label>
							<input id="user-name" type="text" value="<?php echo $datos['beneficio']['PER_NOMBRE']; ?>">
							<div class="input-underline"></div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-2">
						<div class="form-input">
							<label for="benefit-status">Estado</label>
							<select id="benefit-status">
							<?php switch ($datos['beneficio']['BEN_ESTADO']):
								case '1':
									?>
									<option value="1" selected>En proceso</option>
									<option value="2">Rechazado</option>
									<option value="3">Finalizado</option>
									<?php
									break;
								case '2':
									?>
									<option value="1">En proceso</option>
									<option value="2" selected>Rechazado</option>
									<option value="3">Finalizado</option>
									<?php
									break;
								case '3':
									?>
									<option value="1">En proceso</option>
									<option value="2">Rechazado</option>
									<option value="3" selected>Finalizado</option>
									<?php
								break;
								default:
									?>
									<option value="1">En proceso</option>
									<option value="2">Rechazado</option>
									<option value="3">Finalizado</option>							
									<?php
									break;
							endswitch; ?>								
							</select>
							<div class="input-underline"></div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-4">
						<div class="form-input">
							<label for="benefit-type">Tipo de beneficio</label>
							<select id="benefit-type">
							<?php
							foreach ($datos['tipo_beneficio'] as $tipo):
								$selected = '';
								if($tipo['TIPBEN_ID'] == $datos['beneficio']['TIPBEN_ID']):
									$selected = 'selected';
								endif;
							?>
								<option value="<?php echo $tipo['TIPBEN_ID'];?>" <?php echo $selected; ?>><?php echo $tipo['TIPBEN_NOMBRE'] ?></option>
							<?php
							endforeach;
							?>
							</select>
							<div class="input-underline"></div>
						</div>
					</div>
				</div>
				<br>
				<div class="row center-xs">
					<div class="col-xs-12 col-sm-12 col-md-4">
						<div class="form-input">
							<label for="user-company">Empresa</label>
							<select id="user-company">
								<?php switch ($datos['beneficio']['BEN_EMPRESA']):
								case 'Los Pelambres':
									?>
									<option value="Los Pelambres" selected>Los Pelambres</option>
									<option value="Centinela">Centinela</option>
									<option value="Antucoya">Antucoya</option>
									<option value="Zaldívar">Zaldívar</option>
									<?php
									break;
								case 'Centinela':
									?>
									<option value="Los Pelambres">Los Pelambres</option>
									<option value="Centinela" selected>Centinela</option>
									<option value="Antucoya">Antucoya</option>
									<option value="Zaldívar">Zaldívar</option>
									<?php
									break;
								case 'Antucoya':
									?>
									<option value="Los Pelambres">Los Pelambres</option>
									<option value="Centinela">Centinela</option>
									<option value="Antucoya" selected>Antucoya</option>
									<option value="Zaldívar">Zaldívar</option>
									<?php
								break;
								case 'Zaldívar':
									?>
									<option value="Los Pelambres">Los Pelambres</option>
									<option value="Centinela">Centinela</option>
									<option value="Antucoya">Antucoya</option>
									<option value="Zaldívar" selected>Zaldívar</option>
									<?php
								break;
								default:
									?>
									<option value="Los Pelambres">Los Pelambres</option>
									<option value="Centinela">Centinela</option>
									<option value="Antucoya">Antucoya</option>
									<option value="Zaldívar">Zaldívar</option>							
									<?php
									break;
								endswitch; ?>																
							</select>
							<div class="input-underline"></div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row center-xs">
					<div class="col-xs-12">
						<button id="modify-button" class="btn btn-primary">Modificar</button>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>