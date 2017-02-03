<?php 
$option = base64_decode($_POST['var0']);
switch ($option) {
	case 'INI_1':
			$html="";
			$html.="<h1>INICIO</h1>";
			echo $html;
		break;	
	default:
		
		break;
}
?>