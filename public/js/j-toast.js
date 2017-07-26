function ShowToast(type, title, message, time){
	var numbertoast = $('.d-toast').length;
	var toastclass = '';
	switch(type) {
	    case 'success':
	        toastclass = ' d-toast-success';
	        break;
	    case 'error':
	        toastclass = ' d-toast-error';
	        break;
	    case 'notify':
	       toastclass = ' d-toast-notify';
	        break;
	    case 'warning':
	        toastclass = ' d-toast-warning';
	        break;
	    } 
	    var toast = '';
	    toast += '<div id="toast_'+numbertoast+'" class="d-toast fadeInTop'+toastclass+'">';
	    toast += '<strong>'+title+'</strong>';
	    toast += ' '+message+'.';
	    toast += '</div>';
	    $('body').append(toast);
	    $('#toast_'+numbertoast).show();
	    var top = 80 + (numbertoast*50);
	    $('#toast_'+numbertoast).css('top',top);
	    setTimeout(function(){ 
	        $('#toast_'+numbertoast).removeClass('fadeInTop');
	        $('#toast_'+numbertoast).addClass('fadeOutTop');
	        setTimeout(function(){ 
	            $('#toast_'+numbertoast).remove();
	        }, 500);
	    }, (time*1000));
}