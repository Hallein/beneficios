$(document).ready(function(){
	formInputsInit();
	$('#send-button').click(function(){
    	verBeneficio();
    });
});

function verBeneficio(){
	var rut = $('#user-rut').val();
	var empresa	= $('#user-company').val();
	$.ajax({
	    type: "GET",
	    url : "api/consulta/"+empresa+"/"+rut,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'error'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}else{
	    		$('#d-content').hide();
	    		$('#d-content').html(resultado.html).fadeIn();
	    	}
	    }
	});
}