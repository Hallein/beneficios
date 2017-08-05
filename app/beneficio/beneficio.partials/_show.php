<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card over-background">
            	<div class="card-title text-primary-color dark-primary-color">
	                <div class="row center-xs center-sm start-md">
	                    <div class="col-xs-12">
	                        <span class="btn-back"><i class="fa fa-arrow-left" aria-hidden="true"></i>
</span>Beneficio otogado a <?php echo $datos['beneficio']['PER_NOMBRE']; ?> de la empresa <?php echo $datos['beneficio']['BEN_EMPRESA']; ?>
	                    </div>
	                </div>
	            </div>
				<div class="card-body steps-container">
					<?php switch ($datos['beneficio']['BEN_ESTADO']):
						case '1':
							?>
							<div class="alert-message alert-yellow">Estado del beneficio: <strong>En proceso</strong></div>
							<?php
							break;
						case '2':
							?>
							<div class="alert-message alert-red">Estado del beneficio: <strong>Rechazado</strong></div>
							<?php
							break;
						case '3':
							?>
							<div class="alert-message alert-green">Estado del beneficio: <strong>Finalizado</strong></div>
							<?php
							break;
					endswitch;
					?>				
					<ul class="steps text-primary-color">
					<?php for($i = 0; $i < 6; $i++): //pelotas
							$class = '';
							if($datos['beneficio']['ID_ETAPA_ACTUAL'] >= ($i + 1)):
								$class = 'active-step';
							endif;
						?>
						<li class="step <?php echo $class; ?>"><?php echo ($i + 1); ?></li>
					<?php endfor; ?>
					</ul>
					<section class="container-fluid secondary-text-color">
						<div class="row">
							<div class="col-xs-12 col-sm-2">
								<div class="step-header primary-text-color">Etapa</div>
							</div>
							<div class="col-xs-12 col-sm-10">
								<div class="row">
									<div class="col-xs-12 col-sm-5">
										<div class="step-header primary-text-color">Estado del proceso</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="step-header primary-text-color">Fecha de creación</div>
									</div>
									<div class="col-xs-12 col-sm-4">
										<div class="step-header primary-text-color">Observaciones</div>
									</div>
								</div>
							</div>
						</div>
					<?php foreach($etapas as $etapa): 
						$class = '';
						$options = '';
						if($etapa['ETA_ID'] == $datos['beneficio']['ID_ETAPA_ACTUAL'] && $datos['beneficio']['BEN_ESTADO'] == 1):
							$class='active-step';
							$options = '<button id="btn-end" class="btn-round btn-options btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>';
						endif;
						?>
						<div class="row row-separation <?php echo $class; ?>">
							<div class="col-xs-12 col-sm-2">
								<div class="step-name <?php echo $class; ?>"><?php echo $etapa['ETA_NOMBRE']; ?>
									<div><button class="btn-round btn-options btn-edit btn-add"><i class="fa fa-plus" aria-hidden="true"></i></button><?php echo $options; ?></div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-10">
							<?php foreach($hitos as $hito): 
									if($hito['ETA_ID'] == $etapa['ETA_ID']):
							?>							
								<div class="row row-separation">
									<div class="col-xs-12 col-sm-5">									
										<div class="step-description">- <?php echo $hito['HITO_NOMBRE']; ?></div><br>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="step-date"><?php echo $hito['HB_FECHA']; ?></div><br>
									</div>
									<div class="col-xs-12 col-sm-4">
										<div class="step-observation"><?php ($hito['HB_DETALLE']!='') ? print($hito['HB_DETALLE']):print('Sin observaciones'); ?></div><br>
									</div>
								</div>
							<?php 
									endif;
								endforeach; ?>
							</div>		
						</div>
					<?php endforeach; ?>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>