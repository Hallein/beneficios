<?php 
$option = base64_decode($_POST['var0']);
switch ($option) {
	case 'FAC_1':
			$html="";
			$html.="<h1>FACTURAS</h1>";
			echo $html;
		break;
	
	default:
		
		break;
}
?>