<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primary-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">DOCUMENTOS DE ARRIENDO</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar comparación"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nuevo_arriendo" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Ingresar nuevo arriendo" onmousedown="FormularioArriendo();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_arriendos" class="mdl-data-table dataTable" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Codgio</th>
	                <th>Tipo de arriendo</th>
	                <th>Servicio</th>
	                <th>Fecha Inicio</th>
	                <th>Fecha termino</th>
	                <th>Estado</th>
	                <th class="all"></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Codgio</th>
	                <th>Tipo de arriendo</th>
	                <th>Servicio</th>
	                <th>Fecha Inicio</th>
	                <th>Fecha termino</th>
	                <th>Estado</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	        <?php if (is_array($datos['arriendos']) || is_object(['arriendos'])) { ?>
				<?php foreach ($datos['arriendos'] as $dato) { ?>
	            <tr>
	            	<td><?php echo $dato['ID_SERVICIO']; ?></td>
	                <td><?php echo $dato['NOMBRE_SERVICIO']; ?></td>		                
	                <td><?php echo $dato['TIPO_SERVICIO']; ?></td>
	                <td><?php echo $dato['FECHA_INICIO']; ?></td>
	                <td><?php echo $dato['FECHA_TERMINO']; ?></td>
	                <td><?php echo $dato['ESTADO_SERVICIO']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver venta"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar venta"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar venta"></div>
							</div>
						</div>
	                </td>
	            </tr>
	            <?php } ?>
	        <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
