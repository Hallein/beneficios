$(document).ready(function(){
	$('#login-button').on('click', login);
	function login(){
		var data = {
			rut: $('#rut-user').val(),
			pass: $('#pass-user').val()
		};
		$.ajax({
		    type: "POST",
		    url : "../api/login",
		    data : data,
		    dataType: "json",
		    beforeSend: function() {
		    	//$('#overlay-loader').fadeIn(400);
		    },
		    complete:   function(){
		    	//$('#overlay-loader').fadeOut(400);
		    },
		    success: function(respuesta){	
		    	console.log(respuesta);
				if(respuesta.status == 'success'){
		    		ShowToast(respuesta.status, respuesta.message.title, respuesta.message.body, respuesta.message.timeout);
		    		window.location.href = "../admin/";
		    	}else{
		    		ShowToast(respuesta.status, respuesta.message.title, respuesta.message.body, respuesta.message.timeout);
		    	}
			}
		});
	}
});