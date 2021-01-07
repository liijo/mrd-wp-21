<?php
add_action('init', 'create_post_type', 9);
function create_post_type(){
	register_post_type('testimonials_video', array(
	    'labels' => array(
	        'name' => __('Video Testimonials', 'mrdigital'),
	        'singular_name' => __('Video Testimonials', 'mrdigital'),
	        'add_new' => __('Add New Testimonials', 'mrdigital'),
	        'add_new_item' => __('Add New Testimonials', 'mrdigital'),
	        'edit' => __('Edit', 'mrdigital'),
	        'edit_item' => __('Edit', 'mrdigital')
	    ),
	    'supports' => array("title", "editor", "thumbnail"),
	    'public' => true,
	    'menu_position' => 5,
	    'capability_type' => 'page',
	    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
	    'hierarchical' => false,
	    'rewrite' => array('slug' => 'client-testimonials'),
	    )
	);

	register_post_type('works', array(
        'labels' => array(
            'name' => __('Works', 'mrdigital'),
            'singular_name' => __('Works', 'mrdigital'),
            'add_new' => __('Add Works', 'mrdigital'),
            'add_new_item' => __('Add Work', 'mrdigital'),
            'edit' => __('Edit Work', 'mrdigital'),
            'edit_item' => __('Edit Work', 'mrdigital')
        ),
        'supports' => array("title", "thumbnail", "editor","excerpt", "revisions"),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-media-document',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'case-studies'),
        )
    );

}

add_action( 'init', 'wpdocs_register_private_taxonomy', 10 );
function wpdocs_register_private_taxonomy() {
    $args = array(
        'label'        => __( 'Project Type', 'mrdigital' ),
        'public'       => false,
        'rewrite'      => false,
        'hierarchical' => true
    );

    register_taxonomy( 'works', 'works', $args );
}