<!-- Dashboard Counts Section-->			
<?php if(!empty($objects->dataobject())): ?>
<section class="dashboard-counts no-padding-bottom">
	<div class="container-fluid">
		
		<div class="row bg-white has-shadow">
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fa fa-superscript"></i></div>
                    <div class="title"><span>Загальна<br>Площа</span>
						
					</div>
                    <div class="number"><strong><?php echo $objects->dataObject()['total_area'] ?></strong></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fa fa-superscript"></i></div>
                    <div class="title"><span>Житлова<br>Площа</span>
						
					</div>
                    <div class="number"><strong><?php echo $objects->dataObject()['living_area'] ?></strong></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fa fa-superscript"></i></div>
                    <div class="title"><span>Площа<br>кухні</span>
						
					</div>
                    <div class="number"><strong><?php echo $objects->dataObject()['kitchen_area'] ?></strong></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-xl-3 col-sm-6">
				<div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-grid"></i></div>
                    <div class="title"><span>Кількість<br>Кімнат</span>
						
					</div>
                    <div class="number"><strong><?php echo $objects->dataObject()['rooms'] ?></strong></div>
				</div>
			</div>
		</div>
		
	</div>
</section>
<!-- Dashboard Header Section    -->
<section class="dashboard-header">
	<div class="container-fluid">
		<div class="row">
			<!-- Statistics -->
			<div class="statistics col-lg-3 col-12">
				
				<?php if(!empty($objects->dataobject()['type'])): ?>
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red"><i class="fa fa-home"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['type']; ?></strong><br><small>тип житла</small></div>
				</div>					
				<?php endif; ?>
				
				<?php if(!empty($objects->dataobject()['wall'])): ?>	
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-wrench"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['wall']; ?></strong><br><small>тип стін</small></div>
				</div>					
				<?php endif; ?>
				
				<?php if(!empty($objects->dataobject()['floors'])): ?>	
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-orange"><i class="fa fa-building"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['floors']; ?></strong><br><small>поверховість</small></div>
				</div>				
				<?php endif; ?>
				
				<?php if(!empty($objects->dataobject()['floor'])): ?>	
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-blue"><i class="fa fa-building"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['floor']; ?></strong><br><small>поверх</small></div>
				</div>				
				<?php endif; ?>
				
				<?php if(!empty($objects->dataobject()['land_area'])): ?>	
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-yellow"><i class="fa fa-area-chart"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['land_area']; ?></strong> сот.<br><small>земельна ділянка</small></div>
				</div>	
				<?php endif; ?>
				
				<?php if(!empty($objects->dataobject()['year'])): ?>	
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-gray"><i class="fa fa-calendar"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['year']; ?></strong> р.<br><small>рік побудови</small></div>
				</div>				
				<?php endif; ?>
				
				<?php if(!empty($objects->dataobject()['decoration'])): ?>	
				<div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-violet"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
                    <div class="text"><strong><?php echo  $objects->dataobject()['decoration']; ?></strong><br><small>стан ремонту</small></div>
				</div>				
				<?php endif; ?>				
				
			</div>
			<!-- Line Chart            -->
			
			<div class="chart col-lg-9 col-12">
				<div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <div id="example5" class="slider-pro">
						<div class="sp-slides">
							<?php $slides = explode(";", $objects->dataobject()['slider']);?>
							<?php foreach($slides as $key=>$value): ?>
							<div class="sp-slide">
								<img class="sp-image" src="<?php echo $value ?>">
							</div>
							<?php endforeach; ?>	
						</div>
						<div class="sp-thumbnails">
							
							<?php foreach($slides as $key=>$value): ?>
							<div class="sp-thumbnail">
								<div class="sp-thumbnail-image-container">
									<img class="sp-thumbnail-image" src="<?php echo $value ?>"/>
								</div>
							</div>
							<?php endforeach; ?>		
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- Projects Section-->
<section class="projects no-padding-top no-padding-bottom">
	<div class="container-fluid">
		<?php if(!empty($objects->dataObject()['sale_status'])): ?>
		<!-- Project-->			  
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Статус об'єкта</h3><small>можливі варіанти: продаж триває / продано</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['sale_status']; ?></h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>			  
		<?php endif; ?>
		
		<?php if(!empty($objects->dataObject()['start_price'])): ?>
		<!-- Project-->
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Стартова ціна</h3><small>мінімальна ціна, за яку власник готовий продати об'єкт</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['start_price']; ?> $</h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if(!empty($objects->dataObject()['current_price'])): ?>			  
		<!-- Project-->
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Поточна ціна</h3><small>найвища ціна. яку запропонували покупці</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['current_price']; ?> $</h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if(!empty($objects->dataObject()['hot_price'])): ?>			  
		<!-- Project-->
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Ціна викупу зараз</h3><small>ціна викупу, та дострокового припинення торгів .</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['hot_price']; ?> $</h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if(!empty($objects->dataObject()['date_off'])): ?>			  			  
		<!-- Project-->
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Дата продажу</h3><small>дата продажу об'єкту по найвищій запропонованій ціні</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['date_off']; ?></h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if(!empty($objects->dataObject()['users'])): ?>			  			  			  
		<!-- Project-->
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Кількість учасників</h3><small>кількість зареєстровагих користувачів що беруть участь у торгах</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['users']; ?></h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<!-- Project-->
		<?php if(!empty($objects->dataObject()['updating'])): ?>			  			  			  			  
		<div class="project">
			<div class="row bg-white has-shadow">
				<div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
						<div class="text">
							<h3 class="h4">Дата оновлення</h3><small>Дата, коли відбулась остання зміна інформації щодо об'єкту</small>
						</div>
					</div>
				</div>
				<div class="right-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-progress">
						<div class="text">
							<h3 class="h5"><?php echo $objects->dataObject()['updating']; ?></h3><small></small>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>	
		
		<!-- Inline Form-->
		<div class="card">
			<div class="card-header d-flex align-items-center">
				<h3 class="h4">Зробити пропозицію</h3>
			</div>
			<div class="card-body">
				<form name="offer" action="<?php echo $objects->actionLink('checkPrice'); ?>">
					<div class="form-group">
						<label for="price" class="form-control-label">Вкажіть ціну, яку ви готові заплатити</label>					
						<input id="price" type="text" name="price" class="mr-3 form-control" required pattern="[0-9]+" title="Тільки цифри">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Підтвердити</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- Client Section-->
<section class="client no-padding-top">
	<div class="container-fluid">
		<div class="row">
			<!-- Work Amount  -->
			
			<!-- Client Profile -->
			<div class="col-lg-6">
				<div class="client card">
					
                    <div class="card-body text-center">
						<div class="client-avatar"><img src="img/avatar-8.jpg" alt="..." class="img-fluid rounded-circle">
							<div class="status bg-green"></div>
						</div>
						<div class="client-title">
							<h3>Ігор Гойда</h3><span>Директор<br>(096) 384 43 22</span>
						</div>
					</div>
				</div>
			</div>
			<!-- Client Profile -->
			<div class="col-lg-6">
				<div class="client card">
					
                    <div class="card-body text-center">
						<div class="client-avatar"><img src="img/avatar-7.jpg" alt="..." class="img-fluid rounded-circle">
							<div class="status bg-green"></div>
						</div>
						<div class="client-title">
							<h3>Вікторія Шевчук</h3><span>Адміністратор<br>(097) 988-51-54</span>
						</div>
					</div>
				</div>
			</div>				
			<!-- Total Overdue             -->
		</div>
	</div>
</section>
<?php endif; ?>