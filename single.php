<?php get_header(); ?>
<!-- Start Post Section-->

<div class="main-post-img" style="background-image: url(<?php echo my_image_display();?>)">
	<div class="post-single-info">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	<h3 class="post-title"><a href="<?php the_permalink();?>" ><?php the_title(); ?></a></h3>
	<span class="post-author"><i class="material-icons">account_circle</i> <?php the_author_posts_link();?></span>
	<span class="post-date"><i class="material-icons">date_range</i> <?php the_date('F j, Y'); ?></span>
	<span class="post-comments"><i class="material-icons">chat_bubble_outline</i> <?php comments_popup_link('No Comments','1 Comment','% Comments','Disabled');?></span>
	</div>
</div>

<div class="container">
	<div class="row post-single-row">

		<div class="clear"></div>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
				<div class="col-sm-8">
					<?php 
						/* Get the Posts */
						if(have_posts()){
							while(have_posts()){
								
								the_post();
								?>
								<div class="post-main post-main-single">
									<div class="image-holder col-sm-12">
									<img class="img-responsive single-image" src="<?php echo my_image_display();?>">
									
									
									</div>
									<div class="details-holder col-sm-12">
									<div class="post-summery post-content"><?php the_content();?></div>
									<span class="post-label"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags('');?></span>
									</div>
									<div class="clear"></div>
									<hr>
									<div class="author-biography comment-content">
									<div class="comment-content col-sm-12">
										<div class="comment-avatar col-sm-2 col-xs-2">
											<?php echo get_avatar( $comment, 100 );?>
											<span class="posts-published">
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
													<?php the_author_posts() ;echo ' Posts published'; ?>
												</a>
											</span>
										</div>
										<div class="comment-details col-sm-10 col-xs-10">
											<h4>
												<a class="author-prof-link" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ),'');?>">
												<?php the_author_meta('first_name');echo ' ' ; the_author_meta('last_name');?>
													
												</a>
											</h4>
											<span><?php the_author_meta('nickname');?></span>
											<?php 
												$author_bio = (!empty(get_the_author_meta('description'))) ? the_author_meta('description') : 'No Author Description';

											?>
											<p><?php echo $author_bio;?></p>
										</div>
									</div>	
									</div>
									<div class="clear"></div>

									<hr>
									<div id="comments" class="title-lines">
										<h3>COMMENTS (<?php comments_number('0','1','%');?>)
											<span></span>
											<span></span>
											<span></span>
										</h3>
									</div>
									<div class="no-comment-found">
										<?php if(get_comments_number() == 0){
											echo 'No Comment yet';
										}

										?>

									</div>
									<?php comments_template();?>
								</div>

								<?php
							}
						}
					?>	

				</div>
				<div class="col-sm-4">
					<div class="side-bar side-bar-single title-lines">
						<h3>Categories
							<span></span>
							<span></span>
							<span></span>
						</h3>
						<?php 
								$categories = get_categories( array(
								    'orderby' => 'name',
								    'order'   => 'ASC'
											) );
								foreach ($categories as $category) {
									
									?>
									<li><a href="#"><?php echo $category->name; echo '<span class="pull-right">' . $category->count . '</span>'?></a></li>
									<?php }; ?>

					</div>

				</div>
		</div>

</div>
<div class="clear"></div>

<!-- End Posts Section-->



<?php get_footer();?>