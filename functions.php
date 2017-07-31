<?php

	require_once('wp-bootstrap-navwalker.php');
	/*
	** Add Post Thumbnail
	*/
	add_theme_support('post-thumbnails');


	/*
	** Add ZAK Theme Css Styles
	** Function call_zak_styles
	*/

	function call_zak_styles()
	{

		wp_enqueue_style('BTS',get_template_directory_uri() . '/css/bootstrap.css');

		wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('MDL', get_template_directory_uri() . '/css/material.min.css');
		wp_enqueue_style('select', get_template_directory_uri() . '/css/getmdl-select.min.css');
		wp_enqueue_style('Main', get_template_directory_uri() . '/css/main.css');
		wp_enqueue_style('fronted',get_template_directory_uri() . '/css/frontend.css');
	}

		
            
	/*
	** Add ZAK Theme Js Files
	** Function call_zak_js
	*/

	function call_zak_js()
	{

		wp_deregister_script('jquery');// Remove registred Jquery file
		wp_register_script('jquery', includes_url() . 'js/jquery/jquery.js',array(),false,true);
		wp_enqueue_script('jquery');
		wp_enqueue_script('BTS-js',get_template_directory_uri() . '/js/bootstrap.min.js',array(),false,true);
		wp_enqueue_script('custom-jq', get_template_directory_uri() . '/js/jquery.js',array(),false,true);
		wp_enqueue_script('MDL-js', get_template_directory_uri() . '/js/material.min.js',array(),false,true);
		wp_enqueue_script('select-js', get_template_directory_uri() . '/js/getmdl-select.min.js',array(),false,true);
		wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/backend.js',array(),false,true);

	}

	/*
	** Add Custom menu
	 */
	
		function add_custom_menu(){
			register_nav_menus(
				array(
					'mdlmenu' => 'Navigation Bar',
					'bootmenu' => 'footer Menu'
					));

		}


	/*
	** add Script and style in Hook
	*/
	
	add_action('wp_enqueue_scripts', 'call_zak_styles');
	add_action('wp_enqueue_scripts', 'call_zak_js');
	add_action('init','add_custom_menu');

	/*
	** Add Menu
	 */
	function add_mdl_menu(){
		wp_nav_menu(array(
			'theme_location' =>'mdlmenu',
			'menu_class' => 'nav navbar-nav navbar-right',
			'container' => false,
			'depth' => 2,
			'walker' => new wp_bootstrap_navwalker(),

			));

	}

	/* Chnages to Index Filters*/

	function change_excerpt_length($length){
		return 15;
	}
	function change_excerpt_dots($more){
		return '';
	}
	add_filter('excerpt_more','change_excerpt_dots');
	add_filter('excerpt_length', 'change_excerpt_length');

	/*
		get Image of post as thumbnail if no fetured is set
	 */
	function my_image_display($size = 'full') {
	if (has_post_thumbnail()) {
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, $size);
		$image_url = $image_url[0];
	} else {
		global $post, $posts;
		$image_url = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$image_url = $matches [1] [0];

		
		//Defines a default image
		if(empty($image_url)){
			$image_url = get_bloginfo('template_url') . "/img/default.jpg";
		}
	}
	return $image_url;
}