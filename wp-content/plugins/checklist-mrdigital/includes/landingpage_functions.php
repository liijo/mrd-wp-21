<?php

class MRDrestPageTemplater {


	private static $instance;

	protected $templates;


	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new MRDrestPageTemplater();
		}

		return self::$instance;

	}

	private function __construct() {

		$this->templates = array();


		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_mrdrest_templates' )
			);

		} else {

			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);

		}

		add_filter(
			'wp_insert_post_data',
			array( $this, 'register_mrdrest_templates' )
		);


		add_filter(
			'template_include',
			array( $this, 'view_project_template')
		);


		$this->templates = array(
			'page-thankyoulp.php' => 'Thank you seo checklist',
			'page-partnerprogram.php' => 'Partner Program',
			'page-partnerprogram_no_calc.php' => 'All-in Marketing packages',
			'page-all_marketing_package_2.php' => 'All-in Marketing packages 2',
			'page-local-seo-page.php' => 'Local SEO Page',
			'page-presale.php' => 'Pre Sale Page',
		);

	}

	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}


	public function register_mrdrest_templates( $atts ) {


		$cache_key = 'mrdrest_page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		}

		wp_cache_delete( $cache_key , 'themes');

		$templates = array_merge( $templates, $this->templates );

		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	}


	public function view_project_template( $template ) {

		global $post;
		if ( ! $post ) {
			return $template;
		}


		if ( ! isset( $this->templates[get_post_meta(
			$post->ID, '_wp_page_template', true
		)] ) ) {
			return $template;
		}

		$file = plugin_dir_path( __FILE__ ). get_post_meta(
			$post->ID, '_wp_page_template', true
		);

		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		return $template;

	}

}
add_action( 'plugins_loaded', array( 'MRDrestPageTemplater', 'get_instance' ) );


add_filter('single_template', 'my_landing_template');

function my_landing_template($single) {

	global $post;

	/* Checks for single template by post type */
	if ( $post->post_type == 'mrd_landing_pages' ) {
		if ( file_exists( plugin_dir_path( __FILE__ ) . '/templates/single-mrd_landing_pages.php' ) ) {
			return plugin_dir_path( __FILE__ ) . '/templates/single-mrd_landing_pages.php';
		}
	}
	if ( $post->post_type == 'mrd_partner_pages' ) {
		if ( file_exists( plugin_dir_path( __FILE__ ) . '/templates/single-mrd_partner_pages.php' ) ) {
			return plugin_dir_path( __FILE__ ) . '/templates/single-mrd_partner_pages.php';
		}
	}

	return $single;

}

//////////
function redirect_contact_form() {
	if(is_page_template( 'template-services.php' ) || is_page_template( 'page-services-child.php' )){
		global $post;
		wp_reset_query();
		$post_id = get_the_id();
		if(get_field('exit_popup_title', $post_id)){
			?>
			<div class="modal exitmodal-modal notopened fade show active" id="exitmodal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered modal-bg">
					<div class="modal-content">
						<div class="modal-header pt-3 b-0">
							<div class="text-right">
								<button type="button" class="btn-close border-none b-0" data-bs-dismiss="modal" aria-label="Close"></button>

							</div>
						</div>
						<div class="modal-body pt-1">
							<div class="row align-items-center">
								<div class="col-md-4">
									<div class="text-center"> <img src="<?php echo get_field('popup_image', $post_id); ?>" alt=""></div>
								</div>
								<div class="col-md-8">
									<h3 class="section-title"><?php echo get_field('exit_popup_title', $post_id); ?></h3>
									<p class="fw-bold mb-5"><?php echo get_field('exit_popup_description', $post_id); ?></p>
									<div class="clearfix pt-2 mb-5">
										<a href="#" class="btn btn-primary rounded showExitForm"><?php echo get_field('popup_button_text_1', $post_id); ?> <span class="icon-right"></span></a> <a href="#" class="btn btn-outline-primary rounded" data-bs-dismiss="modal" ><?php echo get_field('popup_button_text_2', $post_id); ?><span class="icon-right"></span></a>
									</div>
								</div>
							</div>
							<div class="subscribers_form_pop">
								<?php echo do_shortcode('[contact-form-7 id="'.get_field('select_contact_form', $post_id).'" title="Exit Popup"]'); ?>
							</div>

						</div>
					</div>
				</div>
			</div>

			<?php
		}
	}
	$return = '<script type="text/javascript">';
	$return .= 'document.addEventListener( "wpcf7mailsent", function( event ) {';
	if(!is_singular( 'mrd_landing_pages' )){
		$return .= 'location = "'. get_permalink( 6978 ) .'"';
	}
	$return .= '}, false );';

	$return .= "jQuery('a[data-bs-toggle=\"pill\"]').on('shown.bs.tab', function (e) {
		var newelem = e.target; // newly activated tab
		var element = jQuery(newelem).attr('href');
		jQuery(element).find('.item').hide();
		setTimeout(function(){ jQuery(element).find('.item').show() }, 400);

  //var oldelem = e.relatedTarget.attr('href'); // previous active tab
	});";
	$return .= '</script>';
	echo $return;
}
add_action( 'wp_footer', 'redirect_contact_form', 100 );

?>
