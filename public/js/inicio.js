function MostrarInicio(var0){
	$.ajax({
	    type: "GET",
	    url : "api/inicio",
	    data:({
	    		var0 : var0
	    }),
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	$('#d-content').empty();
	    	console.log(resultado);
	    	$('#d-content').append('<div class="row">'+resultado.topclientes.html+resultado.productomasvendido.html+resultado.promedioventas.html+'</div>');
	    	BarsChart('top_10_clientes',resultado.topclientes.labels,resultado.topclientes.values,'Clientes');
	    	BarsChart('producto_mas_vendido',resultado.productomasvendido.labels,resultado.productomasvendido.values,'Productos');
	    	LinesChart('promedio_ventas',resultado.promedioventas.labels,resultado.promedioventas.values,'Mes');
	    }
	});
}