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
      <?php $disable = get_field('disable_banner', get_the_id()); ?>
      <header <?php if(is_post_type_archive('works') || !empty($disable) || is_singular('post') || basename(get_page_template()) == 'page-projects.php') echo 'class="short-header"'; ?>>

        <div class="position-absolute top-0 start-0 end-0 z-index-9 pt-4" id="top-bar">
            <div class="container">
                <div class="row">
                    
                    <!-- Menu -->
                    <div class="col-md-4 col-3 pt-1">
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
                            <div class="d-flex align-items-center height-100">
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
                    <div class="col-md-4 col-6 text-center">
                        <a class="blog-header-logo text-dark" href="<?php bloginfo('home'); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="182.408" height="49.144" viewBox="0 0 182.408 49.144"><rect class="a" width="6.533" height="9.339" transform="translate(10.245 10.119)"/><rect class="a" width="6.533" height="9.571" transform="translate(10.246 29.379)"/><path class="a" d="M41.62,41.11v0Z" transform="translate(-31.375 -30.99)"/><rect class="a" width="0.177" height="0.002" transform="translate(17.047 32.929)"/><path class="a" d="M67.12,48.6a12.122,12.122,0,0,0-3.744-4.421,15.144,15.144,0,0,0-5.3-2.363,25.75,25.75,0,0,0-6.024-.711H41.62a6.355,6.355,0,0,0,6.27,5.935h4a14.861,14.861,0,0,1,3.483.406,8.512,8.512,0,0,1,3.013,1.366A6.821,6.821,0,0,1,60.5,51.38a9.111,9.111,0,0,1,.793,4.054,9.167,9.167,0,0,1-.793,4.032,6.959,6.959,0,0,1-2.119,2.607,8.508,8.508,0,0,1-3.055,1.408,14.962,14.962,0,0,1-3.6.428H47.649a6.026,6.026,0,0,0-6.029,6.024v0H52.375a20.961,20.961,0,0,0,5.864-.837,15.424,15.424,0,0,0,5.194-2.607,13.213,13.213,0,0,0,3.707-4.52,14.139,14.139,0,0,0,1.406-6.528A14.851,14.851,0,0,0,67.12,48.6Z" transform="translate(-31.375 -30.989)"/><path class="a" d="M48.584,91.27l.044-5.428H48.6L46.6,91.27H45.3l-1.94-5.428h-.032l.042,5.428H41.63V83.6h2.636l1.745,4.923h.044L47.725,83.6h2.681v7.67Z" transform="translate(-31.382 -63.021)"/><path class="a" d="M87.766,91.27,86.1,88.225h-.635V91.27H83.66V83.6h2.924a5.039,5.039,0,0,1,1.078.113,2.817,2.817,0,0,1,.943.384,2.049,2.049,0,0,1,.667.716,2.215,2.215,0,0,1,.246,1.105,2.038,2.038,0,0,1-.421,1.31,2.317,2.317,0,0,1-1.172.761l2.006,3.281Zm-.084-5.32a.761.761,0,0,0-.113-.438.787.787,0,0,0-.293-.261,1.243,1.243,0,0,0-.4-.123,2.974,2.974,0,0,0-.421-.034h-.985v1.79h.881a2.782,2.782,0,0,0,.468-.039,1.433,1.433,0,0,0,.436-.135.822.822,0,0,0,.322-.281A.853.853,0,0,0,87.682,85.951Z" transform="translate(-63.066 -63.021)"/><path class="a" d="M168.39,68.915V39.06h7.252V68.915Z" transform="translate(-126.938 -29.445)"/><path class="a" d="M239.943,66.5a26.893,26.893,0,0,1-6.388.716,18.554,18.554,0,0,1-6.61-1.137,15.224,15.224,0,0,1-5.187-3.2,14.591,14.591,0,0,1-3.395-4.955,17.577,17.577,0,0,1,0-12.924,14.445,14.445,0,0,1,3.446-4.955,15.234,15.234,0,0,1,5.145-3.141,18.138,18.138,0,0,1,6.39-1.1,19.58,19.58,0,0,1,6.578,1.076,13.473,13.473,0,0,1,4.923,2.888L240.3,44.955a7.877,7.877,0,0,0-2.769-2.009,9.463,9.463,0,0,0-3.939-.78,8.674,8.674,0,0,0-3.5.7,8.433,8.433,0,0,0-2.784,1.937,8.817,8.817,0,0,0-1.834,2.954,10.354,10.354,0,0,0-.655,3.732,11.659,11.659,0,0,0,.591,3.793,8.164,8.164,0,0,0,1.75,2.969,7.957,7.957,0,0,0,2.868,1.94,10.248,10.248,0,0,0,3.9.7,14.709,14.709,0,0,0,2.4-.19,8.974,8.974,0,0,0,2.11-.613v-5.44h-5.694V48.83h12.308V64.648A22.87,22.87,0,0,1,239.943,66.5Z" transform="translate(-163.681 -26.985)"/><path class="a" d="M354.59,68.915V39.06h7.254V68.915Z" transform="translate(-267.302 -29.445)"/><path class="a" d="M413.071,45.224v23.7h-7.218v-23.7H397.42V39.07H421.5v6.154Z" transform="translate(-299.589 -29.452)"/><path class="a" d="M507.32,68.915,505,63.054H493.446l-2.193,5.861H483.41L495.935,39.06h7l12.4,29.855Zm-8.01-21.887-3.793,10.248h7.506Z" transform="translate(-364.411 -29.445)"/><path class="a" d="M623.19,68.915V39.06h7.254V62.633H642v6.282Z" transform="translate(-469.783 -29.445)"/><path class="a" d="M0,49.144H182.408V0H0ZM2.316,2.316H180.092V46.83H2.316Z"/></svg>
                            <p class="mb-0">Award-winning digital marketing agency</p>
                        </a>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-md-4 col-3 d-flex justify-content-end align-items-top">
                        <div class="quick-contact">
                            <a href="tel:01483920998" class="btn btn-outline-secondary btn-white border-end-0"><span class="icon-phone pe-2"></span><span class="d-none d-sm-inline"> <?php echo get_theme_mod('header_phone'); ?></span></a>
                            <a href="<?php echo get_theme_mod('enquire', '#'); ?>" class="btn btn-primary d-xs-none"><span class="icon-send d-sm-none"></span><span class="d-none d-sm-inline"> <?php echo __('Enquire Now'); ?></span></a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .row end -->

        <?php get_template_part( 'parts/page', 'banner' ); ?>

    </header>
    <!-- header -->