<?php if($users->getDataUser()['access_level'] == 'admin'):?>
<?php 
	$offers=new Offers;
?>
<div class="card">
	<div class="card-body">
		<div class="table-responsive">  
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Ім'я</th>
						<th>Телефон</th>
						<th>Дата</th>
						<th>Об'єкт</th>
						<th>offer</th>
						<th>Статус</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($offers->allOffers() as $value): ?>
					<tr>
						<td><?php echo $value['user_name']; ?></td>
						<td><?php echo $value['user_phone']; ?> </td>
						<td><?php echo $value['date_']; ?></td>
						<td><?php echo $value['object_name']; ?></td>
						<td><?php echo $value['user_offer']; ?> $</td>
						<td><?php if($value['status']=='1') echo "Активовано"; else echo "Не активоано"; ?> </td>
						<td><?php if($value['status']!='1'): ?><button class="btn btn-primary">Активувати</button><?php endif; ?></td>
						<td>
							<form action="<?php echo $objects->actionLink('deleteoffer'); ?>" method="post">
								<input type="hidden" name="offerid" value="<?php echo $value['id']; ?>">
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