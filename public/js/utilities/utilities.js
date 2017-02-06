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
        });
        $("[data-value='modal-dismiss']").click(function(e) {
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
        });
    }else{
    console.log('Contenido vacio!');
    }
}