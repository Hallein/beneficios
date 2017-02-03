<?php 
$option = base64_decode($_POST['var0']);
switch ($option) {
	case 'CLI_1': //MOSTRAR CLIENTES BASE
			$html="";
			$html.='
	<div class="mdl-card mdl-shadow--2dp">
		<div class="mdl-card__title d-primaty-color">
			<div class="row">
				<div class="col-xs-12">							
					<div class="mdl-card__title-text"><h4 class="d-title-margin">CLIENTES</h4></div>
				</div>
			</div>
		</div>
		<div class="mdl-card__supporting-text">
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
		            	<td>17.095.407-6</td>
		                <td>Julio Giovanni Caruncho Arriagada</td>		                
		                <td>998664844</td>
		                <td>julio.caruncho.a@gmail.com</td>
		                <td>Arturo Fernandez 751</td>
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
		            </tr>
		            <tr>
		                <td>17.095.407-6</td>
		                <td>Julio Giovanni Caruncho Arriagada</td>		                
		                <td>998664844</td>
		                <td>julio.caruncho.a@gmail.com</td>
		                <td>Arturo Fernandez 751</td>
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
		            </tr>
		            <tr>
		               	<td>17.095.407-6</td>
		                <td>Julio Giovanni Caruncho Arriagada</td>		                
		                <td>998664844</td>
		                <td>julio.caruncho.a@gmail.com</td>
		                <td>Arturo Fernandez 751</td>
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
		            </tr>
		        </tbody>
		    </table>
			</div> 
			</div>';
			echo $html;
		break;
	case 'CLI_2': //NUEVO CLIENTE
			$html="";
			$html.='<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="mdl-card mdl-shadow--2dp">
								<div class="mdl-card__title">
									<div class="row">
										<div class="col-xs-12">							
											<div class="mdl-card__title-text">Datos personales del cliente</div>
										</div>
									</div>
								</div>
								<div class="mdl-card__supporting-text">
									<div class="row">
										<div class="col-md-12">
											<form>
												<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Rut">
															<label class="mdl-textfield__label" for="Rut">Rut</label>
														</div>	
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Nombres">
															<label class="mdl-textfield__label" for="Nombres">Nombres</label>
														</div>	
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Apaterno">
															<label class="mdl-textfield__label" for="Apaterno">Apellido paterno</label>
														</div>	
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Amaterno">
															<label class="mdl-textfield__label" for="Amaterno">Apellido materno</label>
														</div>	
													</div>	
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Email">
															<label class="mdl-textfield__label" for="Email">Email</label>
														</div>	
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Telefono">
															<label class="mdl-textfield__label" for="Telefono">Telefono</label>
														</div>	
													</div>	
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Fecha">
															<label class="mdl-textfield__label" for="Fecha">Fecha nacimiento</label>
														</div>	
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
															<input class="mdl-textfield__input" type="text" id="Direccion">
															<label class="mdl-textfield__label" for="Direccion">Direccion</label>
														</div>	
													</div>	
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
												            <input class="mdl-textfield__input" type="text" id="Región" value="Región" readonly tabIndex="-1">
												            <label for="Región">
												                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
												            </label>
												            <label for="Región" class="mdl-textfield__label">Región</label>
												            <ul for="Región" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												                <li class="mdl-menu__item" data-val="DE">Tarapacá</li>
												            </ul>
												        </div>
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
														<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
												            <input class="mdl-textfield__input" type="text" id="Comuna" value="Comuna" readonly tabIndex="-1">
												            <label for="Comuna">
												                <i class="mdl-icon-toggle__label fa fa-sort-desc" aria-hidden="true"></i>
												            </label>
												            <label for="Comuna" class="mdl-textfield__label">Comuna</label>
												            <ul for="Comuna" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
												                <li class="mdl-menu__item" data-val="DE">Iquique</li>
												                <li class="mdl-menu__item" data-val="DE">Alto hospicio</li>
												            </ul>
												        </div>
													</div>	
													<div class="col-xs-12">
													 	<button  type="button" class="mdl-button mdl-button--raised mdl-button--colored mdl-button--centered">
														  Ingresar cliente
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
			$html.='</div>';
			echo $html;
		break;
	default:
		
		break;
}
?>