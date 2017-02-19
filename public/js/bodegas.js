function MostrarBodegas(){
	$.ajax({
	    type: "GET",
	    url : "api/bodegas",
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
	    	$('#listado_bodegas').DataTable( {
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
		    MultiButtonDatatable('listado_bodegas');
	    }
	});
}

function FormularioBodega(){	
	$.ajax({
	    type: "GET",
	    url : "api/bodegas/create",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){
	    	OpenModal('modal_nueva_bodega',resultado.html,'');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}

function IngresarBodega(){
	$.ajax({
	    type: "POST",
	    url : "api/bodegas/store",
	    data: {
	    	rut: 		$('#encargado_bodega').attr('data-val'),
			nombre:		$('#nombre_bodega').val(),
			direccion:	$('#direccion_bodega').val(),
			tipo: 		$('#tipo_bodega').attr('data-val')
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

function FormularioEditarBodega(id){
	$.ajax({
	    type: "GET",
	    url : "api/bodegas/edit/" + id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){
	    	OpenModal('modal_editar_bodega',resultado.html,'lg');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}

function ModificarBodega(id){
	$.ajax({
	    type: "POST",
	    url : "api/bodegas/update",
	    data: {
	    	id: 		id,
	    	rut: 		$('#encargado_bodega').attr('data-val'),
			nombre:		$('#nombre_bodega').val(),
			direccion:	$('#direccion_bodega').val(),
			tipo: 		$('#tipo_bodega').attr('data-val')
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

function EliminarBodega(id){
$.ajax({
	    type: "POST",
	    url : "api/bodegas/destroy",
	    data: {
	    	id: 		id
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

function VerBodega(id){

}
