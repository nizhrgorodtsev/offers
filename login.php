<?php 
	session_start();
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
                  <form method="post" class="form-validate" action="<?php echo $objects->actionLink('actionlogin');?>">
                    <div class="form-group">
                      <input id="register-email" type="email" name="register-email" required data-msg="Будь ласка, введіть дійсну адресу електронної пошти" class="input-material">
                      <label for="register-email" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input id="register-password" type="password" name="register-password" required data-msg="Будь ласка, введіть свій пароль" class="input-material">
                      <label for="register-password" class="label-material">Пароль</label>
					  </div>
                    <div class="form-group">
                      <button id="loginSubmit" type="submit" name="loginSubmit" class="btn btn-primary">Увійти</button>
                    </div>					  
                    <!-- <a id="login" href="index.html" class="btn btn-primary">Увійти</a>
                    This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="<?php echo $objects->buildLink('reminder') ?>" class="forgot-pass">Забули пароль?</a><br><small>Ще не зареєстровані? </small><a href="<?php echo $objects->buildLink('reg') ?>" class="signup">Реєстрація</a>


<?php if(!empty($_GET['confirm']) && $_GET['confirm'] == 'error'): ?>
<p class="invalid-feedback mt-2 d-block"> Помилка підтвердження! Будь ласка, здійсніть реєстрацію заново.</p>
<?php endif; ?>
<?php if(!empty($_GET['login']) && $_GET['login'] == 'error'): ?>
<p class="invalid-feedback mt-2 d-block"> Помилка авторизації! Невірний Email або пароль.</p>
<?php endif; ?>	
<?php if(!empty($_GET['login']) && $_GET['login'] == 'logoute') $_SESSION['id'] = null;?>					  
				  
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