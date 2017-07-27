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
                <th class="all">Opcion</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Tipo beneficio</th>
                <th>Etapa</th>
                <th>Estado</th>
                <th>Opcion</th>
            </tr>
        </tfoot>
        <tbody>

    		<?php foreach($datos['beneficio'] as $beneficio): ?>
            <tr>
            	<td><?php echo $beneficio['PER_RUT']; ?></td>
                <td><?php echo $beneficio['PER_NOMBRE']; ?></td>		                
                <td><?php echo $beneficio['BEN_EMPRESA']; ?></td>
                <td><?php echo $beneficio['TIPBEN_NOMBRE']; ?></td>
                <td><?php echo $beneficio['ETAPA_ACTUAL']; ?></td>
                <td><?php echo $beneficio['ESTADO']; ?></td>
                <td></td>
            </tr>
        	<?php endforeach; ?>

        </tbody>
    </table>

<?php else: ?>

    <h3>No hay registros.</h3>
    
<?php endif; ?>