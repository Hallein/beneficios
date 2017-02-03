function MostrarPagos(var0){
	$.ajax({
	    type: "POST",
	    url : "php/pagos.php",
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