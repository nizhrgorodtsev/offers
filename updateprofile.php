<?php 
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}
$users = new Users;
$users->id=$_POST['id'];
$users->name=$_POST['name'];
$users->phone=$_POST['phone'];
$users->avatar=$_POST['avatar'];

$users->updateUser();
?>