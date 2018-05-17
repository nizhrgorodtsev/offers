<?php if($users->getDataUser()['access_level'] == 'admin'):?>
<?php $objects->type= $objects->dataObject()['type'];?>
<?php $objects->status= $objects->dataObject()['sale_status'];?>
<div class="card forms">
	<div class="card-header d-flex align-items-center">
		<h3 class="h4" data-objectid="<?php echo $objects->dataObject()['id']; ?>"><?php echo $objects->dataObject()['name']; ?></h3>
	</div>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo $objects->actionLink('actionsaveobject'); ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Назва <span>*</span></label>
				
				<div class="col-sm-9">
					<input type="text" name="name" required class="form-control" value="<?php echo $objects->dataObject()['name']; ?>">
					<small class="help-block-none">Наприклад: "3-кімнатна квартира, м. Рівне вул. Чорновола"</small>
				</div>
			</div>
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Тип об'єкту <span>*</span></label>
				<div class="col-sm-9  select">
					<select multiple="" name="type" required class="form-control" size="3">
						<?php 
							$objects->selectedType($type = array('Квартира', 'Будинок', 'Котедж')); 
						?>
						<!--<option value="Квартира">Квартира</option>
							<option value="Будинок">Будинок</option>
						<option value="Котедж">Котедж</option>-->
					</select>
				</div>
			</div>		
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Площа <span>*</span></label>
				<div class="col-sm-9">
					<div class="row">
						<div class="col-md-3">
							<input type="text" name="total_area" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['total_area']; ?>">
							<small class="help-block-none">Загальна площа <span>*</span></small>
						</div>
						<div class="col-md-3">
							<input type="text" name="living_area" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['living_area']; ?>">
							<small class="help-block-none">Житлова площа <span>*</span></small>
						</div>
						<div class="col-md-3">
							<input type="text" name="kitchen_area" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['kitchen_area']; ?>">
							<small class="help-block-none">Площа кухні <span>*</span></small>
						</div>
						<div class="col-md-3">
							<input type="text" name="land_area" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['land_area']; ?>">
							<small class="help-block-none">Площа ділянки</small>
						</div>							
					</div>
				</div>
			</div>
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Характеристики</label>
				<div class="col-sm-9">
					<div class="row">
						<div class="col-md-4">
							<input type="text" name="wall" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['wall']; ?>">
							<small class="help-block-none">Тип стін </small>
						</div>
						<div class="col-md-4">
							<input type="text" name="decoration" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['decoration']; ?>">
							<small class="help-block-none">Стан ремонту </small>
						</div>
						<div class="col-md-4">
							<input type="date" name="year" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['year']; ?>">
							<small class="help-block-none">Дата будівниуцтва </small>
						</div>					
					</div>
					<div class="row mt-3">
						<div class="col-md-2">
							<input type="number" name="floor" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['floor']; ?>">
							<small class="help-block-none">Поверх</small>
						</div>	
						<div class="col-md-2">
							<input type="number" name="floors" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['floors']; ?>">
							<small class="help-block-none">Поверховість</small>
						</div>
						<div class="col-md-2">
							<input type="number" name="rooms" placeholder="" class="form-control" value="<?php echo $objects->dataObject()['rooms']; ?>">
							<small class="help-block-none">Кількість кімнат <span>*</span></small>
						</div>						
					</div>
				</div>
			</div>
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Статус об'єкта <span>*</span></label>
				<div class="col-sm-9  select">
					<select multiple="" required name="sale_status" class="form-control" size="2">
						<?php 
							$objects->selectedStatus($type = array('Продаж триває', 'Продано')); 
						?>
						<!--<option>Продаж триває</option>
						<option>Продаж зупинено</option>-->
					</select>
				</div>
			</div>
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Ціна і дата продажу<span>*</span></label>
				<div class="col-sm-9">
					<div class="row">
						<div class="col-md-3">
							<input type="text" name="start_price" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['start_price']; ?>">
							<small class="help-block-none">Стартова ціна <span>*</span></small>
						</div>
						<div class="col-md-3">
							<input type="text" name="current_price" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['current_price']; ?>">
							<small class="help-block-none">Поточна ціна <span>*</span></small>
						</div>
						<div class="col-md-3">
							<input type="text" name="hot_price" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['hot_price']; ?>">
							<small class="help-block-none">Ціна викупу <span>*</span></small>
						</div>
						<div class="col-md-3">
							<input type="date" name="date_off" required placeholder="" class="form-control" value="<?php echo $objects->dataObject()['date_off']; ?>">
							<small class="help-block-none">Дата продажу <span>*</span></small>
						</div>							
					</div>
				</div>
			</div>	
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Головне фото <span>*</span></label>
				<div class="col-sm-9">
					<input type="file" name="main_photo"  accept=".txt,image/*" class="d-none">
					<button class="btn btn-success" id="clon_main_photo"><i class="fa fa-file-image-o" aria-hidden="true"></i>  Вибрати фото </button>
					<span id="selected_main_photo" class="pl-3 pr-5">Фото не вибрано</span>
					<button class="btn btn-info" id="mainphoto"><i class="fa fa-download" aria-hidden="true"></i>  Завантажити </button>
					<div class="row ajax-main-photo mt-5">
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 mb-3"><img class="img-fluid" src="<?php echo $objects->dataObject()['main_photo']; ?>"></div>
					</div>
				</div>
			</div>			
			
			<div class="line"></div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label">Слайдер <span>*</span></label>
				<div class="col-sm-9">
					<input type="file" name="slider" multiple="multiple" accept=".txt,image/*" class="d-none">
					<button class="btn btn-success" id="clon_slider"><i class="fa fa-file-image-o" aria-hidden="true"></i>  Вибрати фото </button>
					<span id="selected_slider" class="pl-3 pr-5">Фото не вибрано</span>
					<button class="btn btn-info" id="sliderupload"><i class="fa fa-download" aria-hidden="true"></i>  Завантажити </button>
					<div class="row ajax-reply mt-5">
						<?php $slides = explode(";", $objects->dataobject()['slider']);?>
						<?php foreach($slides as $key=>$value): ?>
							<div class="col-sm-2 mb-3"><img class="img-fluid" src="<?php echo $value; ?>"></div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			
			<div class="form-group row">
				<div class="col-sm-4 offset-sm-3 mt-3">
					<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Зберегти</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php else: ?>
<?php 
	$link = 'page404/' . $objects->actionLink('index');
	header('Location: ' . $link);
?>
<?php endif; ?>