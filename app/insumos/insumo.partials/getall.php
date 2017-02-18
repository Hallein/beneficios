<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primary-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">INSUMOS</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar comparación"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nuevo_insumo" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Agragar nuevo insumo" onmousedown="FormularioInsumo();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_insumos" class="mdl-data-table" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Codigo</th>
	                <th>Nombre</th>
	                <th>Categoria</th>
	                <th>Subcategoria</th>
	                <th>Precio</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Codigo</th>
	                <th>Nombre</th>
	                <th>Categoria</th>
	                <th>Subcategoria</th>
	                <th>Precio</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	        <?php if (is_array($datos['insumos']) || is_object(['insumos'])) { ?>
				<?php foreach ($datos['insumos'] as $dato) { ?>
	            <tr>
	            	<td><?php echo $dato['ID_INSUMO']; ?></td>
	                <td><?php echo $dato['NOMBRE_INSUMO']; ?></td>		                
	                <td><?php echo $dato['CATEGORIA_INSUMO']; ?></td>
	                <td><?php echo $dato['SUBCATEGORIA_INSUMO']; ?></td>
	                <td>$<?php echo $dato['PRECIO_VENTA']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver insumo"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar insumo"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar insumo"></div>
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
