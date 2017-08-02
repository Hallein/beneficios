$(document).ready(function(){
	formInputsInit();
	$('#send-button').click(function(){
    	verBeneficio();
    });
    $('#user-rut').focus();
	$(document).keypress(function(e){
		var code = e.keyCode || e.which;
		 if(code == 13) { 
		   verBeneficio();
		 }
	});
});

function verBeneficio(){
	var rut 	= $('#user-rut').val();
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
	    		$(document).off('keypress');
	    		$('#d-content').hide();
	    		$('body').scrollTop();
	    		$('#d-content').html(resultado.html).fadeIn();
	    	}
	    }
	});
}