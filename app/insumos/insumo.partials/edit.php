
<div class="modal-header">
	<button type="button" class="modal-close-btn" data-value="modal-dismiss">&times;</span></button>
	<h4 class="modal-title">Modificar insumo</h4>
</div>
<div class="modal-content">
	<div class="row">
		<div class="col-md-12">
			<form>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="nombre_insumo">
							<label class="mdl-textfield__label" for="nombre_insumo">Nombre</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="categoria_insumo">
							<label class="mdl-textfield__label" for="categoria_insumo">Categoria</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="subcategoria_insumo">
							<label class="mdl-textfield__label" for="subcategoria_insumo">Subcategoria</label>
						</div>	
					</div>	
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="precio_venta">
							<label class="mdl-textfield__label" for="precio_venta">Precio de venta</label>
						</div>	
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="precio_compra">
							<label class="mdl-textfield__label" for="precio_compra">Precio de compra</label>
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
	 	<button  type="button" onclick="modificarInsumo();" class="mdl-button mdl-button--raised mdl-button--colored mdl-button--centered">
		  Modificar insumo
		</button>
	</div>
</div>