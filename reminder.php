<?php 
	$objects = new Objects;
	if(isset($_GET['id'])) $objects->id = $_GET['id'];
?> 
<div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
					<img src="<?php 
					if(isset($_GET['id'])) echo $objects->dataObject()['main_photo'];
					?>" class="img-fluid mb-4">
                    <h1>Offers</h1>
                  </div>
                  <p><?php if(isset($_GET['id'])) echo $objects->dataObject()['name'] ?></p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate" action="<?php echo $objects->actionLink('actionreminder');?>">
                    <div class="form-group">
                      <input id="email" type="email" name="reminderemail" required class="input-material">
                      <label for="email" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <button id="loginSubmit" type="submit" name="loginSubmit" class="btn btn-primary">Нагадати</button>
                    </div>					  
                    <!-- <a id="login" href="index.html" class="btn btn-primary">Увійти</a>
                    This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><small>Ще не зареєстровані? </small><a href="<?php echo $objects->buildLink('reg') ?>" class="signup">Реєстрація</a><br><small>Вже зареєстровані? </small><a href="<?php echo $objects->buildLink('login') ?>" class="signup">Увійти</a>
				  

<?php if(!empty($_GET['reminder']) && $_GET['reminder'] == 'success'):?>	
<p class="valid-feedback mt-2 d-block" style="color:rgba(121, 106, 238, 0.9);"> Пароль надіслано на вказаний Email! Перейдіть, будьласка, в свою пошту, та отримайте новий пароль. Якщо не отримали лист, перевірте папку спам.</p>
<?php endif; ?>	
				  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Developed by <a target="blank" href="https://www.facebook.com/nizhehorodtsev" class="external">Nizhegorodtsev</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>