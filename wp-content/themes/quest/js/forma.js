function send(url,form_id,result_div){$('.loading-block').addClass('loading');jQuery.ajax({type:"POST",url:url,data:jQuery("#"+form_id).serialize(),success:function(html){jQuery("#"+result_div).empty();jQuery("#"+result_div).append(html);setTimeout(function(){jQuery(document).ready(function(){jQuery("#"+result_div).fadeOut(1800);$('.loading-block').removeClass('loading');});},2200)},error:function(){jQuery("#"+result_div).empty();jQuery("#"+result_div).append("Ошибка!");}});}function sendForm(){document.getElementById("result").style.display="block";}function sendForm2(){document.getElementById("result2").style.display="block";}function sendForm4(){document.getElementById("result4").style.display="block";}function sendForm5(){document.getElementById("result5").style.display="block";}