<div class="steps-container">
	<ul class="steps text-primary-color">
	<?php for($i = 0; $i < 6; $i++): 
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
				<div class="step-description"><?php echo $hito['nombre']; ?></div>
			<?php endforeach; ?>
			</div>
			<div class="col-sm-3">
			<?php foreach($etapa['hitos'] as $hito): ?>
				<div class="step-date"><?php echo $hito['fecha']; ?></div>
			<?php endforeach; ?>
			</div>
			<div class="col-sm-3">
			<?php foreach($etapa['hitos'] as $hito): ?>
				<div class="step-observation"><?php ($hito['detalle'] != '') ? print($hito['detalle']) : print('Sin observaciones'); ?></div>
			<?php endforeach; ?>
			</div>
		</div>			
	<?php endforeach; ?>
	</section>
</div>