

	<table>

		<tr>
			<td>Nombre</td>
			<td>Apellido</td>
		</tr>
		
		<?php foreach($clientes['clientes'] as $cliente){ ?>
		<tr>
			<td> <?php echo $cliente['nombres'] ?> </td>
			<td> <?php echo $cliente['apellido_1'] ?> </td>
		</tr>
		<?php } ?>

	</table>
