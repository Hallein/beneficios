
<div class="mdl-card mdl-shadow--2dp">
	<div class="mdl-card__title d-primaty-color">
		<div class="row">
			<div class="col-xs-12">							
				<div class="mdl-card__title-text"><h4 class="d-title-margin">CLIENTES</h4></div>
			</div>
		</div>
	</div>
	<div class="mdl-card__supporting-text">
		<div class="row">
			<div class="col-md-2">
				<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--option d-full-width">
					Nuevo Cliente
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
	                <th></th>
	            </tr>
	        </tfoot>
	        <tbody>
	            <tr>
	            <?php foreach($datos['clientes'] as $dato){ ?>
	            	<td><?php echo $dato['RUT_PERSONA']; ?></td>
	            	<!-- <td>17.095.407-6</td> -->
	                <td><?php echo $dato['NOMBRE_PERSONA'] . ' ' . $dato['APATERNO_PERSONA'] . ' ' . $dato['AMATERNO_PERSONA']; ?></td>		                
	                <td><?php echo $dato['TELEFONO_PERSONA']; ?></td>
	                <td><?php echo $dato['EMAIL_PERSONA']; ?></td>
	                <td><?php echo $dato['DIRECCION_PERSONA']; ?></td>
	                <td>
	                	<div class="btn-multiple">
							<button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab d-options-icon d-multi-button">
							</button>
							<div class="btn-multiple-options">
								<div class="btn-option-hidden btn-position-1 d-view-icon"></div>
								<div class="btn-option-hidden btn-position-7 d-delete-icon"></div>
								<div class="btn-option-hidden btn-position-5 d-edit-icon"></div>
							</div>
						</div>
	                </td>
	            <?php } ?>
	            </tr>
	        </tbody>
	    </table>
	</div>
</div>
