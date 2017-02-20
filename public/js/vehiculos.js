function MostrarVehiculos(){
	$.ajax({
	    type: "GET",
	    url : "api/vehiculos",
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
	    	$('#listado_vehiculos').DataTable( {
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
		    MultiButtonDatatable('listado_vehiculos');
	    }
	});
}
function FormularioVehiculo(){
	$.ajax({
	    type: "GET",
	    url : "api/vehiculos/create",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	OpenModal('modal_nuevo_vehiculo',resultado.html,'lg');
	    	getmdlSelect.init(".getmdl-select");
		}
	});
}
function IngresarVehiculo(){
	console.log($('#patente_vehiculo').val()+$('#id_bodega').val()+$('#marca_vehiculo').val()+$('#modelo_vehiculo').val()+$('#anho_fabricacion').val()+$('#tipo_vehiculo').val()+$('#estado_vehiculo').val()+$('#tipo_patente').val());
	$.ajax({
	    type: "POST",
	    url : "api/vehiculos/store",
	    data: {
	    	patente: 		$('#patente_vehiculo').val(),
			bodega:			$('#id_bodega').val(),
			marca:			$('#marca_vehiculo').val(),
			modelo:			$('#modelo_vehiculo').val(),
			anho:			$('#anho_fabricacion').val(),
			tipo_vehiculo:	$('#tipo_vehiculo').val(),
			estado:			$('#estado_vehiculo').val(),
			tipo_patente:	$('#tipo_patente').val()
	    },
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	if(resultado.respuesta.status == 'success'){
	    		ShowToast(resultado.respuesta.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    		CloseModal();
	    	}else{
	    		ShowToast(resultado.respuesta.status, resultado.message.title, resultado.message.body, resultado.message.timeout);
	    	}
		}
	});
}