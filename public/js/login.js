function LoginUsuario(){
	var user = $("#usuario_login").val();
	var pass = $("#contrasena_login").val();
	$.ajax({
	    type: "GET",
	    url : "", //RUTA LOGIN 
	    data:({
	    		user : user,
	    		pass : pass
	    }),
	    dataType: "html",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	//REDIRECT O ALGO
	    }
	});
}