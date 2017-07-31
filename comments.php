<?php 
	if(comments_open()){
		foreach ($comments as $comment) {
			$comment_child = ($comment->comment_parent > 0) ? 'is-child' : ''; 
			?>

				<div class="comment-content col-sm-12 col-xs-12 <?php echo $comment_child;?>">
					<div class="comment-avatar col-sm-2 col-xs-2">
						<?php echo get_avatar( $comment, 100 );?>
					</div>
					<div class="comment-details col-sm-10 col-xs-10">
						<h4><?php echo $comment->comment_author;?></h4>
						<span><?php echo $comment->comment_date;?></span>
						<p><?php echo strip_tags($comment->comment_content);?></p>
					</div>
				</div>
			<?php
		}
		echo '<div class="clear"></div>';
		?>
				<div class="title-lines">
					<h3>LEAVE A COMMENT
					<span></span>
					<span></span>
					<span></span>
					</h3>
				</div>

		<?php
			$args = array(
				'comment_notes_before' => '',
				'title_reply' => '',

	
  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="comment-fields-holder col-sm-10"><input class="col-sm-12 col-md-6 col-xs-12" id="author" name="author" type="text" placeholder="name" required="required" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' />',

    'email' =>
      '<input class="col-sm-12 col-md-6 col-xs-12" id="email" name="email" required="required" placeholder="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /><div class="clear"></div></div>',

    'url' =>
      '',
    )
 ),
  'comment_field' => '<textarea id="comment"  class="col-sm-10 col-xs-12 comments-textarea" name="comment" aria-required="true" placeholder="Type Your Comment" required="required"></textarea>',
  'submit_button' => '<div class="comment-fields-holder col-sm-10"> <input type="submit" class="col-sm-12 col-xs-12 col-md-4 comment-button" value="send"><div class="clear"></div></div>',

);
			comment_form($args);
	}else{
		echo 'Sorry Comments are disabled for the Moment';
	}