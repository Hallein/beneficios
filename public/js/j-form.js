$('input, textarea').focusin(function(){
	var parent = $(this).parents('.form-input');
	parent.find('label').addClass('active-input');
});

$('input, textarea').focusout(function(){
	var parent = $(this).parents('.form-input');
	var label = parent.find('label');
	if($(this).val() == ''){
		if(label.hasClass('active-input')){
			label.removeClass('active-input');
		}
	}
});

$('select').each(function(index){
	var parent = $(this).parents('.form-input');
	parent.find('label').addClass('active-input');
});

$('textarea').each(function(index){
	var parent = $(this).parents('.form-input');
	parent.find('label').addClass('label-select');
});