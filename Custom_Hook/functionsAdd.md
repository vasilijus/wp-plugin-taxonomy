<?php

add_action('after_setup_theme', 'uncode_language_setup');

function uncode_language_setup()

{

	load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');

}



function theme_enqueue_styles()

{

	$production_mode = ot_get_option('_uncode_production');

	$resources_version = ($production_mode === 'on') ? null : rand();

	$parent_style = 'uncode-style';

	$child_style = array('uncode-custom-style');

	wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);

	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', $child_style, $resources_version);

}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');







function sv_init() {

	// Register Cutom post type ( quick, with minimum options ) (loft)

	register_post_type('custproduct',

		array(

			'labels' => array(

				'name' => __('CustProducts'),

				'singular_name' => __('CustProduct'),

				'add_new' => 'Add new Product',



			),

			'menu_position' => 15,

			'menu_icon' => 'dashicons-pressthis',

			'supports' => array('thumbnail', 'title', 'editor', 'post-formats', 'excerpts'),

			'taxonomies' => array('category', 'post_tag'),

			'public' => true,

			'has_archive' => true,

		)

	);

	// Register Cutom taxonomy ( quick, with minimum options ) (loft)

	register_taxonomy(

		'sv_year',

		'custproduct',

		array(

			'label' => __('Year'),

			'rewrite' => array('slug'=>'year'),

			'hierarchical' => true

			// 'capabilities' => array(

			// 	'assign_terms' => 'edit_guides',

			// 	'edit_terms' => 'publish_guides'

			// )

		)

	);

}

add_action('init', 'sv_init');
