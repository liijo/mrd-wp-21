<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        <?php wp_title('|',true,'right'); bloginfo('name'); ?>
    </title>

    <link rel="icon" href="<?php bloginfo('template_directory')?>/images/Mr-Digital-Favicon-32x32.png" sizes="32x32" />
    <link rel="icon" href="<?php bloginfo('template_directory')?>/images/Mr-Digital-Favicon-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="<?php bloginfo('template_directory')?>/images/Mr-Digital-Favicon-180x180.png" />

    <?php wp_head(); ?>
        <!--[if lt IE 9]>
              <script src="<?php echo ISSPATH; ?>/js/html5shiv.js"></script>
              <script src="<?php echo ISSPATH; ?>/js/respond.min.js"></script>
          <![endif]-->
</head>
   <body <?php body_class(); ?>>
	    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX3PG9Z"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <div id="page-loader"></div>
        <?php $disable = get_field('disable_banner', get_the_id()); ?>
        <header <?php if(is_tax() || is_post_type_archive('works') || !empty($disable) || is_singular('post') || basename(get_page_template()) == 'page-projects.php') echo 'class="pt-3 short-header z-index-9"'; else echo 'class="pt-3 z-index-9"'; ?>>

        <div class="" id="top-bar">
            <div class="container">
                <div class="row">
                    
                    <!-- Menu -->
                    <div class="col-md-4 col-2">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggle-wrap">
                                <span class="navbar-toggler-icon"></span>
                                <span class="navbar-toggler-icon short"></span>
                                <span class="navbar-toggler-icon last"></span>
                            </span>
                            <p>MENU</p>
                        </button>
                        <div class="navbar-collapse collapse text-center" id="navbarsExample01" style="">
                            <span class="circle"></span>
                            <div class="d-flex align-items-start align-items-md-center height-100">
                                <?php
                                wp_nav_menu(array
                                    (
                                        'theme_location' => 'primary_menu',
                                        'container' => '',
                                        'menu_class' => 'navbar-nav',
                                        'add_li_class'  => 'nav-item'
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Logo -->
                    <div class="col-md-4 col-8 text-center">
                        <a class="blog-header-logo text-dark" href="<?php bloginfo('home'); ?>">
                            <svg id="MrDigitalLogo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 741 199.64" height="48px"><defs><style>.cls-1{fill:#fff;}.short-header .cls-1, #top-bar.visible .cls-1{fill:#000;} .cls-1.cls-3 {fill: #e30613;}</style></defs><title>Mr-Digital-New-Logo(White)</title><path class="cls-1" d="M746.77,209.64H-7.34V-7.25H746.77ZM9.41,190.24H731.59V9.41H9.41Z"></path><rect class="cls-1" x="41.63" y="41.12" width="26.54" height="37.94"></rect><rect class="cls-1" x="41.63" y="119.36" width="26.54" height="38.88"></rect><polygon class="cls-1" points="41.62 41.11 41.62 41.12 41.62 41.11 41.62 41.11"></polygon><rect class="cls-1" x="69.25" y="133.77" width="0.72" height="0.01"></rect><path class="cls-1 cls-3" d="M145.21,71.56A49.26,49.26,0,0,0,130,53.6,61.53,61.53,0,0,0,108.47,44,104.66,104.66,0,0,0,84,41.11H41.62v0c1.1,13.49,11.94,24.08,25.47,24.11H83.32a60.4,60.4,0,0,1,14.15,1.65,34.59,34.59,0,0,1,12.24,5.55,27.7,27.7,0,0,1,8.61,10.42q3.23,6.54,3.22,16.47,0,9.77-3.22,16.38a28.28,28.28,0,0,1-8.61,10.59A34.55,34.55,0,0,1,97.3,132a60.76,60.76,0,0,1-14.64,1.74H66.11a24.48,24.48,0,0,0-24.49,24.49H85.31a85.13,85.13,0,0,0,23.82-3.4,62.64,62.64,0,0,0,21.1-10.59,53.67,53.67,0,0,0,15.06-18.36Q151,114.75,151,99.36,151,82.82,145.21,71.56Z"></path><path class="cls-1" d="M69.88,114.76l.18-22.05h-.13l-8.1,22.05H56.55L48.67,92.71h-.13l.17,22.05H41.63V83.6H52.34l7.09,20h.18l6.78-20H77.28v31.16Z"></path><path class="cls-1" d="M100.34,114.76l-6.76-12.37H91v12.37H83.66V83.6H95.54a20.48,20.48,0,0,1,4.38.46,11.44,11.44,0,0,1,3.83,1.56,8.32,8.32,0,0,1,2.71,2.91,9,9,0,0,1,1,4.49,8.28,8.28,0,0,1-1.71,5.32,9.41,9.41,0,0,1-4.76,3.09l8.15,13.33ZM100,93.15a3.09,3.09,0,0,0-.46-1.78,3.19,3.19,0,0,0-1.19-1.06,5.07,5.07,0,0,0-1.64-.5A12,12,0,0,0,95,89.67H91v7.27h3.58a11.33,11.33,0,0,0,1.9-.16,5.82,5.82,0,0,0,1.77-.55,3.34,3.34,0,0,0,1.31-1.14A3.47,3.47,0,0,0,100,93.15Z"></path><path class="cls-1" d="M168.39,160.34V39.06h29.46V160.34Z"></path><path class="cls-1" d="M309.8,160.51a109.22,109.22,0,0,1-25.95,2.91A75.36,75.36,0,0,1,257,158.8a61.85,61.85,0,0,1-21.07-13,59.29,59.29,0,0,1-13.79-20.13,66.21,66.21,0,0,1-5-26.12,66.43,66.43,0,0,1,5-26.38,58.69,58.69,0,0,1,14-20.13,61.88,61.88,0,0,1,20.9-12.76A73.69,73.69,0,0,1,283,35.8a79.54,79.54,0,0,1,26.72,4.37q12.33,4.36,20,11.73L311.25,73A32,32,0,0,0,300,64.84,38.43,38.43,0,0,0,284,61.67,35.23,35.23,0,0,0,269.8,64.5a34.26,34.26,0,0,0-11.31,7.87,35.82,35.82,0,0,0-7.45,12,42.06,42.06,0,0,0-2.66,15.16,47.39,47.39,0,0,0,2.4,15.41A33.16,33.16,0,0,0,257.89,127a32.33,32.33,0,0,0,11.65,7.88,41.64,41.64,0,0,0,15.85,2.83,59.77,59.77,0,0,0,9.76-.77,36.46,36.46,0,0,0,8.57-2.49v-22.1H280.59V88.74h50V153A92.93,92.93,0,0,1,309.8,160.51Z"></path><path class="cls-1" d="M354.59,160.34V39.06h29.47V160.34Z"></path><path class="cls-1" d="M461,64.07v96.27H431.68V64.07H397.42v-25h97.81v25Z"></path><path class="cls-1" d="M580.54,160.34l-9.42-23.81H524.18l-8.91,23.81H483.41L534.29,39.06h28.43l50.37,121.28ZM548,71.43l-15.41,41.63h30.49Z"></path><path class="cls-1" d="M623.19,160.34V39.06h29.47v95.76h46.93v25.52Z"></path></svg>
                            <p class="mb-0">Award-winning digital marketing agency</p>
                        </a>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4 col-2 d-flex justify-content-end align-items-top">
                        <div class="quick-contact">
                            <a href="tel:01483920998" class="btn btn-outline-secondary btn-white border-end-0 rounded-start"><span class="icon-phone pe-2"></span><span class="d-none d-sm-inline"> <?php echo get_theme_mod('header_phone'); ?></span></a>
                            <a href="<?php echo get_theme_mod('enquire', '#'); ?>" class="btn btn-primary d-xs-none rounded-end"><span class="icon-send d-sm-none"></span><span class="d-none d-sm-inline"> <?php echo __('Enquire Now'); ?></span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .row end -->


    </header>
    <!-- header -->
    <?php get_template_part( 'parts/page', 'banner' ); ?>
    <?php if(!empty($disable) && !is_page_template('template-contactus.php')) echo '<div class="clearfix mb-5"></div>'; ?>
    <?php $wrapper = get_field('enable_wrapper'); 
    if(!empty($wrapper) && $wrapper[0] == 'Yes'):
    ?>
    <section id="content-container" class="section-default-alt">
    <?php endif;?>