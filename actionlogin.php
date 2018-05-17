<?php 
session_start();
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}

$objects = new Objects;

$users = new Users;
if(!empty($_POST)){
	$users->email = strip_tags($_POST["register-email"]);
	$users->pass = strip_tags($_POST["register-password"]);
	
	$users->creatHash();
	$compare = $users->findHash();
	
	
	
	if( $compare == $users->pass){
	$link = 'index.php' . $objects->buildLink('offer');
	$_SESSION['id'] = $users->getUserId();
	header('Location:' . $link);
	}
	else {
	$link = 'index.php' . $objects->buildLink('login') . '&login=error';
	header('Location:' . $link);
	}
}
?>