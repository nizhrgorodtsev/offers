<?php 
date_default_timezone_set('Europe/Kiev'); 
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}
require "header.php";
if(!empty($_GET["page"])) include $_GET["page"] . "." . "php";
else include "reg.php";
require "footer.php";
?>