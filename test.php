<?php 
function __autoload($class_name){
	include 'admin/core/' . $class_name . '.' . 'php';
}

$users=new Users;

echo "<pre>";
print_r($users->getAdmins());	
echo "</pre>";


$to = $users->getAdmins()[0]['email'];
if(count($users->getAdmins()) > 1){
	for($i=1; $i < count($users->getAdmins()); $i++){
		$to .= ", " . $users->getAdmins()[$i]['email'];
	}
}
echo $to;
?>