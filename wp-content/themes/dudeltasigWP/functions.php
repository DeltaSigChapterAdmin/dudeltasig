<?php function init_function(){
    wp_enqueue_script( 'jquery', get_bloginfo('template_url') . "/js/jQuery.js");
	wp_enqueue_script( 'bootstrap', get_bloginfo('template_url') . "/js/bootstrap.min.js");
	wp_enqueue_script( 'jqueryEasing', get_bloginfo('template_url') . "/js/jquery.easing.1.3.min.js");
	wp_enqueue_script( 'fotoBoxJS', get_bloginfo('template_url') . "/lightbox/js/jquery.fotobox.min.js");
	wp_enqueue_script( 'gridSliderJS', get_bloginfo('template_url') . "/js/jquery.grid-slider.min.js");
    wp_enqueue_script( 'customScripts', get_bloginfo('template_url') . "/js/scripts.min.js");
	wp_enqueue_script( 'matchHeight', get_bloginfo('template_url') . "/js/jquery-match-height/jquery.matchHeight.js");
	wp_enqueue_style( 'customStyles', get_bloginfo('template_url') . "/css/style.css");
	wp_enqueue_style( 'bootstrapCSS', get_bloginfo('template_url') . "/css/bootstrap.min.css");
	wp_enqueue_style( 'bootstrapRespCSS', get_bloginfo('template_url') . "/css/bootstrap-responsive.min.css");
	wp_enqueue_style( 'landing-page', get_bloginfo('template_url') . "/css/landing-page.min.css");
	wp_enqueue_style( 'gridSliderCSS', get_bloginfo('template_url') . "/css/grid-slider.min.css");
	wp_enqueue_style( 'font-awesome', get_bloginfo('template_url') . "/font-awesome/css/font-awesome.min.css");
	wp_enqueue_style( 'fotoBoxCSS', get_bloginfo('template_url') . "/lightbox/css/fotobox.min.css"); }
add_action('init', 'init_function'); ?>


