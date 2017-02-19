function LoginUsuario(){
	var user = $("#usuario_login").val();
	var pass = $("#contrasena_login").val();
	var url = 'api/login';
	$.ajax({
	    type: "POST",
	    url : url,
	    data:({
	    		user : user,
	    		pass : pass
	    }),
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
		    	$('#d-main').html(resultado.html);
		    	$('#d-hamburguer').unbind('click');
		    	$('#d-hamburguer').click(function(e){
					if($('#d-hamburguer').hasClass('d-toggle-hamburguer')){
						$('#d-hamburguer').removeClass('d-toggle-hamburguer')
					}else{
						$('#d-hamburguer').addClass('d-toggle-hamburguer')
					}
					if($('#d-nav').hasClass('hideen-nav')){
						$('#d-nav').removeClass('hideen-nav');
						$('#d-top-header, #d-content, #d-footer').removeClass('full-content');
					}else{
						$('#d-nav').addClass('hideen-nav');
						$('#d-top-header, #d-content, #d-footer').addClass('full-content');
					}
				});
				$('.d-nav-list li').unbind('click');
				$('.d-nav-list li').click(function(e){
					$('.d-nav-list li').removeClass('d-active');
					$('.d-nav-list .d-2-crumb').removeClass('d-active-crumb');
					$(this).addClass('d-active');
					$(this).addClass('d-active-crumb');
					UpdateBreadcrumb();
				});
				UpdateBreadcrumb();
				graficoBarras();
				graficoLineas(); 
				window.onbeforeunload = function() {
			        return "¿Estas seguro de abandonar la pagina?. Deberá iniciar sesión nuevamente.";
			    }
				//ShowTest();
			}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}