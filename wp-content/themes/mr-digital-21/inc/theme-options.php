<?php
function mrdigital_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'header' , array(
	    'title'      => __( 'Site Header', 'mrdigital' ),
	    'priority'   => 30,
	) );
	$wp_customize->add_section( 'general' , array(
	    'title'      => __( 'General Blocks', 'mrdigital' ),
	    'priority'   => 31,
	) );
	$settingsArr = array(
		'header_phone',
		'enquire',
		'featured_logo',
		'result_count',
		'strategy_session',
		'deliver_results',
		'case_studies'
	);
	foreach ($settingsArr as $tSettings){
		$wp_customize->add_setting( $tSettings , 
			array(
			    //'default'   => '#000000',
			    //'transport' => 'refresh',
			) 
		);
	}
	/*$wp_customize->add_control( 
		new WP_Customize_Media_Control( 
			$wp_customize, 
			'logo', 
			array(
		    	'mime_type' => 'image',
				'label'      => __( 'Header Logo', 'mrdigital' ),
				'section'    => 'header',
				'settings'   => 'header_setings',
			) 
		),
	);*/
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'header_phone', 
			array(
		    	'label'          => __( 'Phone Number', 'theme_name' ),
	            'section'        => 'header',
	            'settings'       => 'header_phone',
	            'type'           => 'text',
			) 
		) 
	);
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'enquire', 
			array(
		    	'label'          => __( 'Enquire URL', 'theme_name' ),
	            'section'        => 'header',
	            'settings'       => 'enquire',
	            'type'           => 'text',
			) 
		) 
	);
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'featured_logo', 
			array(
		    	'label'          => __( 'Select template for logos', 'theme_name' ),
	            'section'        => 'general',
	            'settings'       => 'featured_logo',
	            'type'           => 'text',
			) 
		) 
	);
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'result_count', 
			array(
		    	'label'          => __( 'Select template for result count', 'theme_name' ),
	            'section'        => 'general',
	            'settings'       => 'result_count',
	            'type'           => 'text',
			) 
		) 
	);
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'strategy_session', 
			array(
		    	'label'          => __( 'Select template for strategy session', 'theme_name' ),
	            'section'        => 'general',
	            'settings'       => 'strategy_session',
	            'type'           => 'text',
			) 
		) 
	);
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'deliver_results', 
			array(
		    	'label'          => __( 'Select template for deliver results', 'theme_name' ),
	            'section'        => 'general',
	            'settings'       => 'deliver_results',
	            'type'           => 'text',
			) 
		) 
	);
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 
			'case_studies', 
			array(
		    	'label'          => __( 'Select template for case studies', 'theme_name' ),
	            'section'        => 'general',
	            'settings'       => 'case_studies',
	            'type'           => 'text',
			) 
		) 
	);
}
add_action( 'customize_register', 'mrdigital_customize_register' );