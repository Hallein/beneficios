
<div class="modal-header">
	<button type="button" class="modal-close-btn" data-value="modal-dismiss">&times;</span></button>
	<h4 class="modal-title">Datos personales del cliente</h4>
</div>
<div class="modal-content">
	<div class="row">
		<div class="col-md-12">
			<form>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="rut_cliente">
							<label class="mdl-textfield__label" for="Rut">Rut</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="nombres_cliente">
							<label class="mdl-textfield__label" for="Nombres">Nombres</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="apaterno_cliente">
							<label class="mdl-textfield__label" for="Apaterno">Apellido paterno</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="amaterno_cliente">
							<label class="mdl-textfield__label" for="Amaterno">Apellido materno</label>
						</div>	
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="email_cliente">
							<label class="mdl-textfield__label" for="Email">Email</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="telefono_cliente">
							<label class="mdl-textfield__label" for="Telefono">Telefono</label>
						</div>	
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="fecha_cliente">
							<label class="mdl-textfield__label" for="Fecha">Fecha nacimiento</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="direccion_cliente">
							<label class="mdl-textfield__label" for="Direccion">Direccion</label>
						</div>	
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
				            <input class="mdl-textfield__input" type="text" id="region_cliente" value="Seleccione región" readonly tabIndex="-1">
				            <label for="region_cliente">
				                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
				            </label>
				            <label for="region_cliente" class="mdl-textfield__label">Región</label>
				            <ul for="region_cliente" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				                <li class="mdl-menu__item" data-val="1">Tarapacá</li>
				            </ul>
				        </div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
				            <input class="mdl-textfield__input" type="text" id="comuna_cliente" value="Seleccione comuna" readonly tabIndex="-1">
				            <label for="comuna_cliente">
				                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
				            </label>
				            <label for="comuna_cliente" class="mdl-textfield__label">Comuna</label>
				            <ul for="comuna_cliente" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
				                <li class="mdl-menu__item" data-val="1">Iquique</li>
				                <li class="mdl-menu__item" data-val="2">Alto hospicio</li>
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
	 	<button  type="button" onclick="IngresarCliente();" class="mdl-button mdl-button--raised mdl-button--colored mdl-button--centered">
		  Ingresar cliente
		</button>
	</div>
</div>