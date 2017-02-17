function MostrarInicio(var0){
	$.ajax({
	    type: "GET",
	    url : "php/inicio.php",
	    data:({
	    		var0 : var0
	    }),
	    dataType: "html",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	$('#d-content').html(resultado);
	    }
	});
}