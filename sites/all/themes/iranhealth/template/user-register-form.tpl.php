<div class="row">
  <div class="col-md-12  wow fadeInUp">
    <div class="form-block">
     
      <div class="form-surround">
        <div class="block-header">
          <h2 class="title">فرم ثبت نام</h2>
          <div class="text">برای استفاده کامل از امکانات سایت فرم زیر را پر کنید و در سایت ثبت نام کنید.</div>
        </div><!-- /.block-header -->
        <h2><?php print render($intro_text); ?></h2>
        <?php
          print drupal_render_children($form);
        ?>
      </div><!-- /.form-surround -->
    </div>
  </div>
</div><!-- /.row -->