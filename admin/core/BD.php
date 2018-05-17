<?php
class BD{
	public static function conection(){
		return new PDO('mysql:host=maria.mysql.tools; dbname=maria_offers', 'maria_offers', 'gvljxf9e', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	}
}
?>