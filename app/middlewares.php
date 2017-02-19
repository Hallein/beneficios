<?php 
	
	$login = function($request, $response, $next){
		//antes
		if( !isset($_SESSION['session']) || empty($_SESSION['session']) ){
		//redireccionar		
			$response->getBody()->write('BEFORE');
		}else{
		//seguir con la ruta
			$response = $next($request, $response);
		}
		return $response;
	};