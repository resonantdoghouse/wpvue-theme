<?php

/**
 * Actions Hooks & Filters
 */
add_action( 'wp_enqueue_scripts', 'wpvue_enqueue_scripts' );
add_action( 'rest_api_init', 'wpvue_register_endpoints' );

/**
 * Child Theme parent style & custom stylesheet
 */
function wpvue_enqueue_scripts() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/css/wpvue.css' );
}

/**
 * Custom rest endpoints
 */
function wpvue_register_endpoints() {
	register_rest_route( 'wpvue', '/rand', array(
		'methods'  => 'GET',
		'callback' => 'get_random',
	) );
}

/**
 * Get random posts
 * @return array
 */
function get_random() {
	return get_posts( array( 'orderby' => 'rand', 'posts_per_page' => 3 ) );
}