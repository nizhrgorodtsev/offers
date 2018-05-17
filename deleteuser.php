<?php 
	function __autoload($class_name){
		include 'admin/core/' . $class_name . '.' . 'php';
	}
	$users = new Users;
	$users->id = $_POST['userid'];
	
	//Сканируем папку avatar  
	$dir = "img/upload/avatar";
	$arr = scandir($dir);
	//Создаем массив аватаров удаляемого юзера
	$avatar = array();
	foreach($arr as $key=>$value){
		$i = explode("_", $value)[0];
		if ($i == $users->id) $avatar[] = $value;
	}
	// удаляем аватары если они есть
	if(!empty($avatar)){
		foreach($avatar as $key=>$value){
			unlink($dir."/".$value);	
		}
		echo "Фалы успешно удалены";
	}
	else echo "Нету аватара у этого юзера!";
	//удаляем юзера из базы данных
	$users->deleteUser();
	//переходим на страницу списка юзеров
	$objects = new Objects;
	$link = "index.php" . $objects->buildLink('offer') . "&content=adminusers";
	header("Location:" . $link);
?>