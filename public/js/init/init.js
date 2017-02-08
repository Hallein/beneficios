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
	ShowTest(); //BORRAR
});