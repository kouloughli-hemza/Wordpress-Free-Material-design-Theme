<?php get_header();?>
<!-- Start Post Section-->


	<?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3, // Number of recent posts thumbnails to display
        'post_status' => 'publish' // Show only the published posts
    ));
    ?>
    
       
<!-- Start Slider -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php
  	 foreach ($recent_posts as $post) {

  		echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
  	}
  	?>
 </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  <?php 
  	$i = 0;
  	foreach($recent_posts as $post) : 
		$i++;
		$active = '';
	  	if($i == count($recent_posts)){
	  		$active = 'active';
	  	}
  	?>
    <div class="item <?php echo $active;?>">
      <?php echo get_the_post_thumbnail($post['ID'], 'full'); ?>
      <div class="carousel-caption">
        <h3><?php echo $post['post_title'] ?></h3>
        <span><a class="post-date call-to-action" href="<?php the_permalink($post['ID']);?>">Continue reading</a></span>
      </div>
    </div>
    <?php  ; endforeach; wp_reset_query(); ?>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--  End The  slider -->
<div class="container">
	<div class="row">

		<div class="clear"></div>
				<div class="col-sm-8">
					<?php 
						/* Get the Posts */
						if(have_posts()){
							while(have_posts()){
								the_post();
								
								?>
								<!-- Start the posts lISTING -->
								<div class="post-main">
									<div class="image-holder col-sm-4">
									<img class="img-responsive main-page-image" src="<?php echo my_image_display();?>">									
									</div>
									<div class="details-holder col-sm-8">
									<span class="post-label"><i class="material-icons">label_outline</i> <?php the_category(' , ');?></span>
									<h3 class="post-title"><a href="<?php the_permalink();?>" ><?php the_title(); ?></a></h3>
									<span class="post-author"><i class="material-icons">account_circle</i> <?php the_author_posts_link();?></span>
									<span class="post-date"><i class="material-icons">date_range</i> <?php the_date('F j, Y'); ?></span>
									<span class="post-comments"><i class="material-icons">chat_bubble_outline</i> <?php comments_popup_link('No Comments','1 Comment','% Comments','Disabled');?></span>
									<p class="post-summery"><?php the_excerpt();?></p>
									<span class="read-more"><a href="<?php the_permalink();?>">Continue reading <i class="material-icons">arrow_forward</i></a></span>
									</div>
									<div class="clear"></div>
									<div class="post-social">
										<span><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
										<span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
										<span><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></span>
										<span><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></span>
										<span><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></span>
									</div>
								</div>
								<!-- End the posts lISTING -->

								<?php
							}
						}
					?>	
					<!-- Start the pagination-->
					<div class="post-pagination">
						<?php
							global $wp_query;
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
									'format' => '?paged=%#%',
									'show_all' => false,
									'end_size'           => 0,
									'mid_size'           => 1,
								'prev_text' => '<span><i class="material-icons">keyboard_arrow_left</i></span>',
								'next_text' => '<span><i class="material-icons">keyboard_arrow_right</i></span>',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) );
						?>
					</div>	
					<!-- End thed pagination -->	
				</div>
				<!-- Start the sidebar-->
				<div class="col-sm-4">
					<div class="side-bar title-lines">
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

							<h3>Popular Posts
								<span></span>
								<span></span>
								<span></span>
							 </h3>
							 <?php 
							 	wp_reset_query(); 
							 	$popular_posts_args= array(
							 			'orderby'   => 'meta_value_num',
							 			'posts_per_page' => 5,
							 		);
							 	$popular_posts = new WP_Query($popular_posts_args);
							 	if($popular_posts->have_posts()){
							 		while($popular_posts->have_posts()){
							 			$popular_posts->the_post();
							 			?>
							 			<li>
							 			<img class="popular-posts-thumbnail" src="<?php echo my_image_display();?>">
							 			<a class="popular-posts-link" href="#">							 				
							 				<?php echo the_title();?>
							 				<span><?php the_date('F j, Y'); ?></span>
							 			</a>
							 			
							 			</li>

							 		<?php

							 		}
							 	}

								wp_reset_query();
							 ?>
							 <div class="clear"></div>
							 <h3>Get In Touch
								<span></span>
								<span></span>
								<span></span>
							 </h3>
							 <div class="sidebar-social">
							 	<ul>
							 		<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							 		<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							 		<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							 		<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
							 		<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							 		<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							 	</ul>
							 </div>

					</div>

				</div>
				<!-- End the sidebar-->
		</div>

</div>
<div class="clear"></div>



<!-- End Posts Section-->



<?php get_footer();?>