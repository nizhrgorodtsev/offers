<?php
	function __autoload($class_name){
		include 'admin/core/' . $class_name . '.' . 'php';
	}

	$users = new Users;
	$users->email = $_REQUEST['reminderemail'];
	if($users->checkEmail() != '') echo 'true';
	else echo 'false';
?>