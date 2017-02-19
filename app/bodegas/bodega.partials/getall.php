<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primary-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">BODEGAS</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar comparación"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nueva_bodega" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Agragar nueva bodega" onmousedown="FormularioBodega();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_bodegas" class="mdl-data-table" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>ID Bodega</th>
	                <th>Nombre</th>
	                <th>Dirección</th>
	                <th>Persona a cargo</th>
	                <th>Tipo de bodega</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>ID Bodega</th>
	                <th>Nombre</th>
	                <th>Dirección</th>
	                <th>Persona a cargo</th>
	                <th>Tipo de bodega</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <?php foreach($datos['bodegas'] as $dato){ ?>
	            <tr>
	            	<td><?php echo $dato['ID_BODEGA']; ?></td>
	                <td><?php echo $dato['NOMBRE_BODEGA']; ?></td>
	                <td><?php echo $dato['DIRECCION_BODEGA']; ?></td>
	                <td><?php echo $dato['RUT_PERSONA']; ?></td>		                
	                <td><?php echo $dato['TIPO_BODEGA']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver bodega"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar bodega"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar bodega"></div>
							</div>
						</div>
	                </td>
	            </tr>
	            <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
