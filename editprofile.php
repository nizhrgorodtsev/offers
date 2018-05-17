<div class="card-body">
	<div class="table-responsive"> 
		<div class="form-group clearfix" id="miniimg">
			<img src="<?php echo $_POST['avatar'] ?>" alt="" id="avatar" class="float-left avatar">
			<label for="userfile">Змінити фото:</label><br>
			<input type="file" id="file" name="userfile" onchange="uploadAvatar()">
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Ім'я</th>
					<th>Email</th>
					<th>Телефон</th>
					<th data-id="<?php echo $_POST['id']; ?>"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<input name="name" required class="form-control" type="text" value="<?php echo $_POST['name']; ?>">
					</td>
					<td>
						<input name="email" required readonly class="form-control" type="text" value="<?php echo $_POST['email']; ?>">
					</td>
					<td>
						<input name="phone" required class="form-control" type="text" value="<?php echo $_POST['phone']; ?>">
					</td>
					<td>
						<button id="save" class="btn btn-primary" onclick="updateProfile()">Зберегти</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>