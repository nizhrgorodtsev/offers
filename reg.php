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
                  <form id="reg" class="form-validate" method="post" action="<?php echo $objects->actionLink('actionreg'); ?>">
                    <div class="form-group">
                      <input id="register-username" type="text" name="registerUsername" required data-msg="Будь ласка, вкажіть Ваше ім'я" class="input-material">
                      <label for="register-username" class="label-material">Ваше ім'я</label>
                    </div>
                    <div class="form-group">
                      <input id="email" type="email" name="email" required data-msgdfg="Будь ласка, введіть дійсну адресу електронної пошти" class="input-material">
                      <label for="email" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input id="phone" type="tel" name="phone" required data-msg="Будь ласка, вкажіть телефон для зв'язку" class="input-material">
                      <label for="phone" class="label-material">Телефон</label>
                    </div>					
                    <div class="form-group">
                      <input id="register-password" type="password" name="registerPassword" required data-msg="Будь ласка, введіть свій пароль" class="input-material">
                      <label for="register-password" class="label-material">Пароль        </label>
                    </div>
                    <div class="form-group terms-conditions">
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Ваша згода обов'язкова" class="checkbox-template">
                      <label for="register-agree">Погодьтесь з умовами та політикою</label>
                    </div>
                    <div class="form-group">
                      <button id="regidter" type="submit" name="registerSubmit" class="btn btn-primary">Зареєструватися</button>
                    </div>
                  </form><a href="<?php echo $objects->buildLink('reminder') ?>" class="forgot-pass">Забули пароль?</a><br><small>Вже зареєстровані? </small><a href="<?php echo $objects->buildLink('login') ?>" class="signup">Увійти</a>
<?php if(!empty($_GET['reg']) && $_GET['reg'] == 'success'):?>	
<p class="valid-feedback mt-2 d-block" style="color:rgba(121, 106, 238, 0.9);"> Дякуємо за реєстрацію! Перейдіть, будьласка, в свою пошту, та підтвердіть ваш Email. Якщо не отримали лист, перевірте папку спам.</p>
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