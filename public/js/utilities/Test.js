function ShowTest(){
	$.ajax({
	    type: "POST",
	    url : "php/factura.php",
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