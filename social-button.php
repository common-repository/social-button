<?php
   /*
   Plugin Name: Social button
   Plugin URI: http://riponshah.com/social-btn
   Description: A plugin for social button. It is very usefull for showing your social profile on your WordPress site. 
   Version: 1.3
   Author: Mr. Riponshah
   Author URI: http://riponshah.com/about
   License: GPL2
   */
   
   function social_button_jquery_load(){
	wp_enqueue_script('jquery');
   }
   add_action('init','social_button_jquery_load');
   
   // Define path to this plugin file
	define( 'social_button_path', plugins_url( '', __FILE__ ) );
   // script load
   function load_social_button_script(){
   wp_enqueue_script( 'social_button_script', social_button_path.'/js/button.js');
   }
   add_action('wp_enqueue_scripts','load_social_button_script');
   // style load
   function load_social_button_stylesheet(){
   wp_enqueue_style('social_button_style', social_button_path.'/css/style.css');
   }
   add_action('wp_enqueue_scripts','load_social_button_stylesheet');
   
   function load_social_button_font_awesome(){
   wp_enqueue_style('social_button_font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
   }
   add_action('wp_enqueue_scripts','load_social_button_font_awesome');
   
   //add shortcode
   function social_button_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'name' => 'facebook',
		'link' => 'http://facebook.com',
		'size' => '',
	), $atts, 'social_btn' ) );

	return '
	<a href='.$link.' class="social-button '.$name.' '.$size.' " target="_blank"><i class="fa fa-'.$name.'"></i></a>';
}
add_shortcode( 'social_btn', 'social_button_shortcode' );



   
   // Enable the use of shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

   
   ?>