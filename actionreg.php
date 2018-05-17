<?php
date_default_timezone_set('Europe/Kiev');
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}
$objects = new Objects;
$users = new Users;
if(!empty($_POST)){
	$users->name = strip_tags($_POST["registerUsername"]);
	$users->email = strip_tags($_POST["email"]);
	$users->pass = strip_tags($_POST["registerPassword"]);
	$users->phone = strip_tags($_POST["phone"]);
	$users->status = '0';
	$users->access_level = 'user';
	$users->date_ = date("Y-m-d H:i:s");
	$users->avatar = 'img/user.png';
	$users->creatHash();
	$users->regUser();


	$md5 = md5($users->pass.$users->salt.$users->email);
	$subject = "Підтвердження реєстрації на Offers нерухомість";
	$to = $users->email;
	$from = "info@gidrealty.com.ua";

	$msg = 'Доброго дня, <strong>' . $users->name . "</strong>, сьогодні " . $users->date_ . ' на сайті <a href="http://www.'. $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . '">'. $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . '</a> було
зареєстровано користувача з вашим Email. Тому Ви отримали цей лист. <br>
<br>
Якщо Ви не реєструвалися на нашому сайті, то просто видаліть цей лист, а якщо
ж це були Ви, будь ласка, перейдіть за нижчеприведеним посиланням: <br>
<br>
Посилання для активації:
<a terget="blank" href="http://www.' . $_SERVER['SERVER_NAME'] . $objects->buildLink('confirm') . '&confirm=' . $md5 . '">' . $_SERVER['SERVER_NAME'] . $objects->buildLink('confirm') . '&confirm=' . $md5 . '</a><br>
<br>
-----------------------------
<br>
<br>
З повагою адміністрація <a href="http://www.' . $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . '">'. $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') .'</a> <br>
Email для контактів:<a href="mailto: info@gidrealty.com.ua"> info@gidrealty.com.ua </a>';

$headers = "From: info@gidrealty.com.ua" . "\r\n" .
    "Reply-To: $from" . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
	'MIME-Version: 1.0' . "\r\n" .
	'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to, $subject, $msg, $headers, '-finfo@gidrealty.com.ua');

$link = 'index.php' . $objects->buildLink('reg') . '&reg=success';
header('Location:' . $link);
}
?>