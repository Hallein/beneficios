function graficoLineas(){
	var ctx = document.getElementById("GraficoLinea");
	var scatterChart = new Chart(ctx, {
    type: 'line',
    data: {
    	labels: ["", "", "", "", "", "", ""],
        datasets: [{
            label: "",
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
            pointRadius: 1,
            pointHitRadius: 10,
          	data: [65, 20, 40, 81, 56, 55, 40],
            spanGaps: false
        }]
	    },
	    options: {
	        scales: {
	             xAxes : [ {
	            	display : false,
		            gridLines : {
		                display : false
			            }
			        } ],
			    yAxes : [ {
			    	display : false,
		            gridLines : {
		                display : false
			            }
			        } ]
	        },
	        legend: {
	            display: false
	        },
	        title: {
            	display: false
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

function graficoBarras(){
	var ctx = document.getElementById("GraficoBarras");
	var myChart = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["", "", "", "", "", "", "", "", "", "", "", "", "", ""],
	        datasets: [{
	            label: '',
	            data: [12, 19, 10, 6, 5, 7,12, 19, 8, 5, 9, 8, 7, 10],
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
	            	display : false,
		            gridLines : {
		                display : false
			            },
			        categoryPercentage: 0.5,
					barPercentage: 1.0
			        } ],
			    yAxes : [ {
			    	display : false,
		            gridLines : {
		                display : false
			            }
			        } ]
	        },
	        legend: {
	            display: false
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