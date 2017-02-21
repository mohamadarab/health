<div class="row" id="agahi">
	
	<div class="col-md-9 c-agahi">
		<div class="a-box a-header">
			<div class="a-title">
				<h5><?php print render($title); ?><i class="fa fa-cogs"></i></h5>
			</div>
			<a id="a-logo">
				<?php print render($content['field_logo']);?>
			</a>
			<div class="coverinfo text-right">
				<div class="a-slogan">
					<h6><?php print render($content['field_slogan']);?></a><i class="fa fa-comments"></i></h6>
				</div>
				<hr>
				<div class="a-tag">
					<h6><?php print render($content['field_tags']);?></a><i class="fa fa-tags"></i></h6>
				</div>
			</div> 
		</div>
		<div class="a-box a-about">
			<div class="a-title">
				<h5>درباره ما<i class="fa fa-pencil-square-o"></i></h5>
			</div>
			<?php print render($content['body']);?>
		</div>
		<div class="a-tab">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">اطلاعات تماس<i class="fa fa-phone"></i></a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">امکانات<i class="fa fa-cogs"></i></a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">دیدگاه ها<i class="fa fa-comments-o" ></i></a></li>
				
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
					<div class="a-box a-contatc">
			
			<div class="details">
				<span> <i class="fa fa-tags"></i>تلفن :<?php print render($content['field_tell']);?></span>
				<span> <i class="fa fa-mobile"></i>موبایل :<?php print render($content['field_mobile']);?></span>
				<span><i class="fa fa-envelope"></i>ایمیل :<?php print render($content['field_email']);?></span>
				<span><i class="fa fa-globe"></i>وب سایت :<?php print render($content['field_website']);?></span>
			</div>
		</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
				<div class="a-box a-service">
			
			<div class="details">
				<span> <i class="fa fa-check-square-o"></i>:<?php print render($content['field_cart']);?></span>
				<span> <i class="fa fa-check-square-o"></i><?php print render($content['field_park']);?></span>
				
			</div>
		</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="messages">
					<div class="a-box a-service">
						<?php print render($content['comments']); ?>
					</div>
				</div>
   
			</div>
		</div>
		
		
		
		
	</div>
	<div class="col-md-3 s-agahi">
		<a id="a-map" class="" rel="home" title="خانه" href="/health/">
				<img alt="خانه" src="http://localhost/health/sites/all/themes/iranhealth/images/a-map.png">
		</a>
		<div class="a-contact">
			<?php print views_embed_view('contact_form_user',"block"); ?>
		</div>
	</div>
	
</div>