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
	  		$sub="Сообщение с сайта: http://questzone.zt.ua/pravila/";
			$address = 'vdns@ukr.net,questzone.zt@ukr.net';		/*Тут указіваем E-mail, куда будет отправляться письмо */
$messageTB = "
‼ $sub ‼
@Основные правила@
Телефон:  $phone
";
$mes = "
Телефон:  $phone \n
";
function sendMessage($chatID, $message, $token){
  $url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
  $url = $url . "&text=" . urlencode($message);
  $ch = curl_init();
  $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
  curl_setopt_array($ch, $optArray);
  $result = curl_exec($ch);
  curl_close($ch);
}
$token = "bot5099544126:AAE6aCjP44Sar2281qE56LZw_iYVYmyErgo";
$chatID = "-1001608034990";
sendMessage($chatID, $messageTB, $token);

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=urf-8' . "\r\n";
$headers .= 'From: http://questzone.zt.ua/pravila/';

mail($address, $sub, $message, $headers);
			
	        echo "<html><head><meta http-equiv='refresh' content='2; URL=http://questzone.zt.ua/pravila/'/></head><body><div class='otpravleno'>Совсем скоро с Вами свяжется наш менеджер</div></body></html>";
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


