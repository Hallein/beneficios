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

function Marker(){
	$('.mdl-textfield>input').focusin(function(e){
		var handlerTop = $(this).offset().top - $('.d-login').offset().top;
		$('.d-marker').css({'top':handlerTop+'px','height': '40px','background-color':'#3f51b5'});
	});
	$('.mdl-textfield>input').focusout(function(e){
		$('.d-marker').css({'top':'60px','height': '60px','background-color':'#2e4053'});
	});
}