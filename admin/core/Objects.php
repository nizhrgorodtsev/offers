<?php 
	class Objects{
		public $id;
		public $type;
		public $status;
		public $name;
		public $total_area;
		public $living_area;
		public $kitchen_area;
		public $rooms;
		public $wall;
		public $floors;
		public $floor;
		public $land_area;
		public $year;
		public $decoration;
		public $sale_status;
		public $start_price;
		public $current_price;
		public $hot_price;
		public $date_off;
		public $updating;
		public $main_photo;
		public $slider;		
		
		public function dataObject(){
			$this->sql = ('SELECT * FROM `objects` WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
			return $this->stmt ->fetch(PDO::FETCH_ASSOC);		
		}
		public function allObject(){
			$this->sql = ('SELECT * FROM `objects` ORDER BY `date_off`');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this->stmt ->fetchAll(PDO::FETCH_ASSOC);
		}
		public function buildLink($page){
			if(!empty($_GET['id'])){
				return '?id=' . $_GET['id'] . '&page=' . $page;
			}
			else return '?page=' . $page;
		}
		public function actionLink($action){
			if(!empty($_GET['id'])){ 
				return $action . '.php?id=' . $_GET['id'];
			}
			else return $action . '.php';
		}
		public function getMinPrice(){
			$this->sql = ('SELECT `start_price` FROM `objects` WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
			return $this->stmt ->fetchColumn();
		}
		public function selectedType($arr){
			foreach ($arr as $key=>$value){
				if ($value != $this->type)
				echo "<option value='$value'>$value</option>";
				else echo "<option selected value='$value'>$value</option>";
			}
		}
		public function selectedStatus($arr){
			foreach ($arr as $key=>$value){
				if ($value != $this->status)
				echo "<option value='$value'>$value</option>";
				else echo "<option selected value='$value'>$value</option>";
			}
		}
		public function updateSlider(){
			$this->sql = ('UPDATE `objects` SET `slider` = ? WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->slider);
			$this->stmt -> bindValue(2, $this->id);
			$this->stmt -> execute();
		}
		public function updateMainPhoto(){
			$this->sql = ('UPDATE `objects` SET `main_photo` = ? WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->main_photo);
			$this->stmt -> bindValue(2, $this->id);
			$this->stmt -> execute();
		}
		public function updateObject(){
			$this->sql = ('UPDATE `objects` SET `name`= ?, `type`= ?, `total_area`= ?, `living_area`= ?, `kitchen_area`= ?, `rooms`= ?, `wall`= ?, `floors`= ?, `floor`= ? , `land_area`= ?, `year`= ?, `decoration`= ?, `sale_status`= ?, `start_price`= ?, `current_price`= ?, `hot_price`= ?, `date_off`= ?, `updating`= ? WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->type);
			$this->stmt -> bindValue(3, $this->total_area);
			$this->stmt -> bindValue(4, $this->living_area);
			$this->stmt -> bindValue(5, $this->kitchen_area);
			$this->stmt -> bindValue(6, $this->rooms);
			$this->stmt -> bindValue(7, $this->wall);
			$this->stmt -> bindValue(8, $this->floors);
			$this->stmt -> bindValue(9, $this->floor);
			$this->stmt -> bindValue(10, $this->land_area);
			$this->stmt -> bindValue(11, $this->year);
			$this->stmt -> bindValue(12, $this->decoration);
			$this->stmt -> bindValue(13, $this->sale_status);
			$this->stmt -> bindValue(14, $this->start_price);
			$this->stmt -> bindValue(15, $this->current_price);
			$this->stmt -> bindValue(16, $this->hot_price);
			$this->stmt -> bindValue(17, $this->date_off);
			$this->stmt -> bindValue(18, $this->updating);
			$this->stmt -> bindValue(19, $this->id);
			$this->stmt -> execute();
		}
		public function insertObject(){
			$this->sql = ('INSERT INTO `objects` (`name`, `type`, `total_area`, `living_area`, `kitchen_area`, `rooms`, `wall`, `floors`, `floor`, `land_area`, `year`, `decoration`, `sale_status`, `start_price`, `current_price`, `hot_price`, `date_off`, `updating`, `main_photo`, `slider` ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->type);
			$this->stmt -> bindValue(3, $this->total_area);
			$this->stmt -> bindValue(4, $this->living_area);
			$this->stmt -> bindValue(5, $this->kitchen_area);
			$this->stmt -> bindValue(6, $this->rooms);
			$this->stmt -> bindValue(7, $this->wall);
			$this->stmt -> bindValue(8, $this->floors);
			$this->stmt -> bindValue(9, $this->floor);
			$this->stmt -> bindValue(10, $this->land_area);
			$this->stmt -> bindValue(11, $this->year);
			$this->stmt -> bindValue(12, $this->decoration);
			$this->stmt -> bindValue(13, $this->sale_status);
			$this->stmt -> bindValue(14, $this->start_price);
			$this->stmt -> bindValue(15, $this->current_price);
			$this->stmt -> bindValue(16, $this->hot_price);
			$this->stmt -> bindValue(17, $this->date_off);
			$this->stmt -> bindValue(18, $this->updating);
			$this->stmt -> bindValue(19, $this->main_photo);
			$this->stmt -> bindValue(20, $this->slider);
			$this->stmt -> execute();
		}
		public function autoIncrement(){
			$this->sql = ('SELECT auto_increment FROM information_schema.tables WHERE table_name="objects"');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this->stmt ->fetchColumn();
		}
	}
?>