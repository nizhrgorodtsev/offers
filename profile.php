<div class="card">
	<div class="card-body">
		<div class="table-responsive">  
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Ім'я</th>
						<th>Email</th>
						<th>Телефон</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<div class="mb-3"><img id="avatar" src="<?php echo $users->getDataUser()['avatar'] ?>" alt="" class="avatar"></div>
						<td><input name="name" type="text" readonly class="form-control" value="<?php echo $users->getDataUser()['name']; ?>"></td>
						<td><input name="email" type="text" readonly class="form-control" value="<?php echo $users->getDataUser()['email']; ?>"></td>
						<td>
							<input name="phone" type="text" readonly class="form-control" value="<?php echo $users->getDataUser()['phone']; ?>">
							<input type="hidden" name="id" value="<?php echo $users->id; ?>">
						</td>
						<td><button onclick="editProfile()" class="btn btn-primary">Редагувати</button></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editProfile() {
		var id = $("input[name=id]").val();
		var name = $("input[name=name]").val();
		var email = $("input[name=email]").val();
		var phone = $("input[name=phone]").val();
		var avatar = $("#avatar").attr('src');
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementsByClassName("card")[0].innerHTML = this.responseText;
			}
		};
		xhttp.open("POST", "editprofile.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("name=" + name + "&email=" + email + "&phone=" + phone + "&avatar=" + avatar + "&id=" + id);
	}
</script>
<script>
	function uploadAvatar(){
		var id = $("[data-id]").attr('data-id');
		var file = document.getElementById("file");
		var upload_file=file.files[0];
		var form=new FormData();
		form.append("userfile",upload_file);
		form.append("id",id);
		
		var xhr=new XMLHttpRequest();
		xhr.open("POST", "avatarupload.php", true);
		xhr.send(form);
		
		xhr.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				var node = document.createElement("IMG");
				node.setAttribute("src", xhr.responseText);
				node.setAttribute("id", "avatar");
				node.setAttribute("class", 'float-left avatar');
				var list = document.getElementById("miniimg");
				list.removeChild(list.childNodes[1]);
				list.insertBefore(node, list.childNodes[1]);
			}
		}
	}
</script>
<script>
	function updateProfile() {
		var id = $("[data-id]").attr('data-id');
		var name = $("input[name=name]").val();
		var phone = $("input[name=phone]").val();
		var avatar = $("#avatar").attr('src');
		var xhttp = new XMLHttpRequest();
		
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
			}
		};
		
		xhttp.open("POST", "updateprofile.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("name=" + name + "&phone=" + phone + "&avatar=" + avatar + "&id=" + id);
		
	}
</script>