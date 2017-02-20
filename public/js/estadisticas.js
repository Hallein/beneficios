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
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)'
	            ],
	            borderColor: [
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)',
	                'rgba( 171, 235, 198 ,1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	    	scaleFontColor: "#FFFFFF",
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

function LinesChart(id, labels, data, content){
	var ctx = document.getElementById(id);
	var scatterChart = new Chart(ctx, {
    type: 'line',
    data: {
    	labels: labels,
        datasets: [{
            label: content,
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 2,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            pointHitRadius: 20,
          	data: data,
            spanGaps: false
        }]
	    },
	    options: {
	    	scaleFontColor: "#FFFFFF",
	        scales: {
	             xAxes : [ {
	            	display : true,
		            gridLines : {
		                display : false
			            }
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
            	display: true
        	},
        	layout: {
        		padding: {  
        				top: 15,
        				bottom: 15,
        			}
        	}
	    }
	});
}

/*
var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($timeSlice); ?> , 
            datasets: [{
                label: 'My Label',
                backgroundColor: "rgba(159,170,174,0.8)",
                borderWidth: 1,
                hoverBackgroundColor: "rgba(232,105,90,0.8)",
                hoverBorderColor: "orange",
                scaleStepWidth: 1,
                data: <?php echo json_encode($myCount); ?>
            }]
        },
        options: { 
            legend: {labels:{fontColor:"white", fontSize: 18}},
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 18,
                        stepSize: 1,
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: "white",
                        fontSize: 14,
                        stepSize: 1,
                        beginAtZero:true
                    }
                }]
            }
        }
    });
*/