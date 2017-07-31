<?php

function respuesta($status, $titulo = '', $mensaje = ''){
	$respuesta = array();
	$respuesta['status'] = $status;
	$respuesta['message']['title'] = $titulo;
	$respuesta['message']['body'] = $mensaje;
	$respuesta['message']['timeout'] = 2;

	return $respuesta;
}

function ObtieneRutFormateado($rut){
	//Recibe RUT numérico Ej. 11333444
	if (is_numeric($rut)){
		$digitos = strlen($rut);
		// primero separamos los numeros
		switch ($digitos){
			case 7:
				$num = 0;
				$num1 = substr ($rut, 0, 1);
				$num2 = substr ($rut, 1, 1);
				$num3 = substr ($rut, 2, 1);
				$num4 = substr ($rut, 3, 1);
				$num5 = substr ($rut, 4, 1);
				$num6 = substr ($rut, 5, 1);
				$num7 = substr ($rut, 6, 1);
				break;
			case 8:
				$num = substr($rut, 0, 1);
				$num1 = substr ($rut, 1, 1);
				$num2 = substr ($rut, 2, 1);
				$num3 = substr ($rut, 3, 1);
				$num4 = substr ($rut, 4, 1);
				$num5 = substr ($rut, 5, 1);
				$num6 = substr ($rut, 6, 1);
				$num7 = substr ($rut, 7, 1);
				break;
		}
		if ($digitos >=9){
			echo "MG9";
		}
		else {
			if ($digitos <=6){
				echo "MG6";
			}
			else{
				//ahora empieza la multiplicacion
				$nu = $num*3;
				$nu1 = $num1*2;
				$nu2 = $num2*7;
				$nu3 = $num3*6;
				$nu4 = $num4*5;
				$nu5 = $num5*4;
				$nu6 = $num6*3;
				$nu7 = $num7*2;
				//ahora empieza la suma
				$totalsum = $nu + $nu1 + $nu2 + $nu3 + $nu4 + $nu5 + $nu6 + $nu7;
				//ahora la divicion
				$totaldiv = $totalsum / 11;
				//ahora sacamos el sobrante de la division
				$totalresu = $totalsum % 11;
				//ahora empieza la resta
				$totalres = 11 - $totalresu;
				//ahora mostramos el digito
				switch ($totalres){
					case 10:
						$digito = "K";
						break;

					case 11:
						$digito = "0";
						break;

					default:
						$digito = $totalres;
						break;
				}
				//echo "el digito que quieres es <b>\"$digito\"</b><br>";
			}
		}
	}
	$rut_formateado = number_format($rut,0,',','.')."-".$digito;
	//Retorna Rut completo con puntos y guión.
	return $rut_formateado;
}

function ObtieneRutSinDigito( $rut ) {
	$aRut = explode("-", $rut);
	$rut = str_replace (".","", $aRut[0]);
	return $rut;
}

function encriptar($cadena){
    $key='#mimamamemima';
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted;
 
}
 
function desencriptar($cadena){
     $key='#mimamamemima';
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;
}	

function filtrar_variables($data){
	foreach($data as $key => $variable) {
		$data[$key] = filter_var($variable, FILTER_SANITIZE_STRING);
	}
	
	return $data;
}

function filtrar_una_variable($variable){
	
	$variable = filter_var($variable, FILTER_SANITIZE_STRING);
	
	return $variable;
}

function hay_variables_vacias($data, $required){
	$error = false;
	foreach($required as $field) {
		if (empty($data[$field])) {
		$error = true;
		}
	}

	if ($error) {
		return true;
	} else {
		return false;
	}
}

function valida_rut($rut){
    if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
        return false;
    }
    $rut = preg_replace('/[\.\-]/i', '', $rut);
    $dv = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut) - 1);
    $i = 2;
    $suma = 0;
    foreach (array_reverse(str_split($numero)) as $v) {
        if ($i == 8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    if ($dvr == 11)
        $dvr = 0;
    if ($dvr == 10)
        $dvr = 'K';
    if ($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

function valida_fecha($fecha){
	$regexFecha = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/';

	if ( preg_match($regexFecha, $fecha) ) {
		return true;
	}else{
		return false;
	}
}