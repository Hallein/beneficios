<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primary-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">DOCUMENTOS DE COMPRA</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar comparación"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nueva_venta" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Ingresar nueva venta" onmousedown="FormularioCompra();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_ventas" class="mdl-data-table dataTable" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Compra N°</th>
	                <th>Nombre proveedor</th>
	                <th>Fecha compra</th>
	                <th>Valor compra</th>
	                <th class="all"></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Compra N°</th>
	                <th>Nombre proveedor</th>
	                <th>Fecha compra</th>
	                <th>Valor compra</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	        <?php if (is_array($datos['documentos']) || is_object(['documentos'])) { ?>
				<?php foreach ($datos['documentos'] as $dato) { ?>
	            <tr>
	            	<td><?php echo $dato['ID_COMPRA']; ?></td>
	                <td><?php echo $dato['NOMBRE_PROVEEDOR']; ?></td>
	                <td><?php echo $dato['FECHA_COMPRA']; ?></td>
	                <td>$<?php echo $dato['VALOR_COMPRA']; ?></td>	                
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver venta" onmousedown="MostrarCompra(<?php echo $dato['ID_COMPRA']; ?>)"></div>
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
