<?php if($users->getDataUser()['access_level'] == 'admin'):?>

<div class="card">
	<div class="card-body">
		<div class="table-responsive">  
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ім'я</th>
						<th>Email</th>
						<th>Телефон</th>
						<th>Статус</th>
						<th>Реэстрація</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users->allUsers() as $value): ?>
					<tr>
						<!--<div class="mb-3"><img src="<?php// echo $objects->dataObject()['main_photo'] ?>" alt="" class="avatar"></div>-->
						<td><?php echo $value['id']; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['phone']; ?> </td>
						<td><?php if($value['status']=='1') echo "Активовано"; else echo "Не активоано"; ?> </td>
						<td><?php echo $value['date_']; ?></td>
						<td>
							<form action="<?php echo $objects->actionLink('deleteuser') ?>" method="post">
								<input type="hidden" name="userid" value="<?php echo $value['id']; ?>">
								<button type="submit" class="btn btn-danger">Видалити</button>
							</form>
						</td>
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