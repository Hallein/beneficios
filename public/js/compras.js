function MostrarCompras(){
	$.ajax({
	    type: "GET",
	    url : "api/compras",
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

function MostrarCompra(id){
	$.ajax({
	    type: "GET",
	    url : "api/documentos/compra/show/" + id,
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