function MostrarArriendos(){
	$.ajax({
	    type: "GET",
	    url : "api/servicios/arriendo",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	$('#d-content').html(resultado.html);
	    }
	});
}