<?php if (is_array($datos['comunas']) || is_object(['comunas'])) { ?>
<?php for($i=0;$i<count($datos['comunas']);$i++){ ?>
	<li class="mdl-menu__item" data-val="<?php echo $datos['comunas'][$i]['ID_COMUNA'];?>"><?php echo trim($datos['comunas'][$i]['COMUNA']); ?></li>
<?php }?>
<?php }?>