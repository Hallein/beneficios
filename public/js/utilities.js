function ShowToast(type, title, message, time){
	var numbertoast = $('.d-toast').length;
	var toastclass = '';
	switch(type) {
	    case 'success':
	        toastclass = ' d-toast-success';
	        break;
	    case 'error':
	        toastclass = ' d-toast-error';
	        break;
	    case 'notify':
	       toastclass = ' d-toast-notify';
	        break;
	    case 'warning':
	        toastclass = ' d-toast-warning';
	        break;
	    } 
	    var toast = '';
	    toast += '<div id="toast_'+numbertoast+'" class="d-toast fadeInTop'+toastclass+'">';
	    toast += '<strong>'+title+'</strong>';
	    toast += ' '+message+'.';
	    toast += '</div>';
	    $('body').append(toast);
	    $('#toast_'+numbertoast).show();
	    var top = 80 + (numbertoast*50);
	    $('#toast_'+numbertoast).css('top',top);
	    setTimeout(function(){ 
	        $('#toast_'+numbertoast).removeClass('fadeInTop');
	        $('#toast_'+numbertoast).addClass('fadeOutTop');
	        setTimeout(function(){ 
	            $('#toast_'+numbertoast).remove();
	        }, 500);
	    }, (time*1000));
}

function valida_rut(elemento) {
	var texto = elemento.value;
	var tmpstr = "";
	for (i = 0; i < texto.length; i++)
		if (texto.charAt(i) != ' ' && texto.charAt(i) != '.'
				&& texto.charAt(i) != '-')
			tmpstr = tmpstr + texto.charAt(i);
	texto = tmpstr;
	largo = texto.length;
	if (texto != '') {
		if (largo < 8) { 
			//return "Debe ingresar el rut completo.-";
			return false;
		}
	}

	for (i = 0; i < largo; i++) {
		if (texto.charAt(i) != "0" && texto.charAt(i) != "1"
				&& texto.charAt(i) != "2" && texto.charAt(i) != "3"
				&& texto.charAt(i) != "4" && texto.charAt(i) != "5"
				&& texto.charAt(i) != "6" && texto.charAt(i) != "7"
				&& texto.charAt(i) != "8" && texto.charAt(i) != "9"
				&& texto.charAt(i) != "k" && texto.charAt(i) != "K") { 
			elemento.focus();
			elemento.select();
			//return "El valor ingresado no corresponde a un R.U.T valido.";
			return false;
		}
	}

	var invertido = "";
	for (i = (largo - 1), j = 0; i >= 0; i--, j++)
		invertido = invertido + texto.charAt(i);
	var dtexto = "";
	dtexto = dtexto + invertido.charAt(0);
	dtexto = dtexto + '-';
	cnt = 0;

	for (i = 1, j = 2; i < largo; i++, j++) {
		// alert("i=[" + i + "] j=[" + j +"]" );
		if (cnt == 3) {
			dtexto = dtexto + '.';
			j++;
			dtexto = dtexto + invertido.charAt(i);
			cnt = 1;
		} else {
			dtexto = dtexto + invertido.charAt(i);
			cnt++;
		}
	}

	invertido = "";
	for (i = (dtexto.length - 1), j = 0; i >= 0; i--, j++)
		invertido = invertido + dtexto.charAt(i);

	elemento.value = invertido.toUpperCase();
	
	var resp = revisar_digito(elemento, texto);
	return resp;

}


function revisar_digito(elemento, crut) {
	if(elemento.value == '-'){
		elemento.value = '';	
	}
	var largo, rut, dv;
	largo = crut.length;
	if (largo < 8 && largo > 3) {
		//return "Debe ingresar el rut completo";
		return false;
	}
	if (largo > 2)
		rut = crut.substring(0, largo - 1);
	else
		rut = crut.charAt(0);
	dv = crut.charAt(largo - 1);
	//revisarDigito(elemento, dv);
	if (rut == null || dv == null)
		return true
	if (rut == '' || dv == '')
		return true
	var dvr = '0'
	suma = 0
	mul = 2
	for (i = rut.length - 1; i >= 0; i--) {
		suma = suma + rut.charAt(i) * mul
		if (mul == 7)
			mul = 2
		else
			mul++
	}
	res = suma % 11
	if (res == 1)
		dvr = 'k'
	else if (res == 0)
		dvr = '0'
	else {
		dvi = 11 - res
		dvr = dvi + ""
	}
	if (dvr != dv.toLowerCase()) {
		//alert("El rut es incorrecto");
		return false;
	}
	//alert("El rut es correcto");
	return true;
}