<?php 
session_start();
date_default_timezone_set('Europe/Kiev'); 
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}
$users= new Users;
$users->id = $_SESSION['id'];
$users->object_id = $_GET['id'];

$objects = new Objects;
$objects->id = $_GET['id'];

$price = $_REQUEST['price'];
$start = $objects->getMinPrice();

if($price >= $start){
	echo '<p class="is-valid valid-feedback d-block">Дякуємо! Ваша пропозиція прийнята. Очікуйте на дзвінок адміністратора</p>';
	if(!empty($users->getObjectId())){
		if(explode(';', $users->getObjectId()) !='' && explode(';', $users->getObjectId()) > 1 ){
			$x=0;
			foreach(explode(';', $users->getObjectId()) as $value){
				if($value == $_GET['id']) $x = 1;
			}
			if($x==0){
				$users->object_id = $users->getObjectId() . ';' . $_GET['id'];
				$users->updateObjectId();
			}
		}
		else {
			if($users->getObjectId() != $_GET['id']){ 
				$users->object_id = $users->getObjectId() . ';' . $_GET['id'];
				$users->updateObjectId();
			}
		}
	}
	else $users->updateObjectId();	
	
	$offers=new Offers;
	$offers->user_name = $users->getDataUser()['name'];
	$offers->user_phone = $users->getDataUser()['phone'];
	$offers->date_ = date("Y-m-d H:i:s"); 
	$offers->object_name = $objects->dataObject()['name'];
	$offers->status = 0;
	$offers->user_offer = $price;
	$offers->insertOffer();

//email to user after user's offer
$from = "info@gidrealty.com.ua";
$to = $users->getDataUser()['email'];
$subject = "Ваша пропозиція прийнята";
$msg = "Доброго дня, <strong>" . $users->getDataUser()['name'] . "</strong>, сьогодні на сайті <a terget='blank' href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') . "'>". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') . "</a> користувач, що зареєстрований на ваш Email, запропонував ціну <strong>". $price ."</strong> на об'єкт <strong><a terget='blank' href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."'>". $objects->dataObject()['name'] ."</a></strong>. Тому Ви отримали цей лист. <br>
<br>
Адміністратор нашого сайту зателефонує Вам у робочий час, на телефон, вказаний Вами при реєстрації, для підтвердження Вашої пропозиції, після чого поточна ціна об'єкту на нашому сайті буде оновлена, згідно з найвищою запропонованою ціною.
<br>
Якщо інший користувач запропонує ціну, що буде перевищувати поточну максимальну ціну, Ви будете повідомлені про це листом.
<br>
<br>
-----------------------------
<br>
<br>
З повагою адміністрація <a href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."'>". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."</a> <br>
Email для контактів:<a href='mailto: info@gidrealty.com.ua'> info@gidrealty.com.ua </a>";


$headers = "From: info@gidrealty.com.ua" . "\r\n" .
    "Reply-To: $from" . "\r\n" .
    'X-Mailer: PHP/' . phpversion() . "\r\n" .
	'MIME-Version: 1.0' . "\r\n" .
	'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to, $subject, $msg, $headers, '-finfo@gidrealty.com.ua');	

//email to admin after user's offer
$to = $users->getAdmins()[0]['email'];
if(count($users->getAdmins()) > 1){
	for($i=1; $i < count($users->getAdmins()); $i++){
		$to .= ", " . $users->getAdmins()[$i]['email'];
	}
}
$subject = "Отримана нова цінова пропозиція";
$msg = "Доброго дня, <strong>admin</strong>, сьогодні на сайті <a terget='blank' href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."'>". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."</a> зареєстрований користувач, запропонував ціну <strong>". $price ."</strong> на об'єкт <strong><a terget='blank' href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."'>". $objects->dataObject()['name'] ."</a></strong>. Тому Ви отримали цей лист. <br>
<br>
Зателефонуйте користувачу, та уточніть, чи дійсно він має намір купити об'єкт по запропонованій ним ціні. В разі підтвердження, зайдіть в адмінку та поставте нову поточну ціну об'єкта.
<br>
<br>
<strong>Контактні дані користувача:</strong>
<br>
<br>
<strong>Ім'я: </strong>". $users->getDataUser()['name'] ."<br>
<strong>Email: </strong>". $users->getDataUser()['email'] ."<br>
<strong>Телефон: </strong>". $users->getDataUser()['phone'] ."<br>

<br>
-----------------------------
<br>
<br>
З повагою адміністрація <a href='http://www.". $_SERVER['SERVER_NAME'] . $objects->buildLink('offer') ."'>gidrealty.com.ua/offers</a> <br>
Email для контактів:<a href='mailto: info@gidrealty.com.ua'> info@gidrealty.com.ua </a>";

mail($to, $subject, $msg, $headers, '-finfo@gidrealty.com.ua');
	
}	

else{
	echo '<p class="is-invalid invalid-feedback d-block">Ставка не може бути нижчою від стартової ціни <em>' . $start . ' $</em><p>';
}
?>