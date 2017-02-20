function TopClientes(){	
	$.ajax({
	    type: "GET",
	    url : "api/estadisticas/top-clientes",
	    dataType: "json",
	    beforeSend: function() {
	    	$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){		    	
	    	$('#d-content').append(resultado.html);
	    	BarsChart('top-10-clientes',resultado.labels,resultado.values,'Clientes');
		}
	});
}

function BarsChart(id, labels, data, content){
	var ctx = document.getElementById(id);
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: labels,
	        datasets: [{
	            label: content,
	            data: data,
	            backgroundColor: [
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)'
	            ],
	            borderColor: [
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	                'rgba( 171, 235, 198 ,0.9)',
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            xAxes : [ {
	            	display : true,
		            gridLines : {
		                display : false
			            },
			        categoryPercentage: 0.5,
					barPercentage: 1.0
			        } ],
			    yAxes : [ {
			    	display : true,
		            gridLines : {
		                display : false
			            }
			        } ]
	        },
	        legend: {
	            display: true
	        },
	        title: {
            	display: false
        	},
        	layout: {
        		padding: {  
        				top: 15,
        				bottom: 15
        			}
        	}
	    }
	});
}