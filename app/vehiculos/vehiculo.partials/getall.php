<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primaty-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">VEHICULOS</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar comparación"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nuevo_vehiculo" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Agragar nuevo vehiculo" onmousedown="FormularioVehiculo();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_vehiculo" class="mdl-data-table" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Patente</th>
	                <th>Marca</th>
	                <th>Modelo</th>
	                <th>Año fabricación</th>
	                <th>Tipo de vehiculo</th>
	                <th>Estado</th>
	                <th>Tipo de patente</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Patente</th>
	                <th>Marca</th>
	                <th>Modelo</th>
	                <th>Año fabricación</th>
	                <th>Tipo de vehiculo</th>
	                <th>Estado</th>
	                <th>Tipo de patente</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <?php foreach($datos['vehiculos'] as $dato){ ?>
	            <tr>
	            	<td><?php echo $dato['NRO_PATENTE']; ?></td>
	                <td><?php echo $dato['MARCA']; ?></td>		                
	                <td><?php echo $dato['MODELO']; ?></td>
	                <td><?php echo $dato['ANHO_FABRICACION']; ?></td>
	                <td><?php echo $dato['TIPO_VEHICULO']; ?></td>
	                <td><?php echo $dato['ESTADO_VEHICULO']; ?></td>
	                <td><?php echo $dato['TIPO_PATENTE']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver vehiculo"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar vehiculo"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar vehiculo"></div>
							</div>
						</div>
	                </td>
	            </tr>
	            <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
