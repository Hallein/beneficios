
<div class="modal-header">
	<button type="button" class="modal-close-btn" data-value="modal-dismiss">&times;</span></button>
	<h4 class="modal-title">Datos de la bodega</h4>
</div>
<div class="modal-content">
	<div class="row">
		<div class="col-md-12">
			<form>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="nombre_bodega">
							<label class="mdl-textfield__label" for="nombre_bodega">Nombre de la bodega</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="direccion_bodega">
							<label class="mdl-textfield__label" for="direccion_bodega">Dirección</label>
						</div>	
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
				            <input class="mdl-textfield__input" type="text" id="tipo_bodega" value="Seleccione tipo de bodega" readonly tabIndex="-1">
				            <label for="tipo_bodega">
				                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
				            </label>
				            <label for="tipo_bodega" class="mdl-textfield__label">Tipo de bodega</label>
				            <ul for="tipo_bodega" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				                <li class="mdl-menu__item" data-val="1">Almacenamiento</li>
				                <li class="mdl-menu__item" data-val="1">Estacionamiento</li>
				            </ul>
				        </div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
				            <input class="mdl-textfield__input" type="text" id="encargado_bodega" value="Seleccione encargado" readonly tabIndex="-1">
				            <label for="encargado_bodega">
				                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
				            </label>
				            <label for="encargado_bodega" class="mdl-textfield__label">Encargado de bodega</label>
				            <ul for="encargado_bodega" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				                <li class="mdl-menu__item" data-val="111111111">Juanito</li>
				                <li class="mdl-menu__item" data-val="222222222">Pepito</li>
				            </ul>
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
	 	<button  type="button" onclick="IngresarBodega();" class="mdl-button mdl-button--raised mdl-button--colored mdl-button--centered">
		  Ingresar bodega
		</button>
	</div>
</div>