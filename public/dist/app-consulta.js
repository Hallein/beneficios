function t(){if(o($("#user-rut")[0])){var t=$("#user-rut").val(),a=$("#user-company").val();$.ajax({type:"GET",url:"api/consulta/"+a+"/"+t,dataType:"json",beforeSend:function(){$("#floating-loader").fadeIn(200)},complete:function(){$("#floating-loader").fadeOut(200)},success:function(t){"error"==t.status?r(t.status,t.message.title,t.message.body,t.message.timeout):($(document).off("keypress"),$("#d-content").hide(),$("body").scrollTop(),$("#d-content").html(t.html).fadeIn())}})}else r("error","","El rut no es válido",2)}function a(){$("input, textarea").focusin(function(){$(this).parents(".form-input").find("label").addClass("active-input")}),$("input, textarea").off("focusin"),$("input, textarea").focusin(function(){$(this).parents(".form-input").find("label").addClass("active-input")}),$("input, textarea").off("focusout"),$("input, textarea").focusout(function(){var t=$(this).parents(".form-input").find("label");"hito-date"!=this.id&&""==$(this).val()&&t.hasClass("active-input")&&t.removeClass("active-input")}),$("input, textarea").each(function(t){""!=$(this).val()&&$(this).parents(".form-input").find("label").addClass("active-input")}),$("select").each(function(t){$(this).parents(".form-input").find("label").addClass("active-input")}),$("textarea").each(function(t){$(this).parents(".form-input").find("label").addClass("label-select")})}function e(){var t=$(".navbar").children();t.click(function(){t.removeClass("nav-element-active"),$(this).addClass("nav-element-active")}),$("#main-title").text("Beneficios habitacionales"),$("#beneficios-nav").click(function(){ListarBeneficios(),$("#main-title").text("Beneficios habitacionales")}),$("#salir-nav").click(function(){n(),$("#main-title").text("Hasta pronto!")}),$("#cuenta-nav").click(function(){formularioPassword(),$("#main-title").text("Gestión de cuenta")}),$("#main-title").text("Beneficios habitacionales")}function n(){$.ajax({type:"POST",url:"../api/logout",dataType:"json",beforeSend:function(){$("#floating-loader").fadeIn(200)},complete:function(){$("#floating-loader").fadeOut(200)},success:function(t){"success"==t.status&&(window.location.href="../login/")}})}function r(t,a,e,i){var n=$(".d-toast").length,r="";switch(t){case"success":r=" d-toast-success";break;case"error":r=" d-toast-error";break;case"notify":r=" d-toast-notify";break;case"warning":r=" d-toast-warning"}var o="";o+='<div id="toast_'+n+'" class="d-toast fadeInTop'+r+'">',o+="<strong>"+a+"</strong>",o+=" "+e+".",o+="</div>",$("body").append(o),$("#toast_"+n).show();var s=80+50*n;$("#toast_"+n).css("top",s),setTimeout(function(){$("#toast_"+n).removeClass("fadeInTop"),$("#toast_"+n).addClass("fadeOutTop"),setTimeout(function(){$("#toast_"+n).remove()},500)},1e3*i)}function o(t){var a=t.value,e="";for(i=0;i<a.length;i++)" "!=a.charAt(i)&&"."!=a.charAt(i)&&"-"!=a.charAt(i)&&(e+=a.charAt(i));if(a=e,largo=a.length,""!=a&&largo<8)return!1;for(i=0;i<largo;i++)if("0"!=a.charAt(i)&&"1"!=a.charAt(i)&&"2"!=a.charAt(i)&&"3"!=a.charAt(i)&&"4"!=a.charAt(i)&&"5"!=a.charAt(i)&&"6"!=a.charAt(i)&&"7"!=a.charAt(i)&&"8"!=a.charAt(i)&&"9"!=a.charAt(i)&&"k"!=a.charAt(i)&&"K"!=a.charAt(i))return t.focus(),t.select(),!1;var n="";for(i=largo-1,j=0;i>=0;i--,j++)n+=a.charAt(i);var r="";for(r+=n.charAt(0),r+="-",cnt=0,i=1,j=2;i<largo;i++,j++)3==cnt?(r+=".",j++,r+=n.charAt(i),cnt=1):(r+=n.charAt(i),cnt++);for(n="",i=r.length-1,j=0;i>=0;i--,j++)n+=r.charAt(i);return t.value=n.toUpperCase(),s(t,a)}function s(t,a){"-"==t.value&&(t.value="");var e,n,r;if((e=a.length)<8&&e>3)return!1;if(n=e>2?a.substring(0,e-1):a.charAt(0),r=a.charAt(e-1),null==n||null==r)return!0;if(""==n||""==r)return!0;var o="0";for(suma=0,mul=2,i=n.length-1;i>=0;i--)suma+=n.charAt(i)*mul,7==mul?mul=2:mul++;return res=suma%11,1==res?o="k":0==res?o="0":(dvi=11-res,o=dvi+""),o==r.toLowerCase()}function c(t){if(""!=t){for(var a,e,i,n="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",r="",o=0,s=t.length;o<s;){if(a=255&t.charCodeAt(o++),o==s){r+=n.charAt(a>>2),r+=n.charAt((3&a)<<4),r+="==";break}if(e=t.charCodeAt(o++),o==s){r+=n.charAt(a>>2),r+=n.charAt((3&a)<<4|(240&e)>>4),r+=n.charAt((15&e)<<2),r+="=";break}i=t.charCodeAt(o++),r+=n.charAt(a>>2),r+=n.charAt((3&a)<<4|(240&e)>>4),r+=n.charAt((15&e)<<2|(192&i)>>6),r+=n.charAt(63&i)}return r}return!1}$(document).ready(function(){a(),$("#send-button").click(function(){t()}),$("#user-rut").focus(),$(document).keypress(function(a){13==(a.keyCode||a.which)&&t()})});