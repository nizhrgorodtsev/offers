<?php 
	date_default_timezone_set('Europe/Kiev');
 	
	include "admin/core/Objects.php";
	include "admin/core/BD.php";
	$objects = new Objects;	
	
	$objects->id=$_GET['id'];
	$objects->type=$_POST['type'];
	$objects->name=$_POST['name'];
	$objects->total_area=$_POST['total_area'];
	$objects->living_area=$_POST['living_area'];
	$objects->kitchen_area=$_POST['kitchen_area'];
	$objects->rooms=$_POST['rooms'];
	$objects->wall=$_POST['wall'];
	$objects->floors=$_POST['floors'];
	$objects->floor=$_POST['floor'];
	$objects->land_area=$_POST['land_area'];
	$objects->year=$_POST['year'];
	$objects->decoration=$_POST['decoration'];
	$objects->sale_status=$_POST['sale_status'];
	$objects->start_price=$_POST['start_price'];
	$objects->current_price=$_POST['current_price'];
	$objects->hot_price=$_POST['hot_price'];
	$objects->date_off=$_POST['date_off'];
	$objects->updating=date("Y-m-d H:i:s");
	
	$objects->updateObject();
	$link="index.php?id=" . $_GET['id'] . "&page=offer&content=editobject";
	header("Location:" . $link);
?>