function MostrarClientes(){	
	$.ajax({
	    type: "GET",
	    url : "api/clientes",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	$('#d-content').html(resultado.html);	
	    	$('[data-toggle="tooltip"]').tooltip();    	
	    	$('#listado_clientes').DataTable( {
    			responsive: true,
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
		    HiddenOptionsInit();
		    MultiButtonDatatable('listado_clientes');
	    }
	});
}

function FormularioCliente(){	
	$.ajax({
	    type: "GET",
	    url : "api/clientes/create",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	OpenModal('modal_nuevo_cliente',resultado.html,'lg');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}

function IngresarCliente(){
	$.ajax({
	    type: "POST",
	    url : "api/clientes/store",
	    data: {
	    	rut: 		$('#rut_cliente').val(),
			nombre:		$('#nombres_cliente').val(),
			apaterno:	$('#apaterno_cliente').val(),
			amaterno:	$('#amaterno_cliente').val(),
			email:		$('#email_cliente').val(),
			telefono:	$('#telefono_cliente').val(),
			fechanac:	$('#fecha_cliente').val(),
			direccion:	$('#direccion_cliente').val(),
			comuna: 	$('#comuna_cliente').attr('data-val')
	    },
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		CloseModal();
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
		}
	}); //$('#rut_cliente').closest('div').append('<span class="mdl-textfield__error" style="visibility: visible;">El rut esta malisimo!</span>');
} //$('#rut_cliente').closest('div').addClass('is-invalid');

function FormularioEditarCliente(rut){
	$.ajax({
	    type: "GET",
	    url : "api/clientes/edit/" + rut,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	console.log(resultado);
	    	OpenModal('modal_nuevo_cliente',resultado.html,'lg');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}

function ModificarCliente(rut){
	$.ajax({
	    type: "POST",
	    url : "api/clientes/update",
	    data: {
	    	rut: 		rut,
			nombre:		$('#nombres_cliente').val(),
			apaterno:	$('#apaterno_cliente').val(),
			amaterno:	$('#amaterno_cliente').val(),
			email:		$('#email_cliente').val(),
			telefono:	$('#telefono_cliente').val(),
			fechanac:	$('#fecha_cliente').val(),
			direccion:	$('#direccion_cliente').val(),
			sexo: 		1,
			comuna: 	$('#comuna_cliente').attr('data-val')
	    },
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		CloseModal();
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
		}
	});
}

function EliminarCliente(rut){
	$.ajax({
	    type: "POST",
	    url : "api/clientes/destroy",
	    data: {
	    	rut: 		rut
	    },
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	if(resultado.status == 'success'){
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		CloseModal();
	    	}else{
	    		ShowToast(resultado.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
		}
	});
}