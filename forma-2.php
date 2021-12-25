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
	$name = $_POST['name'];	
	$phone = $_POST['phone'];
	$descr = $_POST['descr'];
	$address = $_POST['address'];

	$name = clean($name);
	$phone = clean($phone);	
	$descr = clean($descr);
	$address = clean($address);

	if(!empty($name) && !empty($phone) && !empty($descr) && !empty($descr)  && !empty($address)) {
	  if(check_length($name, 2, 25) && check_length($phone, 2, 50) && check_length($descr, 2, 1000)  && check_length($address, 2, 1000)) {
	  	$mail_info = 'info@questzone.zt.ua';
    	$sub="Сообщение с сайта: http://questzone.zt.ua/";
			$address = 'vdns@ukr.net,questzone.zt@ukr.net';		/*Тут указіваем E-mail, куда будет отправляться письмо */
$messageTB = "
‼ $sub ‼
Купить подарочный сертификат
Телефон:  $phone
Адрес: $address 
Сообщение:  $descr
";
$mes = "
Адрес: $name \n
Телефон:  $phone \n
Адрес: $address \n
Сообщение:  $descr \n
";
			$verify = mail($address, $sub ,$mes, "Content-type:text/plain; charset = utf-8\r\nFrom:$mail_info");			
	      echo "<html><head><meta http-equiv='refresh' content='2; URL=http://questzone.zt.ua/'/></head><body><div class='otpravleno'>Ваше сообщение успешно отправлено</div></body></html>";
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
