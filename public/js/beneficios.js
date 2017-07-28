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
		    	ActualizarBeneficio(id);
		    });
	    }
	});
}

function ActualizarBeneficio(id){
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