
function agregarHito(id){
	$.ajax({
	    type: "GET",
	    url : "../api/hitos/"+id,
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
		    	ingresarHito(id);
		    });
		    var $input = $('#hito-date').pickadate({
	            format: 'dd/mm/yyyy',
				format_submit: false,
	            closeOnSelect: false,
	            closeOnClear: false,
	        });
	        var picker = $input.pickadate('picker')
		    $('.btn-back').click(function(){
		    	verBeneficio(id);
		    });
		    $('#hito-date').click(function(){
				var parent = $(this).parents('.form-input');
				parent.find('label').addClass('active-input');
			});
			$('.delete').click(function(){
		    	var hito = $(this).attr('data-val');
		    	eliminarHito(id,hito);
		    });			
	    }
	});
}

function ingresarHito(id){
	var data = {
			ben_id	: id,
			hito_id	: $('#hito').val(),
			detalle	: $('#observation').val(),
			fecha	: $('#hito-date').val()
		};
	$.ajax({
	    type: "POST",
	    url : "../api/hitos/store",
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
	    		agregarHito(id);
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}

function eliminarHito(id,hito){
	$.ajax({
	    type: "GET",
	    url : "../api/hitos/destroy/"+id+"/"+hito,
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
	    		agregarHito(id);
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}

function finalizarEtapa(id){
	$.ajax({
	    type: "POST",
	    url : "../api/etapa/finalizar/"+id,
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
	    		verBeneficio(id);
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}