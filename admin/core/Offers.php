<?php 
	class Offers{
		public $id;
		public $user_name;
		public $user_phone;
		public $date_;
		public $object_name;
		public $status;
		public $user_offer;

		public function allOffers(){
			$this->sql = ('SELECT * FROM `offers` ORDER BY `date_` DESC');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this->stmt ->fetchAll(PDO::FETCH_ASSOC);
		}
		public function deleteOffer(){
			$this->sql = ('DELETE FROM `offers` WHERE id = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}
public function insertOffer(){
			$this->sql = ('INSERT INTO `offers` (`user_name`, `user_phone`, `date_`, `object_name`, `status`, `user_offer`) VALUES (?,?,?,?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->user_name);
			$this->stmt -> bindValue(2, $this->user_phone);
			$this->stmt -> bindValue(3, $this->date_);
			$this->stmt -> bindValue(4, $this->object_name);
			$this->stmt -> bindValue(5, $this->status);
			$this->stmt -> bindValue(6, $this->user_offer);
			$this->stmt -> execute();
		}		

	}
?>