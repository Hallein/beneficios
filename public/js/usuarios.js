
function formularioPassword(){
	$.ajax({
	    type: "GET",
	    url : "../api/usuario/edit",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	$('#d-content').hide();
	    	$('#d-content').html(resultado.html).fadeIn();
	    	formInputsInit();
	    	$('#create-button').click(function(){
		    	cambiarPassword();
		    });
	    }
	});
}

function cambiarPassword(){
	var data = {
			pass		: $('#pass').val(),
			newpass1	: $('#newpass1').val(),
			newpass2	: $('#newpass2').val()
		};
	$.ajax({
	    type: "POST",
	    url : "../api/usuario/update",
	    data: data,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		ListarBeneficios();
	    		var navbar_elements = $('.navbar').children();
				navbar_elements.removeClass('nav-element-active');
				navbar_elements.first().addClass('nav-element-active');
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}