<?php
/*
Plugin Name: Tutorial
Plugin URI: http://#
Description: Custom Taxonomies 
Version: 1.0.0
Author: Sergio V
Author URI: https://#
Licence: GPL2
Text Domain: tutorial
*/

if ( ! defined( 'ABSPATH')) {
    exit;
}

function create_tutorial_cpt() {
    $labels = array(
        'name' => __( 'Tutorials', 'Post Type General Name', 'tutorials' ),
        'singular_name' => __( 'Tutorial', 'Post Type Singular Name', 'tutorials' ), 
        'menu_name' => __( 'Tutorials', 'tutorials'),
        'name_admin_bar' => __( 'Tutorials', 'tutorials'),
        'archives' => __( 'Tutorials Archives', 'tutorials'),
        'attributes' => __( 'Tutorial attributes', 'tutorials'),
        'parent_item_colon' => __( 'Parent Tutorial', 'tutorials'),
        'all_items' => __( 'All Tutorials', 'tutorials'),
        'add_new_item' => __( 'Add New Tutorial', 'tutorials'),
        'add_new' => __( 'Add New', 'tutorials'),
        'new_item' => __( 'New Tutorial', 'tutorials'),
        'edit_item' => __( 'Edit Tutorial', 'tutorials'),
        'update_item' => __( 'Update Tutorial', 'tutorials'),
        'view_item' => __( 'View Tutorial', 'tutorials'),
        'view_item' => __( 'View Tutorials', 'tutorials'),
        'search_item' => __( 'Search Tutorial', 'tutorials'),
        'not_found' => __( 'Not Found Tutorial', 'tutorials'),
        'not_found_in_trash' => __( 'Not Found in Trash Tutorial', 'tutorials'),
        'featured_image' => __( 'Featured Image', 'tutorials'),
        'set_featured_image' => __( 'Set Featured Image', 'tutorials'),
        'remove_featured_image' => __( 'Remove Featured Image', 'tutorials'),
        'use_featured_image' => __( 'Use Featured Image', 'tutorials'),
        'insert_into_item' => __( 'Insert into Tutorial Featured', 'tutorials'),
        'uploaded_to_this_item' => __( 'Upload this to Tutorial', 'tutorials'),
        'items_list' => __( 'Tutorials List', 'tutorials'),
        'items_list_navigation' => __( 'Totorials list in navigation', 'tutorials'),
        'filter_items_list' => __( 'Filter Items List', 'tutorials'),

    );

    $args = array(
        'label' => __('tutorial', 'tutorials'),
        'description' => __('Fullstack Web dev Tutorial', 'tutorials'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'author',),
        'taxonomies' => array( 'category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admnin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true, 
        'has_archive' => true, 
        'hierarchical' => false, 
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_qeuryable' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'tutorials')
    );
    register_post_type( 'tutorials', $args );
}

add_action( 'init', 'create_tutorial_cpt', 0 );

function rewrite_tuts_flush() {
    create_tutorial_cpt();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'rewrite_tuts_flush');