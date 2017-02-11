
<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primaty-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">TRABAJADORES</h4></div>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<div class="row">
			<div class="col-md-2">
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--option d-full-width">
					Nuevo Trabajador
				</button>
			</div>
			<div class="col-md-2">
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--option d-full-width">
					Opciones
				</button>
			</div>
			<div class="col-md-2">
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--option d-full-width">
					Opciones
				</button>
			</div>
			<div class="col-md-2">
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--option d-full-width">
					Opciones
				</button>
			</div>
		</div>
		<table id="example" class="mdl-data-table" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Rut</th>
	                <th>Nombre</th>
	                <th>Telefono</th>
	                <th>Email</th>
	                <th>Dirección</th>
	                <th>Previsión social</th>
	                <th>Previsión salud</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Rut</th>
	                <th>Nombre</th>
	                <th>Telefono</th>
	                <th>Email</th>
	                <th>Dirección</th>
	                <th>Previsión social</th>
	                <th>Previsión salud</th>
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <?php foreach($datos['trabajadores'] as $dato){ ?>
	            <tr>
	            	<td><?php echo $dato['RUT_PERSONA']; ?></td>
	                <td><?php echo $dato['NOMBRE_PERSONA'] . ' ' . $dato['APATERNO_PERSONA'] . ' ' . $dato['AMATERNO_PERSONA']; ?></td>		                
	                <td><?php echo $dato['TELEFONO_PERSONA']; ?></td>
	                <td><?php echo $dato['EMAIL_PERSONA']; ?></td>
	                <td><?php echo $dato['DIRECCION_PERSONA']; ?></td>
	                <td><?php echo $dato['PREVISION_SOCIAL']; ?></td>
	                <td><?php echo $dato['PREVISION_SALUD']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon" data-toggle="tooltip" data-placement="left" title="Ver cliente"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon" data-toggle="tooltip" data-placement="left" title="Eliminar cliente"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon" data-toggle="tooltip" data-placement="left" title="Editar cliente"></div>
							</div>
						</div>
	                </td>
	            </tr>
	            <?php } ?>
	        </tbody>
	    </table>
	</div>
</div>
