<?php
add_action('init', 'create_post_type', 9);
function create_post_type(){

	register_post_type('templates', array(
	    'labels' => array(
	        'name'         => __('Templates', 'mrdigital'),
	        'singular_name'=> __('Templates', 'mrdigital'),
	        'add_new'      => __('Add New Template', 'mrdigital'),
	        'add_new_item' => __('Add New Template', 'mrdigital'),
	        'edit'         => __('Edit', 'mrdigital'),
	        'edit_item'    => __('Edit', 'mrdigital')
	    ),
	    'supports'         => array("title", "editor", "thumbnail"),
	    'public'           => true,
	    'capability_type'  => 'page',
	    'menu_icon'        => 'dashicons-editor-insertmore',
	    'hierarchical'     => false,
	    'rewrite'          => array('slug' => 'templates'),
        'publicly_queryable'  => false
	    )
	);

	register_post_type('testimonials_video', array(
	    'labels' => array(
	        'name'         => __('Video Testimonials', 'mrdigital'),
	        'singular_name'=> __('Video Testimonials', 'mrdigital'),
	        'add_new'      => __('Add New Testimonials', 'mrdigital'),
	        'add_new_item' => __('Add New Testimonials', 'mrdigital'),
	        'edit'         => __('Edit', 'mrdigital'),
	        'edit_item'    => __('Edit', 'mrdigital')
	    ),
	    'supports'         => array("title", "editor", "thumbnail"),
	    'public'           => true,
	    'menu_position'    => 5,
	    'capability_type'  => 'page',
	    'menu_icon'        => 'dashicons-buddicons-buddypress-logo',
	    'hierarchical'     => false,
	    'rewrite'          => array('slug' => 'client-testimonials'),
        'publicly_queryable'=> false
	    )
	);

	register_post_type('works', array(
        'labels' => array(
            'name'          => __('Works', 'mrdigital'),
            'singular_name' => __('Works', 'mrdigital'),
            'add_new'       => __('Add Works', 'mrdigital'),
            'add_new_item'  => __('Add Work', 'mrdigital'),
            'edit'          => __('Edit Work', 'mrdigital'),
            'edit_item'     => __('Edit Work', 'mrdigital')
        ),
        'supports'          => array("title", "thumbnail", "editor","excerpt", "revisions"),
        'public'            => true,
        'has_archive'       => true,
        'menu_position'     => 5,
        'capability_type'   => 'post',
        'menu_icon'         => 'dashicons-media-document',
        'hierarchical'      => false,
        //'rewrite'           => array('slug' => 'case-studies'),
        'publicly_queryable'=> false
        )
    );

    $labels = array(
        'name'              => _x( 'Project Types', 'taxonomy general name', 'mrdigital' ),
        'singular_name'     => _x( 'Project Type', 'taxonomy singular name', 'mrdigital' ),
        'search_items'      => __( 'Search Project Types', 'mrdigital' ),
        'all_items'         => __( 'All Project Types', 'mrdigital' ),
        'parent_item'       => __( 'Parent Project Type', 'mrdigital' ),
        'parent_item_colon' => __( 'Parent Project Type:', 'mrdigital' ),
        'edit_item'         => __( 'Edit Project Type', 'mrdigital' ),
        'update_item'       => __( 'Update Project Type', 'mrdigital' ),
        'add_new_item'      => __( 'Add New Project Type', 'mrdigital' ),
        'new_item_name'     => __( 'New Project Type Name', 'mrdigital' ),
        'menu_name'         => __( 'Project Type', 'mrdigital' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'work_category' ),
        'publicly_queryable'=> false
    );
 
    register_taxonomy( 'work_category', array( 'works' ), $args );
 
    unset( $args );
    unset( $labels );
 
    register_post_type('testimonials', array(
        'labels' => array(
            'name'          => __('Testimonials', 'gopustheme'),
            'singular_name' => __('Testimonials', 'gopustheme'),
            'add_new'       => __('Add New Testimonials', 'gopustheme'),
            'add_new_item'  => __('Add New Testimonials', 'gopustheme'),
            'edit'          => __('Edit', 'gopustheme'),
            'edit_item'     => __('Edit', 'gopustheme')
        ),
        'supports'          => array("title", "thumbnail", "editor"),
        'public'            => true,
        'menu_position'     => 5,
        'capability_type'   => 'page',
          'menu_icon'       => 'dashicons-buddicons-buddypress-logo',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'testimonials'),
        'publicly_queryable'=> false
        )
    );

    register_post_type('team', array(
        'labels' => array(
            'name'          => __('Team', 'mrdigital'),
            'singular_name' => __('Team', 'mrdigital'),
            'add_new'       => __('Add Team member', 'mrdigital'),
            'add_new_item'  => __('Add Team Member', 'mrdigital'),
            'edit'          => __('Edit Team Member', 'mrdigital'),
            'edit_item'     => __('Edit Team', 'mrdigital')
        ),
        'supports'          => array("title", "thumbnail", "editor","excerpt", "revisions"),
        'public'            => true,
        'has_archive'       => true,
        'menu_position'     => 5,
        'capability_type'   => 'post',
        'menu_icon'         => 'dashicons-media-document',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'team'),
        'publicly_queryable'=> false
        )
    );

    $labels = array(
        'name'              => _x( 'Hobbies', 'taxonomy general name', 'mrdigital' ),
        'singular_name'     => _x( 'Hobbies', 'taxonomy singular name', 'mrdigital' ),
        'search_items'      => __( 'Search Hobbies', 'mrdigital' ),
        'all_items'         => __( 'All Hobbies', 'mrdigital' ),
        'parent_item'       => __( 'Parent Hobbies', 'mrdigital' ),
        'parent_item_colon' => __( 'Parent Hobbies:', 'mrdigital' ),
        'edit_item'         => __( 'Edit Hobbies', 'mrdigital' ),
        'update_item'       => __( 'Update Hobbies', 'mrdigital' ),
        'add_new_item'      => __( 'Add New Hobbies', 'mrdigital' ),
        'new_item_name'     => __( 'New Hobbies Name', 'mrdigital' ),
        'menu_name'         => __( 'Hobbies', 'mrdigital' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'hobbies' ),
        'publicly_queryable'=> false
    );
 
    register_taxonomy( 'hobbies', array( 'team' ), $args );
 
    unset( $args );
    unset( $labels );

    $labels = array(
        'name'              => _x( 'Department', 'taxonomy general name', 'mrdigital' ),
        'singular_name'     => _x( 'Department', 'taxonomy singular name', 'mrdigital' ),
        'search_items'      => __( 'Search Department', 'mrdigital' ),
        'all_items'         => __( 'All Department', 'mrdigital' ),
        'parent_item'       => __( 'Parent Department', 'mrdigital' ),
        'parent_item_colon' => __( 'Parent Department:', 'mrdigital' ),
        'edit_item'         => __( 'Edit Department', 'mrdigital' ),
        'update_item'       => __( 'Update Department', 'mrdigital' ),
        'add_new_item'      => __( 'Add New Department', 'mrdigital' ),
        'new_item_name'     => __( 'New Department Name', 'mrdigital' ),
        'menu_name'         => __( 'Department', 'mrdigital' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'department' ),
        'publicly_queryable'=> false
    );
 
    register_taxonomy( 'department', array( 'team' ), $args );
    unset( $args );
    unset( $labels );

    ////////////
    register_post_type('podcast', array(
        'labels' => array(
            'name'          => __('Podcast', 'mrdigital'),
            'singular_name' => __('Podcast', 'mrdigital'),
            'add_new'       => __('Add New Podcast', 'mrdigital'),
            'add_new_item'  => __('Add New Podcast', 'mrdigital'),
            'edit'          => __('Edit', 'mrdigital'),
            'edit_item'     => __('Edit', 'mrdigital')
        ),
        'supports'          => array("title", "editor", "thumbnail"),
        'public'            => true,
        'capability_type'   => 'page',
        'menu_icon'         => 'dashicons-format-audio',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'podcast'),
        'publicly_queryable'=> false
        )
    );

    $labels = array(
        'name'              => _x( 'Podcast Type', 'taxonomy general name', 'mrdigital' ),
        'singular_name'     => _x( 'Podcast Type', 'taxonomy singular name', 'mrdigital' ),
        'search_items'      => __( 'Search Podcast Type', 'mrdigital' ),
        'all_items'         => __( 'All Podcast Type', 'mrdigital' ),
        'parent_item'       => __( 'Parent Podcast Type', 'mrdigital' ),
        'parent_item_colon' => __( 'Parent Podcast Type:', 'mrdigital' ),
        'edit_item'         => __( 'Edit Podcast Type', 'mrdigital' ),
        'update_item'       => __( 'Update Podcast Type', 'mrdigital' ),
        'add_new_item'      => __( 'Add New Podcast Type', 'mrdigital' ),
        'new_item_name'     => __( 'New Podcast Type Name', 'mrdigital' ),
        'menu_name'         => __( 'Podcast Type', 'mrdigital' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'podcast_type' ),
        'publicly_queryable'=> false
    );
 
    register_taxonomy( 'podcast_type', array( 'podcast' ), $args );
    unset( $args );
    unset( $labels );

    register_post_type('events', array(
        'labels' => array(
            'name'          => __('Events', 'mrdigital'),
            'singular_name' => __('Events', 'mrdigital'),
            'add_new'       => __('Add Events', 'mrdigital'),
            'add_new_item'  => __('Add Event', 'mrdigital'),
            'edit'          => __('Edit Event', 'mrdigital'),
            'edit_item'     => __('Edit Event', 'mrdigital')
        ),
        'supports'          => array("title", "thumbnail", "editor"),
        'public'            => true,
        'has_archive'       => true,
        'menu_position'     => 5,
        'capability_type'   => 'post',
        'menu_icon'         => 'dashicons-groups',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'events'),
        'publicly_queryable'=> false
        )
    );

    $labels = array(
        'name'              => _x( 'Event Category', 'taxonomy general name', 'mrdigital' ),
        'singular_name'     => _x( 'Event Category', 'taxonomy singular name', 'mrdigital' ),
        'search_items'      => __( 'Search Event Category', 'mrdigital' ),
        'all_items'         => __( 'All Event Category', 'mrdigital' ),
        'parent_item'       => __( 'Parent Event Category', 'mrdigital' ),
        'parent_item_colon' => __( 'Parent Event Category:', 'mrdigital' ),
        'edit_item'         => __( 'Edit Event Category', 'mrdigital' ),
        'update_item'       => __( 'Update Event Category', 'mrdigital' ),
        'add_new_item'      => __( 'Add New Event Category', 'mrdigital' ),
        'new_item_name'     => __( 'New Event Category Name', 'mrdigital' ),
        'menu_name'         => __( 'Event Category', 'mrdigital' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'event_category' ),
        'publicly_queryable'=> false
    );
 
    register_taxonomy( 'event_category', array( 'events' ), $args );

}
