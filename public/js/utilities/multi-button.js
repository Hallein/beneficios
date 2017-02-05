function HiddenOptionsInit(){
	$('.d-multi-button').unbind('focusin');
	$('.d-multi-button').focusin(function() {
	  var hiddenoptions = $(this).closest('.btn-multiple').find('.btn-multiple-options').children();
	  hiddenoptions.fadeIn(300);
	});
	$('.d-multi-button').unbind('focusout');
	$('.d-multi-button').focusout(function() {
	  var hiddenoptions = $(this).closest('.btn-multiple').find('.btn-multiple-options').children();
	  hiddenoptions.fadeOut(200);
	});
}