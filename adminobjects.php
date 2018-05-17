<?php if($users->getDataUser()['access_level'] == 'admin'):?>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">  
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Назва</th>
						<th>Посилання</th>
						<th>Статус</th>
						<th>Стартова</th>
						<th>Поточна</th>
						<th>Продаж</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<div class="mb-3">
						<form action="" method="get">
							<input type="hidden" name="id" value="<?php echo $objects->autoIncrement(); ?>">
							<input type="hidden" name="page" value="offer">
							<input type="hidden" name="content" value="addobject">
							<button class="btn btn-info">Додати <i class="fa fa-plus" aria-hidden="true"></i></button>
						</form>
					</div>
					<?php foreach($objects->allObject() as $value): ?>
					<tr>
						<!--<div class="mb-3"><img src="<?php// echo $objects->dataObject()['main_photo'] ?>" alt="" class="avatar"></div>-->
						<td><?php echo $value['id']; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $_SERVER['SERVER_NAME'] . "/?id=" . $value['id']; ?></td>

						<td><?php echo $value['sale_status']; ?></td>
						<td><?php echo $value['start_price']; ?> $</td>
						<td><?php echo $value['current_price']; ?> $</td>
						<td><?php echo $value['date_off']; ?></td>						
						<td>
							<form action="" method="get">
								<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
								<input type="hidden" name="page" value="offer">
								<button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button>
							</form>
						</td>
						<td>
							<form method="get" action="">
								<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
								<input type="hidden" name="page" value="offer">
								<input type="hidden" name="content" value="editobject">
								<button class="btn btn-primary">Редагувати</button>
							</form>
						</td>						

						<td><button class="btn btn-danger">Видалити</button></td>
					</tr>				
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php else: ?>
<?php 
	$link = 'page404/' . $objects->actionLink('index');
	header('Location: ' . $link);
?>
<?php endif; ?>