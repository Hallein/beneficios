$(document).ready(function(){
	$('#rut-user').focus();
	$(document).keypress(function(e){
		var code = e.keyCode || e.which;
		 if(code == 13) { 
		   login();
		 }
	});
	$('#login-button').on('click', login);

	function login(){
		if(!valida_rut($('#rut-user')[0])){
			ShowToast('error', '', 'El rut no es válido', 2);
			return;
		}
		if($('#pass-user').val()!=''){
			var pass = base64Encode($('#pass-user').val());
		}else{
			var pass= '';
		}
		var data = {
			rut: $('#rut-user').val(),
			pass: pass
		};
		$.ajax({
		    type: "POST",
		    url : "../api/login",
		    data : data,
		    dataType: "json",
		    beforeSend: function() {
	    		$('#floating-loader').fadeIn(200);
		    },
		    complete:   function(){
		    	$('#floating-loader').fadeOut(200);
		    },
		    success: function(resultado){	
				if(resultado.status == 'success'){
					$(document).off('keypress');
		    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
		    		window.location.href = "../admin/";
		    	}else{
		    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
		    	}
			}
		});
	}
});