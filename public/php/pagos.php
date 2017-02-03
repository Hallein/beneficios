<?php 
$option = base64_decode($_POST['var0']);
switch ($option) {
	case 'PAG_1':
			$html="";
			$html.="<h1>PAGOS</h1>";
			echo $html;
		break;
	
	default:
		
		break;
}
?>