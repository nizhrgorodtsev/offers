<?php 
	class Users{
		public $id;
		public $sql;
		public $stmt;
		public $name;
		public $email;
		public $pass;
		public $phone;
		public $status;
		public $access_level;
		public $salt = '$1$MTUwN2NhZTMw';
		public $date_;
		public $avatar;
		public $object_id;
		
		public function regUser(){
			$this->sql = ('INSERT INTO `users`(`name`, `email`, `pass`, `phone`, `status`, `access_level`, `date_`, `avatar`) VALUES (?,?,?,?,?,?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->email);
			$this->stmt -> bindValue(3, $this->pass);
			$this->stmt -> bindValue(4, $this->phone);
			$this->stmt -> bindValue(5, $this->status);
			$this->stmt -> bindValue(6, $this->access_level);
			$this->stmt -> bindValue(7, $this->date_);
			$this->stmt -> bindValue(8, $this->avatar);
			$this->stmt -> execute();
		}
		public function creatHash(){
			$this->pass = crypt($this->pass, $this->salt);
		}
		public function findHash(){
			$this->sql = ('SELECT `pass`  FROM `users` WHERE `email` = ? AND `status` = 1');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->email);
			$this->stmt -> execute();
			return $this -> stmt -> fetchColumn();
		}
		public function checkEmail(){
			$this->sql = ('SELECT `email` FROM `users` WHERE `email` = ? AND `status` = 1');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->email);
			$this->stmt -> execute();
			return $this->stmt ->fetchColumn();
		}
		public function checkConfirm(){
			$this->sql = ('SELECT `email`, `pass`, `id` FROM `users`');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this->stmt ->fetchAll(PDO::FETCH_ASSOC);
		}
		public function updateStatus(){
			$this->sql = ('UPDATE `users` SET `status`= 1 WHERE `id`=?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}
		public function updatePass(){
			$this->sql = ('UPDATE `users` SET `pass`= ? WHERE `email`=?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->pass);
			$this->stmt -> bindValue(2, $this->email);
			$this->stmt -> execute();
		}
		public function getUserName(){
			$this->sql = ('SELECT `name`  FROM `users` WHERE `email` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->email);
			$this->stmt -> execute();
			return $this -> stmt -> fetchColumn();
		}
		public function getUserId(){
			$this->sql = ('SELECT `id`  FROM `users` WHERE `email` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->email);
			$this->stmt -> execute();
			return $this -> stmt -> fetchColumn();
		}
		public function getDataUser(){
			$this->sql = ('SELECT * FROM `users` WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
			return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
		}
		public function printAccessLevel(){
			if($this->getDataUser()['access_level'] == "user")
			return "учасник торгів";
			if($this->getDataUser()['access_level'] == "admin")
			return "адміністратор";
		}
		public function getObjectId(){
			$this->sql = ('SELECT `object_id` FROM `users` WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
			return $this -> stmt -> fetchColumn();
		}		
		public function updateObjectId(){
			$this->sql = ('UPDATE `users` SET `object_id`= ? WHERE `id`=?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->object_id);
			$this->stmt -> bindValue(2, $this->id);
			$this->stmt -> execute();
		}
		public function getAdmins(){
			$this->sql = ('SELECT `email` FROM `users` WHERE `access_level` = "admin"');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);
		}	
		public function updateUser(){
			$this->sql = ('UPDATE `users` SET `name`= ?,`phone`= ?,`avatar`= ? WHERE id=?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->phone);
			$this->stmt -> bindValue(3, $this->avatar);
			$this->stmt -> bindValue(4, $this->id);
			$this->stmt -> execute();
		}
		public function allUsers(){
			$this->sql = ('SELECT * FROM `users` WHERE `access_level` = "user" ORDER BY `date_` DESC');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function deleteUser(){
			$this->sql = ('DELETE FROM `users` WHERE id = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}
	}
?>





























