<?php 
	class Fileupload{
		public $dir;
		public $name;
		public $tmp_name;
		public $src;
		public $type;
		
		public function fileUpload(){
			$this -> dir = 'img/upload/avatar/';
			$this -> src = $this -> dir . $_POST['id'] . "_" . $this->name;
			move_uploaded_file($this->tmp_name, $this -> src);
		}
		
		public function resize(){
			list($width, $height) = getimagesize($this -> tmp_name);
			if($height > 100){
				$c = $height / 100;
				$new_width = $width / $c;
				$new_height = $height / $c;	
				
				$image_p = imagecreatetruecolor($new_width, $new_height);
				
				if ($this->type == 'image/jpeg')
				$image = imagecreatefromjpeg($this -> tmp_name);
				elseif ($this->type == 'image/png')
				$image = imagecreatefrompng($this -> tmp_name);
				elseif ($this->type == 'image/gif')
				$image = imagecreatefromgif($this -> tmp_name);
				
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
				imagejpeg($image_p, $this -> tmp_name, 100);
			}			
		}
	}
	$file = new Fileupload; 
	
	if(!empty($_FILES['userfile'])){
		$file->type = $_FILES['userfile']['type'];
		$file -> name = $_FILES['userfile']['name'];
		$file -> tmp_name = $_FILES['userfile']['tmp_name'];
		
		if($file->type == "image/jpeg" || $file->type == "image/gif" || $file->type == "image/png"){
		$file -> resize();
		$file -> fileUpload();
		echo $file->src;
		}
		 
		
	}
?>

