<?php
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {	
	$phone = $_POST['phone'];
	$phone = clean($phone);	

	if(!empty($phone)) {

	    if(check_length($phone, 2, 50))  {
    		$mail_info = 'info@questzone.zt.ua';
	  		$sub="Сообщение с сайта: http://questzone.zt.ua/";
				$address = 'vdns@ukr.net,questzone.zt@ukr.net';		/*Тут указіваем E-mail, куда будет отправляться письмо */
				$mes = "
				Телефон:  $phone \n
				";
				$verify = mail($address, $sub ,$mes, "Content-type:text/plain; charset = utf-8\r\nFrom:$mail_info");
			
	        echo "<html><head><meta http-equiv='refresh' content='2; URL=http://questzone.zt.ua/'/></head><body><div class='otpravleno'>Совсем скоро с Вами свяжется наш менеджер</div></body></html>";
	    } else {
	        echo "Введенные данные некорректные";
	    }
	} else {
	    echo "Заполните пустые поля";
	}
} else {
	header("Location: ../index.html");
}
?>


