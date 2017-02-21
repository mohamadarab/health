<div class="blog-post n-blog">
					<div class="meta-data">
						<div class="meta-data-item">
							<i class="fa fa-calendar-o"></i>
							<a><?php print render($date); ?></a>
							<div class="meta-divider">
							</div>
						</div>
						<div class="meta-data-item">
							<i class="fa fa-user"></i>
							<a>نویسنده<?php print render($name); ?></a>
							<div class="meta-divider">
							</div>
						</div>
						<div class="meta-data-item">
							<i class="fa fa-comments"></i>
							<a>دیدگاه <?php print render($comment_count); ?></a>
							<div class="meta-divider">
							</div>
						</div>
						<div class="meta-data-item">
							<i class="fa fa-tags"></i>
							<a><?php print render($content['field_tags']);?></a>
							<div class="meta-divider">
							</div>
						</div>
					</div>
					<div class="post-content">
						<div class="featured-image">
							<?php print render($content['field_image']);?>
						</div>
						<h2 class="text-right"><?php print render($title); ?></h2>
						<div class='first-paragraph'>
							<?php print render($content['body']);?>
						</div>
					</div>
				</div>
				
	<div class="comments-section">			
		<?php print render($content['comments']); ?>
</div>