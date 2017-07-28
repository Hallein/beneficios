<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card over-background">
            	<div class="card-title text-primary-color dark-primary-color">
	                <div class="row center-xs center-sm start-md">
	                    <div class="col-xs-12">
	                        Beneficio otogado a <?php echo $datos['beneficio']['PER_NOMBRE']; ?> de la empresa <?php echo $datos['beneficio']['BEN_EMPRESA']; ?>
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
					<?php for($i=0;$i<6;$i++): 
							$class = '';
							if($datos['beneficio']['ID_ETAPA_ACTUAL']>=($i+1)):
								$class = 'active-step';
							endif;
						?>
						<li class="step <?php echo $class; ?>"><?php echo ($i+1); ?></li>
					<?php endfor; ?>
					</ul>
					<section class="container-fluid secondary-text-color">
						<div class="row">
							<div class="col-sm-2">
								<div class="step-header primary-text-color">Etapa</div>
							</div>
							<div class="col-sm-4">
								<div class="step-header primary-text-color">Estado del proceso</div>
							</div>
							<div class="col-sm-3">
								<div class="step-header primary-text-color">Fecha de creación</div>
							</div>
							<div class="col-sm-3">
								<div class="step-header primary-text-color">Observaciones</div>
							</div>
						</div>
					<?php foreach($HE as $etapa): 
							$class = '';
							if($etapa['id'] == $datos['beneficio']['ID_ETAPA_ACTUAL']):
								$class='active-step';
							endif;
							?>
							<div class="row row-separation">
							<div class="col-sm-2">
								<div class="step-name <?php echo $class; ?>"><?php echo $etapa['nombre']; ?></div>
							</div>
							<div class="col-sm-4">
							<?php foreach($etapa['hitos'] as $hito): ?>
								<div class="step-description">- <?php echo $hito['nombre']; ?></div><br>
							<?php endforeach; ?>
							</div>
							<div class="col-sm-3">
							<?php foreach($etapa['hitos'] as $hito): ?>
								<div class="step-date"><?php echo $hito['fecha']; ?></div><br>
							<?php endforeach; ?>
							</div>
							<div class="col-sm-3">
							<?php foreach($etapa['hitos'] as $hito): ?>
								<div class="step-observation"><?php ($hito['detalle']!='') ? print($hito['detalle']):print('Sin observaciones'); ?></div><br>
							<?php endforeach; ?>
							</div>
						</div>			
					<?php endforeach; ?>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>