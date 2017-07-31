function ListarBeneficios(){	
	$.ajax({
	    type: "GET",
	    url : "../api/beneficios",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	$('#d-content').hide();
	    	$('#d-content').html(resultado.html).fadeIn();
			$('#listado-beneficios').DataTable( {
			    			responsive: true,
			    			"columnDefs": [
									{ "orderable": false, "targets": [6,7] }
								  ],
			    			"order": [],
					        "language" : {
							    "decimal":        "",
							    "emptyTable":     "No se encontraron resultados",
							    "info":           "Mostrando _START_ a _END_ de un total de _TOTAL_ entradas",
							    "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
							    "infoFiltered":   "(filtrado de un total de _MAX_ entradas)",
							    "infoPostFix":    "",
							    "thousands":      ",",
							    "lengthMenu":     "Mostrar _MENU_ entradas",
							    "loadingRecords": "Cargando...",
							    "processing":     "Procesando...",
							    "search":         "Buscar:",
							    "zeroRecords":    "No se encontraron resultados",
							    "paginate": {
							        "first":      "Primero",
							        "last":       "Ultimo",
							        "next":       "Siguiente",
							        "previous":   "Anterior"
							    },
							    "aria": {
				        "sortAscending":  ": activar para ordenar columnas de forma acsendente",
				        "sortDescending": ": activar para ordenar columnas de forma descendente"
				    }
				}
		    } );
		    $('.modify').click(function(){
		    	var id = $(this).attr('data-val');
		    	modificarBeneficio(id);
		    });
		    $('.view').click(function(){
		    	var id = $(this).attr('data-val');
		    	verBeneficio(id);
		    });
			$('.reject').click(function(){
		    	var id = $(this).attr('data-val');
		    	rechazarBeneficio(id);
		    });
		    $('#new-button').click(function(){
		    	ingresarBeneficio();
		    });
		    formInputsInit();		    
	    }
	});
}

function verBeneficio(id){	
	$.ajax({
	    type: "GET",
	    url : "../api/beneficios/"+id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	$('#d-content').hide();
	    	$('#d-content').html(resultado.html).fadeIn();
	    	$('#btn-add').click(function(){
		    	agregarHito(id);
		    });
		    $('#btn-end').click(function(){
		    	finalizarEtapa(id);
		    });
		    $('.btn-back').click(function(){
		    	ListarBeneficios();
		    });
	    }
	});
}

function rechazarBeneficio(id){
	$.ajax({
	    type: "POST",
	    url : "../api/beneficios/rechazar/"+id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		ListarBeneficios();
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}

function ingresarBeneficio(){
	$.ajax({
	    type: "GET",
	    url : "../api/beneficios/create/new",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){	    	
	    	$('#d-content').hide();
	    	$('#d-content').html(resultado.html).fadeIn();
	    	formInputsInit();
	    	$('#create-button').click(function(){
		    	guardarBeneficio();
		    });
		    $('.btn-back').click(function(){
		    	ListarBeneficios();
		    });
	    }
	});
}

function modificarBeneficio(id){
	$.ajax({
	    type: "GET",
	    url : "../api/beneficios/edit/"+id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	$('#d-content').hide();
	    	$('#d-content').html(resultado.html).fadeIn();
	    	formInputsInit();
	    	$('#modify-button').click(function(){
		    	actualizarBeneficio(id);
		    });
		    $('.btn-back').click(function(){
		    	ListarBeneficios();
		    });
	    }
	});
}

function guardarBeneficio(){
	var data = {
			rut		: $('#user-rut').val(),
			nombre	: $('#user-name').val(),
			tipo	: $('#benefit-type').val(),
			empresa	: $('#user-company').val()
		};
	$.ajax({
	    type: "POST",
	    url : "../api/beneficios/store",
	    data: data,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		ListarBeneficios();
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}

function actualizarBeneficio(id){
	var data = {
			id 		: id,
			nombre	: $('#user-name').val(),
			estado	: $('#benefit-status').val(),
			tipo	: $('#benefit-type').val(),
			empresa	: $('#user-company').val()
		};
	$.ajax({
	    type: "POST",
	    url : "../api/beneficios/update",
	    data: data,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		ListarBeneficios();
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}

function agregarHito(id){
	$.ajax({
	    type: "GET",
	    url : "../api/hitos/"+id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	$('#d-content').hide();
	    	$('#d-content').html(resultado.html).fadeIn();
	    	formInputsInit();
	    	$('#create-button').click(function(){
		    	ingresarHito(id);
		    });
		    var $input = $('#hito-date').pickadate({
	            format: 'dd/mm/yyyy',
				format_submit: false,
	            closeOnSelect: false,
	            closeOnClear: false,
	        });
	        var picker = $input.pickadate('picker')
		    $('.btn-back').click(function(){
		    	verBeneficio(id);
		    });
		    $('#hito-date').click(function(){
				var parent = $(this).parents('.form-input');
				parent.find('label').addClass('active-input');
			});
	    }
	});
}

function ingresarHito(id){
	var data = {
			ben_id	: id,
			hito_id	: $('#hito').val(),
			detalle	: $('#observation').val(),
			fecha	: $('#hito-date').val()
		};
	$.ajax({
	    type: "POST",
	    url : "../api/hitos/store",
	    data: data,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		agregarHito(id);
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}

function finalizarEtapa(id){
	$.ajax({
	    type: "POST",
	    url : "../api/beneficios/etapa/finalizar/"+id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#floating-loader').fadeIn(200);
	    },
	    complete:   function(){
	    	$('#floating-loader').fadeOut(200);
	    },
	    success: function(resultado){
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		verBeneficio(id);
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
	    }
	});
}