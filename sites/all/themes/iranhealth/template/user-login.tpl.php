<div class="row ">
  <div class="col-md-6 col-md-offset-3 wow fadeInUp">
    <div class="form-block">
      <img class="img-circle form-icon" src="<?php print base_path() . drupal_get_path('theme', 'iranhealth'). '/images/'; ?>icon-118.png">
      <div class="form-surround">
        
		 <ul class="tab-group" role="tablist">
			<li role="presentation" class="tab active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">ورود</a></li>
			<li role="presentation" class="tab" ><a href="#register" aria-controls="profile" role="tab" data-toggle="tab">ثبت نام</a></li>
		</ul>
		
		<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="login">
        <h2><?php print render($intro_text); ?></h2>
         <?php
				if(user_is_anonymous()) {  
					$form = drupal_get_form('user_login_block');
						print drupal_render($form);
				}
			?>
        <a class="simple-link" href="<?php print base_path(); ?>user/password"><span class="fa fa-chevron-circle-left"></span>رمز عبور خود را فراموش کرده اید؟</a>
        <br>
        
      </div>
	   <div role="tabpanel" class="tab-pane fade" id="register">
			<?php
				if(user_is_anonymous()) {  
					$form = drupal_get_form('user_register_form');
						print drupal_render($form);
				}
			?>

	   </div>
      </div>
      </div><!-- /.form-surround -->
    </div>
  </div>
</div><!-- /.row -->
