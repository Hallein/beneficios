<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="card over-background">
                <div class="card-title text-primary-color dark-primary-color">
                    <div class="row center-xs center-sm start-md">
                        <div class="col-xs-12">
                            Listado de beneficios
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if(count($datos['beneficio']) > 0): ?>
                            <table id="listado-beneficios" class="mdl-data-table dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                        <th>Empresa</th>
                                        <th>Tipo beneficio</th>
                                        <th>Etapa</th>
                                        <th>Estado</th>
                                        <th class="all"></th>
                                        <th class="all"></th>
                                    </tr>
                                </thead>
                                <tbody>

                            		<?php foreach($datos['beneficio'] as $beneficio): ?>
                                    <tr>
                                    	<td><?php echo $beneficio['PER_RUT']; ?></td>
                                        <td><?php echo $beneficio['PER_NOMBRE']; ?></td>		                
                                        <td><?php echo $beneficio['BEN_EMPRESA']; ?></td>
                                        <td><?php echo $beneficio['TIPBEN_NOMBRE']; ?></td>
                                        <td><?php echo $beneficio['ETAPA_ACTUAL']; ?></td>
                                        <td><?php echo $beneficio['ESTADO']; ?></td>
                                        <td><button class="btn-round view" data-val="<?php echo $beneficio['BEN_ID']; ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                        </button></td>
                                        <td><button class="btn-round btn-edit modify" data-val="<?php echo $beneficio['BEN_ID']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </button></td>
                                    </tr>
                                	<?php endforeach; ?>

                                </tbody>
                            </table>
                        <?php else: ?>
                            <h3>No hay registros.</h3>                            
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>