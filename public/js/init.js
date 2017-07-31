function formInputsInit(){
	$('input, textarea').focusin(function(){
		var parent = $(this).parents('.form-input');
		parent.find('label').addClass('active-input');
	});
	$('input, textarea').off('focusin');
	$('input, textarea').focusin(function(){
		var parent = $(this).parents('.form-input');
		parent.find('label').addClass('active-input');
	});
	$('input, textarea').off('focusout');
	$('input, textarea').focusout(function(){
		var parent = $(this).parents('.form-input');
		var label = parent.find('label');
		if(this.id != 'hito-date'){
			if($(this).val() == ''){
				if(label.hasClass('active-input')){
					label.removeClass('active-input');
				}
			}
		}
	});
	$('input, textarea').each(function(index){
		if($(this).val() != ''){
			var parent = $(this).parents('.form-input');
			parent.find('label').addClass('active-input');
		}
	});
	$('select').each(function(index){
		var parent = $(this).parents('.form-input');
		parent.find('label').addClass('active-input');
	});
	$('textarea').each(function(index){
		var parent = $(this).parents('.form-input');
		parent.find('label').addClass('label-select');
	});
}

function navBarInit(){
	var navbar_elements = $('.navbar').children();
	navbar_elements.click(function(){
		navbar_elements.removeClass('nav-element-active');
		$(this).addClass('nav-element-active');
	});
	$('#main-title').text('Beneficios habitacionales');
	$('#beneficios-nav').click(function(){
		ListarBeneficios();
		$('#main-title').text('Beneficios habitacionales');
	});
	$('#salir-nav').click(function(){
		cerrarSesion();
		$('#main-title').text('Hasta pronto!');
		
	});
	$('#cuenta-nav').click(function(){
		formularioPassword();
		$('#main-title').text('Gestión de cuenta');
	});
	$('#main-title').text('Beneficios habitacionales');
}

function cerrarSesion(){
	$.ajax({
	    type: "POST",
	    url : "../api/logout",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		window.location.href = '../login/';
	    	}
	    }
	});
}