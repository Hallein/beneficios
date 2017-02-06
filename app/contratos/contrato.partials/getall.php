<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primaty-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">TRABAJADORES</h4></div>
			</div>
		</div>
		<div class="btn-multiple">
			<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-add-icon d-multi-button d-accent-color">
			</button>
			<div class="btn-multiple-options">
				<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Analizar"></div>
				<div class="btn-option-hidden btn-position-7 d-bar-chart-icon" data-toggle="tooltip" data-placement="left" title="Generar gráficos"></div>
				<div id="nuevo_cliente" class="btn-option-hidden btn-position-5 d-new_user-icon" data-toggle="tooltip" data-placement="left" title="Agragar nuevo contrato" onmousedown="FormularioContrato();"></div>
				<span class="btn-option-hidden btn-position-4 d-report-icon" data-toggle="tooltip" data-placement="left" title="Generar reporte"></span>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<br>
		<table id="listado_clientes" class="mdl-data-table" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Numero contrato</th>
	                <th>Cliente</th>
	                <th>Fecha</th>
	                <th>Valor total</th>
	                <th>Estado</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Numero contrato</th>
	                <th>Cliente</th>
	                <th>Fecha</th>
	                <th>Valor total</th>
	                <th>Estado</th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <?php foreach($datos['contratos'] as $dato){ ?>
	            <tr>
	            	<td><?php echo $dato['ID_CONTRATO']; ?></td>
	                <td><?php echo $dato['NOMBRE_PERSONA'] . ' ' . $dato['APATERNO_PERSONA'] . ' ' . $dato['AMATERNO_PERSONA']; ?></td>		                
	                <td><?php echo $dato['FECHA_FIRMA']; ?></td>
	                <td><?php echo $dato['VALOR_TOTAL']; ?></td>
	                <td><?php echo $dato['ESTADO_CONTRATO']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver contrato"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar contrato"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar contrato"></div>
							</div>
						</div>
	                </td>
	            </tr>
	            <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
