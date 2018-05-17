<?php  
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}
$offers = new Offers;
$offers->id = $_POST['offerid'];
$offers->deleteOffer();

$objects = new Objects;

$link="index.php". $objects->buildLink('offer'). "&content=adminoffers";
header("location:" . $link);
?>