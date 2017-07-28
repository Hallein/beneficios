$(document).ready(function(){
	formInputsInit();
	$('#send-button').click(function(){
    	var id = $(this).attr('data-val');
    	verBeneficio(id);
    });
});