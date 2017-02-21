<div class="blog-page">
<header>
<div id="top-strip">
	<div class="container">
		<ul class="pull-left social-icons">
			<?php print render($page['social']); ?>	
		</ul>
		<div id="login-box" class='pull-right'>
			<?php print render($page['login-menu']); ?>	
		</div>
	</div>
</div>
</header>
<!-- /Header -->
<div class="slider-section">
	<div id="premium-bar">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<?php if ($logo): ?>
						<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="navbar-brand" id="logo">
							<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
						</a>
					<?php endif; ?>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php print render($page['menu']); ?>	
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
			</nav>
		</div>
	</div>
	<!-- head-Section -->
	<div class="page-title-section">
		<div class="container">
			<div class="pull-right page-title">
				<a href="#">
				<h2><?php print $title; ?></h2>
				</a>
			</div>
			
		</div>
	</div>
</div>
<!-- content-Section -->
<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 blog-sidebar">
				<div class="sidebar-widget search-widget">
					<h4 class="widget-title text-right">جستجو</h4>
					<?php print render($page['search']); ?>	
				</div>
				
				
				<div class="sidebar-widget text-widget">
					<h4 class="widget-title text-right">توضیحات</h4>
					<p class='first-paragraph'>
					<?php print render($page['text']); ?>	
					</p>
				</div>
			</div>
		
		
			<div class="col-md-8 faq-content">
			
				<?php if (!empty($page['highlighted'])): ?>
						<div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
					<?php endif; ?>
					<a id="main-content"></a>
					<?php print render($title_prefix); ?>
						<?php if (!empty($title) && !drupal_is_front_page()): ?>
			
					<?php endif; ?>
						<?php print render($title_suffix); ?>
						<?php print $messages; ?>
						<?php if (!empty($tabs)): ?>
						<?php print render($tabs); ?>
					<?php endif; ?>
					<?php if (!empty($page['help'])): ?>
					<?php print render($page['help']); ?>
					<?php endif; ?>
					<?php if (!empty($action_links)): ?>
					<ul class="action-links"><?php print render($action_links); ?></ul>
					<?php endif; ?>
					<?php print render($page['content']); ?>
				
			</div>
		
		</div>
		
	</div>
</div>
<!-- footer-section -->
<footer>
<div class="container">
	<div class="col-md-3 footer-about">
		<?php if ($logo): ?>
			<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class=" logo" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			</a>
		<?php endif; ?>
		<?php print render($page['about']); ?>
	</div>
	<div class="col-md-3 footer-recent-posts">
		<h3 class='footer-title'>لینک های مفید</h3>
		<ul>
			<?php print render($page['link']); ?>
			
		</ul>
	</div>
	<div class="col-md-3 footer-contact-info">
	<h3 class='footer-title'>اطلاعات تماس</h3>
		<?php print render($page['contact']); ?>
	</div>
	<div class="col-md-3 footer-newsletter">
		<h3 class='footer-title'>خبرنامه</h3>
			<?php print render($page['newsletter']); ?>
	</div>
</div>
</footer>
<div class="bottom-strip">
	<div class="container">
		<div class="col-md-4">
			<ul class="social-icons">
				<?php print render($page['social']); ?>	
			</ul>
		</div>
		<div class="col-md-4 bottom-strip-middle">
			<a href="#top" class='fa fa-arrow-circle-up' id='backtop-btn'></a>
		</div>
		
		<div class="col-md-4">
			<p class='pull-left'>
				  تمام حقوق سایت برای مجموعه ایران هلث محفوظ می باشد.©
			</p>
		</div>
	</div>
</div>
