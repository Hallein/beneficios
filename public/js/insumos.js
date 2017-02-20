function MostrarInsumos(){
	$.ajax({
	    type: "GET",
	    url : "api/insumos",
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
	    	$('#listado_insumos').DataTable( {
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
		    MultiButtonDatatable('listado_insumos');
	    }
	});
} 

function FormularioInsumo(){	
	$.ajax({
	    type: "GET",
	    url : "api/insumos/create",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	OpenModal('modal_nuevo_insumo',resultado.html,'lg');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}

function IngresarInsumo(){
	$.ajax({
	    type: "POST",
	    url : "api/insumos/store",
	    data: {
	    	nombre: 		$('#nombre_insumo').val(),
			categoria:		$('#categoria_insumo').val(),
			subcategoria:	$('#subcategoria_insumo').val(),
			precio_venta:	$('#precio_venta').val(),
			precio_compra:	$('#precio_compra').val()
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

function FormularioEditarInsumo(id){
	$.ajax({
	    type: "GET",
	    url : "api/insumos/edit/" + id,
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){
	    	OpenModal('modal_editar_insumo',resultado.html,'lg');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}

function ModificarInsumo(id){
	$.ajax({
	    type: "POST",
	    url : "api/insumos/update",
	    data: {
	    	id: 			id,
			nombre: 		$('#nombre_insumo').val(),
			categoria:		$('#categoria_insumo').val(),
			subcategoria:	$('#subcategoria_insumo').val(),
			precio_venta:	$('#precio_venta').val(),
			precio_compra:	$('#precio_compra').val()
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

function EliminarInsumo(id){
	$.ajax({
	    type: "POST",
	    url : "api/insumos/destroy",
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

function VerInsumo(){
	
}