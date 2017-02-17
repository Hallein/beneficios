<div class="row">
	<div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
		<div class="mdl-card mdl-shadow--2dp d-factura">
			<div class="row center-xs start-sm start-md start-lg">
				<div class="col-xs-12">
					<div class="d-factura-logo">
						<img src="img/logo.png" alt="">
					</div>
				</div>
				<div class="col-xs-12">
					<div class="d-factura-title">
						<h3>DOCUMENTO DE COMPRA</h3>
					</div>
				</div>
			</div>
			<div class="row between-xs">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
					<ul class="d-factura-info">
						<li><span class="d-form-tag">Dirección</span>Arturo Fernandez 751</li>
						<li><span class="d-form-tag">Comuna</span>Iquique</li>
						<li><span class="d-form-tag">Teléfono</span>998664844</li>
						<li><span class="d-form-tag">Email</span>ventas@haz-top.cl</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<ul class="d-factura-info">
						<li><span class="d-form-tag">Fecha</span><?php echo $datos['documento']['FECHA_VENTA']; ?></li>
						<li><span class="d-form-tag">Hora</span>22:26</li>
						<li><span class="d-form-tag">N° Factura</span><?php echo $datos['documento']['NUMERO_SERIE']; ?></li>
						<li><span class="d-form-tag">Folio</span><?php echo $datos['documento']['FOLIO']; ?></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="d-factura-subtitle">
						<h4>Información del cliente</h4>
					</div>
				</div>
				<div class="col-xs-12">
					<ul class="d-factura-info">
						<li><span class="d-form-tag">Cliente</span><?php echo $datos['documento']['NOMBRE_PERSONA'] . ' ' . $datos['documento']['APATERNO_PERSONA'] . ' ' . $datos['documento']['AMATERNO_PERSONA']; ?></li>
						<li><span class="d-form-tag">Empresa</span><?php echo $datos['documento']['EMPRESA']; ?></li>
						<li><span class="d-form-tag">Dirección</span><?php echo $datos['documento']['DIRECCION_PERSONA']; ?></li>
						<li><span class="d-form-tag">Comuna</span><?php echo $datos['documento']['COMUNA']; ?></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<table class="mdl-data-table mdl-js-data-table">
						<thead>
							<tr>
								<th>Cantidad</th>
								<th>Descripción</th>
								<th>Precio unitario</th>
								<th>Importe</th>
							</tr>
							</thead>
						<tbody>
						<?php if (is_array($datos['documento']['insumos']) || is_object($datos['documento']['insumos'])) { ?>
							<?php foreach ($datos['documento']['insumos'] as $insumo) { ?>
								<tr>
									<td><?php echo $insumo['CANTIDAD_VENDIDA']; ?></td>
									<td><?php echo $insumo['NOMBRE_INSUMO']; ?></td>
									<td>$<?php echo $insumo['PRECIO_UNITARIO']; ?></td>
									<td>$<?php echo $insumo['IMPORTE']; ?></td>
								</tr>
							<?php } ?>
						<?php } ?>
							<tr>
								<td class="d-texto-derecha" colspan="3">Subtotal :</td>
								<td>$<?php echo $datos['documento']['TOTAL_IMPORTE']; ?></td>
							</tr>
							<tr>
								<td class="d-texto-derecha" colspan="3">IVA :</td>
								<td>$<?php echo $datos['documento']['TOTAL_IVA']; ?></td>
							</tr>
							<tr>
								<td class="d-texto-derecha" colspan="3">Total :</td>
								<td>$<?php echo $datos['documento']['TOTAL']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>