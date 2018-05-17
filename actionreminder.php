<?php 
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}
$objects = new Objects;

$users = new Users;
$users->email = strip_tags($_POST['reminderemail']);

// Символы, которые будут использоваться в пароле. 
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
// Количество символов в пароле. 
$max=8; 
// Определяем количество символов в $chars 
$size=StrLen($chars)-1; 
// Определяем пустую переменную, в которую и будем записывать символы. 
$password=null; 
// Создаём пароль. 
while($max--) 
$password.=$chars[rand(0,$size)]; 

$users->pass = $password;
$users->creatHash();
$users->updatePass();
$users->date_ = date("Y-m-d H:i:s");
$md5 = md5($users->pass.$users->salt.$users->email);

$to = $users->email;
$from = "info@gidrealty.com.ua";
$subject = "Відновлення паролю на сайті Offers нерухомість";

$msg = "Доброго дня, <strong>" . $users->getUserName() . "</strong>, сьогодні " . $users->date_ . " на сайті <a href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . "'>". $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . "</a> було здійснено запит про відновлення паролю на Ваш Email. Тому Ви отримали цей лист. <br>
<br>
Якщо Ви не здійснювали запит про відновлення паролю на нашому сайті, то просто видаліть цей лист, а якщо ж це були Ви, будь ласка, введіть новий пароль на сторінці авторизації: 
<br><h2>" 
. $password . 
"</h2><br>
або перейдіть за посиланням:
<a terget='blank' href='http://www." . $_SERVER['SERVER_NAME'] . $objects->buildLink('confirm') . "&confirm=" . $md5 . "'>" . $_SERVER['SERVER_NAME'] . $objects->buildLink('confirm') . "&confirm=" . $md5 . "</a>
<br>
<br>
-----------------------------
<br>
<br>
З повагою адміністрація <a href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . "'>". $_SERVER['SERVER_NAME'] . $objects->buildLink('reg') . "</a> <br>
Email для контактів:<a href='mailto: info@gidrealty.com.ua'> info@gidrealty.com.ua </a>";

$headers = "From: info@gidrealty.com.ua" . "\r\n" .
    "Reply-To: $from" . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
	'MIME-Version: 1.0' . "\r\n" .
	'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to, $subject, $msg, $headers, '-finfo@gidrealty.com.ua');	

$link = 'index.php' . $objects->buildLink('reminder') . '&reminder=success';
header('Location:' . $link);
?>