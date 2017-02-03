function MostrarClientes(var0){	
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
		        columnDefs: [
		            {
		                targets: [ 0, 1, 2 ],
		                className: 'mdl-data-table__cell--non-numeric'
		            }
		        ],
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
	    }
	});
}


