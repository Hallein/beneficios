<div class="container-fluid">
	<div class="row center-xs">
		<div class="col-xs-12">
			<div class="card over-background">
				<div class="card-title text-primary-color dark-primary-color">
					<div class="row center-xs center-sm start-md">
						<div class="col-xs-12">
							<span class="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i>
	</span>Ingresar nuevo hito
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row start-xs">
						<div class="col-xs-12">
							<div class="secondary-text-color">Ingrese los datos para agregar un nuevo hito a esta etapa.</div>
						</div>
					</div>
					<br>
					<section class="container-fluid secondary-text-color steps-container">
						<div class="row start-xs">
							<div class="col-xs-12 col-sm-2">
								<div class="step-header primary-text-color">Etapa</div>
							</div>
							<div class="col-xs-12 col-sm-10">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-4">
										<div class="step-header primary-text-color">Estado del proceso</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2">
										<div class="step-header primary-text-color">Fecha de creación</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4">
										<div class="step-header primary-text-color">Observaciones</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2">
										<div class="step-header primary-text-color">Opciones</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row start-xs row-separation">
							<div class="col-xs-12 col-sm-2">
								<div class="step-name active-step">Etapa <?php echo $ultima_etapa; ?></div>
							</div>
							<div class="col-xs-12 col-sm-10">
							<?php foreach($datos['hito_beneficio'] as $hito): ?>							
								<div class="row row-separation start-xs">
									<div class="col-xs-12 col-sm-12 col-md-4">									
										<div class="step-description">- <?php echo $hito['HITO_NOMBRE']; ?></div><br>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2">
										<div class="step-date"><?php echo $hito['HB_FECHA']; ?></div><br>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4">
										<div class="step-observation"><?php ($hito['HB_DETALLE']!='') ? print($hito['HB_DETALLE']):print('Sin observaciones'); ?></div><br>
									</div>
									<div class="col-xs-12 col-sm-12 col-sm-12 col-md-2">
										<button class="step-option btn-round btn-danger delete" data-val="<?php echo $hito['HITO_ID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
									</div>
								</div>
							<?php endforeach; ?>	
							</div>		
						</div>
					</section>			
					<br>
					<div class="row start-xs">
						<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
							<div class="form-input" style="z-index: 2000;">
								<label for="hito-date">Fecha</label>
								<input id="hito-date" type="text">
								<div class="input-underline"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
							<div class="form-input">
								<label for="hito">Hito</label>
								<select id="hito">
								<?php 
								foreach ($hitos as $hito):
								?>
									<option value="<?php echo $hito['HITO_ID']; ?>"><?php echo $hito['HITO_NOMBRE']; ?></option>
								<?php
								endforeach;
								?>
								</select>
								<div class="input-underline"></div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-md-offset-4">
							<div class="form-input">
								<label for="observation">Observación</label>
								<textarea id="observation"></textarea>
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
</div>