<?php 
$id = get_the_id(); 
if( is_404() || is_singular('post') || basename(get_page_template()) == 'page-projects.php' || is_post_type_archive('works') || is_tax() ) return;
$disable = get_field('disable_banner');
if(empty($disable)){
    $banner = (get_field('background_image')) ? get_field('background_image') : get_bloginfo('template_directory') . '/images/banner.jpg';
    ?>
    <section class="main-slider">
        <div id="banner" style="background-image: url(<?php echo $banner; ?>)">
            <?php 
            if( have_rows('slider') ): ?>
                <div class="banner-slider d-flex align-items-center">
                    <?php while( have_rows('slider') ) : the_row(); ?>
                        <div class="slider-item text-center">
                            <div class="container">
                                <?php if(get_sub_field('title')){?>
                                    <h1 class="h1 mb-5"><?php echo get_sub_field('title'); ?></h1>
                                <?php }?>
                                <?php if(get_sub_field('content')){?>
                                    <p class="text-white mb-5"><?php echo get_sub_field('content'); ?></p>
                                <?php }?>
                                <?php 
                                $btnTxt = (get_sub_field('button_text')) ? get_sub_field('button_text') : 'View';
                                $ctaLink = get_sub_field('cta_link');
                                if(!empty($ctaLink) && $ctaLink['0'] == 'Yes'){
                                    $url = get_sub_field('button_url');
                                    $attrs = '';
                                }
                                else{ 
                                    $url = '#'; 
                                    $attrs = 'data-bs-toggle="modal" data-bs-target="#contactForm"';
                                }
                                ?>
                                <a <?php echo $attrs; ?> href="<?php echo $url; ?>" class="btn btn-primary rounded"><?php echo get_sub_field('button_text'); ?> 
                                    <span class="icon-right ps-2"></span>
                                </a>
                        </div>
                    </div>
                    <?php
                endwhile;?>
            </div>
            <?php else:?>
                <div class="banner-slider owl-carousel d-flex align-items-center">
                    <div class="slider-item text-center">
                        <div class="container">
                            <h1 class="h1 mb-5"><?php echo __('We Help You Get Everyone Talking About Your Brand, Grow Your Customer Base And Increase The Return-On-Investment From Your Digital Marketing…'); ?></h1>
                        </div>
                    </div>
                </div>
                <!-- end banner-slider --><?php
            endif;
            ?>
            
            <div class="banner-footer d-flex align-items-stretch justify-content-center">
                <div class="section-image align-items-center d-flex">
                    <img src="<?php bloginfo('template_directory'); ?>/images/inspire-logo.png" alt="winner" width="250" />
                </div>
            </div>
        </div>
    </section><!-- .main-slider end -->
<?php }?>
<div class="modal fade" id="contactForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 align-items-start">
                <div class="section-heading">
                    <?php 
                    if(is_singular('mrd_landing_pages')) echo '<h2 class="heading-lg">'.get_field('form_title_popuplp').'</h2>'; 
                    else echo get_field('banner_content'); ?>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php 
                $shortCode = (get_field('cta_popup_shortcode')) ? get_field('cta_popup_shortcode') : '[contact-form-7 id="5" title="Contact form 1"]';
                echo do_shortcode($shortCode); 
                ?>
            </div>
        </div>
    </div>
</div>