<?php get_header();?>
	<?php $upload_dir = wp_upload_dir();?> 
	<div class="profile-header" style="background-image: url(<?php echo $upload_dir['url'] . '/mon.jpeg';?>) ">
		<div class="profile-information-cover">
			<div class="container">
		
				<div class="profile-information">
						<?php echo get_avatar(get_the_author_meta('ID'),100,'','User avatar','')?>
						<div class="profile-name">
						<h2><?php the_author_meta('first_name');echo ' ' ; the_author_meta('last_name');?></h2>
						<span>@ <?php echo get_the_author_meta( 'user_nicename')?></span>
						<div class="post-social">
							<span><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
							<span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
							<span><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></span>
						</div>
						</div>
						<div class="clear"></div>
						<hr>
						<div class="profile-states">
							<ul>
								<?php 
									$args = array(
											'user_id' => get_the_author_meta('ID'),
											'count' => true,
										)
								?>
								<li><?php the_author_posts()?> <span>Posts</span></li>
								<li>22k <span>Reputation</span></li>
								<li>157 <span>Shares</span></li>
								<li><?php echo get_comments( $args );?> <span>Comments</span></li>
								<li>122 <span>Invites</span></li>
							</ul>

						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<span class="lastest">Latest</span>
	</div>
	<div class="container author-posts">
		<?php 
			//Custom Query
			$author_posts_args = array(
				'author' => get_the_author_meta('ID'), 
				'posts_per_page' => 8

				);
			$author_posts = new WP_Query($author_posts_args);

		?>

		<!-- Image card -->
		<?php
		if($author_posts->have_posts()){
							while($author_posts->have_posts()){
								$author_posts->the_post();
		?>
			<div class="demo-card-image mdl-card mdl-shadow--2dp" style="background: url(<?php echo my_image_display(); ?>) center / cover;">
			  <div class="author-post-hover-details">
			  		<h3><a href="<?php the_permalink();?>" ><?php the_title(); ?></a></h3>
			  		<p><?php the_excerpt(); ?></p>
			  </div>
			  <div class="mdl-card__title mdl-card--expand"></div>
			  <div class="mdl-card__actions">
			    <div class="demo-card-image__filename">
			    	<?php echo get_avatar(get_the_author_meta('ID'),100,'','User avatar','')?>
			    	<span><?php the_author_meta('first_name') ?></span>
			    	<span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
			    </div>
			  </div>
			</div>
		<?php 
			}
		}
		wp_reset_postdata();
		?>
			


	</div>
	


<?php get_footer();?>