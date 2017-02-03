$(document).ready(function(){
	$('#d-hamburguer').click(function(e){
		if($('#d-hamburguer').hasClass('d-toggle-hamburguer')){
			$('#d-hamburguer').removeClass('d-toggle-hamburguer')
		}else{
			$('#d-hamburguer').addClass('d-toggle-hamburguer')
		}
		if($('#d-nav').hasClass('hideen-nav')){
			$('#d-nav').removeClass('hideen-nav');
			$('#d-top-header, #d-content, #d-footer').removeClass('full-content');
		}else{
			$('#d-nav').addClass('hideen-nav');
			$('#d-top-header, #d-content, #d-footer').addClass('full-content');
		}
	});
	$('.d-nav-list li').click(function(e){
		$('.d-nav-list li').removeClass('d-active');
		$('.d-nav-list .d-2-crumb').removeClass('d-active-crumb');
		$(this).addClass('d-active');
		$(this).addClass('d-active-crumb');
		UpdateBreadcrumb();
	}); 
	UpdateBreadcrumb();	
	graficoBarras();
	graficoLineas(); 
});

function UpdateBreadcrumb(){
	var breadcrumbs = '';
	var i=1;
	while($('.d-'+i+'-crumb.d-active-crumb').text().trim()!=''){
	if(i>1){
		breadcrumbs +='//';
	}
	breadcrumbs += $('.d-'+i+'-crumb.d-active-crumb').text().trim();
	if($('.d-'+i+'-crumb.d-active-crumb').attr('onclick')!=undefined){
		breadcrumbs +='||'+$('.d-'+i+'-crumb.d-active-crumb').attr('onclick');
	}
	i++;
	}
	var third = '';
	$.ajax({
	    type: "POST",
	    url : "php/breadcrumb.php",
	    data:({
	    		breadcrumbs : breadcrumbs
	    }),
	    dataType: "html",
	    beforeSend: function() {
	    	//$('#overlay-loader').fadeIn(400);
	    },
	    complete:   function(){
	    	//$('#overlay-loader').fadeOut(400);
	    },
	    success: function(resultado){	
	    	$('#d-top-breadcrumbs').html(resultado);
	    }
	});
}