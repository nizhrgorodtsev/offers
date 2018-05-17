<?php 
session_start();
$users= new Users;
$objects = new Objects;

$arr = $users->checkConfirm();
$salt = $users->salt;

if(isset($_GET['confirm'])) {
	$confirm = $_GET['confirm'];
	foreach($arr as $key=>$value){
		if($confirm == md5($value['pass'] . $salt . $value['email'])){
		$users->id = $value['id'];
		$users->updateStatus();
		$_SESSION['id'] = $users->id;
		$link = 'index.php' . $objects->buildLink('offer');
		header("Location:" . $link);
		exit;
		}
	}
	$link = 'index.php' . $objects->buildLink('login') . '&confirm=error';
	header("Location:" . $link);
}
?>