<?php
if(!defined('ABSPATH')) exit();
// Register Custom Post Type
function quiz_book_post_type() {

	 $labels = array(
        'name'                  => _x( 'Quiz', 'Post type general name', 'quizbook' ),
        'singular_name'         => _x( 'Quiz', 'Post type singular name', 'quizbook' ),
        'menu_name'             => _x( 'Quizzes', 'Admin Menu text', 'quizbook' ),
        'name_admin_bar'        => _x( 'Quiz', 'Add New on Toolbar', 'quizbook' ),
        'add_new'               => __( 'Add New', 'quizbook' ),
        'add_new_item'          => __( 'Add New Quiz', 'quizbook' ),
        'new_item'              => __( 'New Quiz', 'quizbook' ),
        'edit_item'             => __( 'Edit Quiz', 'quizbook' ),
        'view_item'             => __( 'View Quiz', 'quizbook' ),
        'all_items'             => __( 'All the Quizzes', 'quizbook' ),
        'search_items'          => __( 'Search Quizzes', 'quizbook' ),
        'parent_item_colon'     => __( 'Father Quizzes:', 'quizbook' ),
        'not_found'             => __( 'Not Found.', 'quizbook' ),
        'not_found_in_trash'    => __( 'Not Found.', 'quizbook' ),
        'featured_image'        => _x( 'Not Found', '', 'quizbook' ),
        'set_featured_image'    => _x( 'Añadir Not Found', '', 'quizbook' ),
        'remove_featured_image' => _x( 'Eliminate Image', '', 'quizbook' ),
        'use_featured_image'    => _x( 'Use as Image', '', 'quizbook' ),
        'archives'              => _x( 'Quizzes Archive', '', 'quizbook' ),
        'insert_into_item'      => _x( 'Inserter on Quiz', '', 'quizbook' ),
        'uploaded_to_this_item' => _x( 'Load on this Quiz', '', 'quizbook' ),
        'filter_items_list'     => _x( 'Filter Quizzes by list', '”. Added in 4.4', 'quizbook' ),
        'items_list_navigation' => _x( 'Nav of Quizzes', '', 'quizbook' ),
        'items_list'            => _x( 'List of Quizzes', '', 'quizbook' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'quizes' ),
        'capability_type'    => array('quiz', 'quizes'),
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'editor'),
        'map_meta_cap'       => true,
    );

	register_post_type( 'quizbook_Quizzes', $args );

}
add_action( 'init', 'quiz_book_post_type' ); 