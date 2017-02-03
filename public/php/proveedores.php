<?php 
$option = base64_decode($_POST['var0']);
switch ($option) {
	case 'PRO_1':
			$html="";
			$html.="<h1>PROVEEDORES</h1>";
			echo $html;
		break;
	
	default:
		
		break;
}
?>