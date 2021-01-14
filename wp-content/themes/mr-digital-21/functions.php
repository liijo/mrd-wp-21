<?php
add_theme_support( 'post-thumbnails' );
if (function_exists('add_image_size')) {
	add_image_size('video_testimonial_t', 623, 520, true);
	add_image_size('case_studies_t', 637, 478, true);
	add_image_size('testimonial_avatar', 76, 76, true);
	add_image_size('testimonial_logo', 179, 46, true);
	add_image_size('team', 173, 173, true);
	add_image_size('checklist', 144, 118, true);
	add_image_size('podcast_t', 343, 228, true);
}

function theme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'mrdigital' ),
        'footer_menu'  => __( 'Footer Menu', 'mrdigital' ),
    ) );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu', 0 );

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

// Enqueue Scripts after theme setup
add_action('after_setup_theme', 'theme_init_script');
if (!function_exists('theme_init_script')){

	function theme_init_script() {
		if( is_admin() ) return;
		wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', array(), '1.0.0', true);
		wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
		wp_localize_script( 'script', 'frontend_ajax_object',
	        array( 
	            'ajaxurl' => admin_url( 'admin-ajax.php' ),
	        )
	    );
		wp_enqueue_script('e-script', get_template_directory_uri() . '/js/e-script.js', array('jquery'), '1.0.0', true);
        
        wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
        wp_enqueue_style('icon', get_template_directory_uri() . '/css/icons.css');
        wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
        wp_enqueue_style('owl-theme', get_template_directory_uri() . '/css/owl.theme.default.min.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/css/style.css');
        wp_enqueue_style('e-main', get_template_directory_uri() . '/css/e-style.css');
	}
}

include 'inc/post-types.php';

//Custom excerpt length
function mrd_get_the_excerpt($length, $postId){
	$excerpt = get_the_excerpt($postId);
	$nExcerpt = substr($excerpt, 0, $length);
	return $nExcerpt;
}

function mrd_widgets_init() {
    register_sidebar( 
    	array(
	        'name'          => __( 'Footer Logos', 'mrdigital' ),
	        'id'            => 'mrd-footer-logo-widgets',
	        'description'   => __( 'Widgets in this area will show logos in the footer, before comments.', 'mrdigital' ),
	        'before_widget' => '<div class="col-md-3 col-lg-3 widget %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="widget-title">',
	        'after_title'   => '</h2>',        
    	)
    );
    register_sidebar( 
    	array(
	        'name'          => __( 'Footer Widgets', 'mrdigital' ),
	        'id'            => 'mrd-footer-widgets',
	        'description'   => __( 'Widgets in this area will be shown as footer, before comments.', 'mrdigital' ),
	        'before_widget' => '<div class="col-xl-3 col-md-12 widget %2$s"><div class="footer-panel ">',
	        'after_widget'  => '</div></div>',
	        'before_title'  => '<h4 class="widget-title">',
	        'after_title'   => '</h4>',        
    	)
    );
}
add_action( 'widgets_init', 'mrd_widgets_init' );

add_action('wp_ajax_nopriv_get_popup_content', 'getPopupContent');
add_action('wp_ajax_get_popup_content', 'getPopupContent');
function getPopupContent(){
	$title = get_the_title($_POST['postId']);
	$prev_post = get_adjacent_post( true, '', true, '' );
	$next_post = get_adjacent_post( true, '', false, '' );
	$image = '';
	if(get_field('image', $_POST['postId']))
		$image = '<img src="' . get_field('image', $_POST['postId']) . '" alt="" class="rounded shadow" />';		
	$retArr = array(
		'title' => $title, 
		'image' => $image, 
		'prevpost' => $prev_post->ID, 
		'nextpost' => $next_post->ID
	);
	wp_send_json($retArr);
	die;
}

