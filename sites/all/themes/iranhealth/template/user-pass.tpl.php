<div class="row">
  <div class="col-md-6 col-md-offset-3 wow fadeInUp">
    <div class="form-block">
      <img class="img-circle form-icon" src="<?php print base_path() . drupal_get_path('theme', 'iranhealth'). '/images/'; ?>icon-118.png" alt="">
      <div class="form-surround">
        <div class="block-header">
          <h2 class="title">یادآوری رمز عبور</h2>
          <div class="text">با وارد کردن نام کاربری یا ایمیل ، رمز جدید خود را دریافت کنید.</div>
        </div><!-- /.block-header -->
        <h2><?php print render($intro_text); ?></h2>
        <?php
          print drupal_render_children($form);
        ?>
      </div><!-- /.form-surround -->
    </div>
  </div>
</div><!-- /.row -->
