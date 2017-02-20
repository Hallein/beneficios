
<div class="modal-header">
	<button type="button" class="modal-close-btn" data-value="modal-dismiss">&times;</span></button>
	<h4 class="modal-title">Datos vehículos</h4>
</div>
<div class="modal-content">
	<div class="row">
		<div class="col-md-12">
			<form>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="patente_vehiculo">
							<label class="mdl-textfield__label" for="patente_vehiculo">Patente</label>
						</div>	
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
				            <input class="mdl-textfield__input" type="text" id="id_bodega" value="Seleccione bodega" readonly tabIndex="-1">
				            <label for="id_bodega">
				                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
				            </label>
				            <label for="id_bodega" class="mdl-textfield__label">Bodega</label>
				            <ul for="id_bodega" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				            <?php
								foreach ($datos['bodegas'] as $d) { ?>
									<li class="mdl-menu__item" data-val="<?php echo $d['ID_BODEGA']; ?>">
										<?php echo $d['NOMBRE_BODEGA']; ?>										
									</li>
							<?php } ?>
				            </ul>
				        </div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="marca_vehiculo">
							<label class="mdl-textfield__label" for="marca_vehiculo">Marca</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="modelo_vehiculo">
							<label class="mdl-textfield__label" for="modelo_vehiculo">Modelo</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="anho_fabricacion">
							<label class="mdl-textfield__label" for="anho_fabricacion">Año fabricación</label>
						</div>	
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="tipo_vehiculo">
							<label class="mdl-textfield__label" for="tipo_vehiculo">Tipo vehículo</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="estado_vehiculo">
							<label class="mdl-textfield__label" for="estado_vehiculo">Estado vehículo</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="tipo_patente">
							<label class="mdl-textfield__label" for="tipo_patente">Tipo patente</label>
						</div>	
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal-footer">
	<div class="col-xs-12">
		<button  type="button" class="mdl-button mdl-button--raised mdl-button--centered" data-value="modal-dismiss">
		  Cancelar
		</button>	
	 	<button  type="button" onclick="IngresarVehiculo();" class="mdl-button mdl-button--raised mdl-button--colored mdl-button--centered">
		  Ingresar vehículo
		</button>
	</div>
</div>