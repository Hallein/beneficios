function ShowTest(){
	$.ajax({
	    type: "POST",
	    url : "php/login.php",
	    dataType: "html",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	$('#d-content').html(resultado);
	    	componentHandler.upgradeAllRegistered();
	    	Marker();
	    }
	});
}

