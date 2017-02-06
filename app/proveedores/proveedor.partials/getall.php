<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primaty-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">Proveedores</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar comparación"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nuevo_proveedor" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Agragar nuevo proveedor" onmousedown="FormularioProveedor();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_proveedores" class="mdl-data-table" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Rut</th>
	                <th>Nombre</th>
	                <th>Ciudad</th>
	                <th>Pais</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Rut</th>
	                <th>Nombre</th>
	                <th>Ciudad</th>
	                <th>Pais</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <?php foreach($datos['proveedores'] as $dato){ ?>
	            <tr>
	            	<td><?php echo $dato['RUT_PROVEEDOR']; ?></td>
	                <td><?php echo $dato['NOMBRE_PROVEEDOR']; ?></td>		                
	                <td><?php echo $dato['CIUDAD_PROVEEDOR']; ?></td>
	                <td><?php echo $dato['PAIS_PROVEEDOR']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver proveedor"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar proveedor"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar proveedor"></div>
							</div>
						</div>
	                </td>
	            </tr>
	            <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
