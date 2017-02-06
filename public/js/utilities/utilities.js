function base64Encode(str) {
    var CHARS = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
    var out = "", i = 0, len = str.length, c1, c2, c3;
    while (i < len) {
        c1 = str.charCodeAt(i++) & 0xff;
        if (i == len) {
            out += CHARS.charAt(c1 >> 2);
            out += CHARS.charAt((c1 & 0x3) << 4);
            out += "==";
            break;
        }
        c2 = str.charCodeAt(i++);
        if (i == len) {
            out += CHARS.charAt(c1 >> 2);
            out += CHARS.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
            out += CHARS.charAt((c2 & 0xF) << 2);
            out += "=";
            break;
        }
        c3 = str.charCodeAt(i++);
        out += CHARS.charAt(c1 >> 2);
        out += CHARS.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
        out += CHARS.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
        out += CHARS.charAt(c3 & 0x3F);
    }
    return out;
}

function OpenModal(id,contenido,size){
    if(contenido!= ''){
        if(size != ''){
            size = ' modal-'+size;
        }
        var modal = '';
        modal += '<div class="modal-overlay"></div>';
        modal += '<div class="modal fadeInTop" tabindex="-1">';
        modal += '  <div class="modal-container">';
        modal += '      <div class="modal-dialog'+size+'">';
        modal += contenido;
        modal += '      </div>';
        modal += '  </div>';
        modal += '</div>';
        $('body').append(modal);
        $('.modal-overlay').fadeIn(400);
        $('.modal').show();
        $("body").addClass("modal-open");
        $('html').keyup(function(e) {
            if (e.keyCode == 27) {
                CloseModal();
            }
        });
        $("[data-value='modal-dismiss']").click(function(e) {
           CloseModal();
        });
    }else{
    console.log('Contenido vacio!');
    }
}

function CloseModal(){
    $('.modal-overlay').fadeOut(400);
        if($('.modal').hasClass('fadeInTop')){
            $('.modal').removeClass('fadeInTop');
            $('.modal').addClass('fadeOutTop');
            $("body").removeClass("modal-open")
            setTimeout(function(){
                $('.modal').remove();
                $('.modal-overlay').remove();
            }, 300);
        }
}

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
    setTimeout(function(){ 
        $('#toast_'+numbertoast).removeClass('fadeInTop');
        $('#toast_'+numbertoast).addClass('fadeOutTop');
        setTimeout(function(){ 
            $('#toast_'+numbertoast).remove();
        }, 500);
    }, (time*1000));
}