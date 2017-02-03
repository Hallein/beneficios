<?php 

$breadcrumbs = $_POST['breadcrumbs'];

$html="";
if($breadcrumbs!=''){
	//$breadcrumbs = base64_decode($breadcrumbs);
	$crumbs = explode('//', $breadcrumbs);
	$active = '';
	for($i=0; $i<count($crumbs); $i++){
		if(($i+2) > count($crumbs)){
			$active = ' d-active';
		}
		if(strpos($crumbs[$i], '||')!== false){
			$onclick=explode('||', $crumbs[$i]);
			$html .=  "<li class='d-".($i+1)."-crumb".$active."' onclick=".$onclick[1].">".$onclick[0]."</li>";
		}else{
			$html .=  "<li class='d-".($i+1)."-crumb".$active."'>".$crumbs[$i]."</li>";
		}
	}
}

echo $html;

?>