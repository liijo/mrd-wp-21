<?php 
$id = get_the_id(); 
if( is_single() ) return;
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
                            <h3 class="h1 mb-5"><?php echo get_sub_field('title'); ?></h3>
                        <?php }?>
                        <?php if(get_sub_field('content')){?>
                        <p class="text-white mb-5"><?php echo get_sub_field('content'); ?></p>
                        <?php }?>
                        <?php if(get_sub_field('button_text')){
                            $url = (get_sub_field('button_url')) ? get_sub_field('button_url') : '#'; ?>
                            <a href="<?php echo $url; ?>" class="btn btn-primary rounded"><?php echo get_sub_field('button_text'); ?> 
                                <span class="icon-right ps-2"></span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <?php
            endwhile;?>
        </div>
        <?php else:?>
        <div class="banner-slider owl-carousel d-flex align-items-center">
            <div class="slider-item text-center">
                <div class="container">
                    <h3 class="h1 mb-5"><?php echo __('We Help You Get Everyone Talking About Your Brand, Grow Your Customer Base And Increase The Return-On-Investment From Your Digital Marketing…'); ?></h3>
                </div>
            </div>
        </div>
        <!-- end banner-slider --><?php
        endif;
        ?>
        
        <div class="banner-footer d-flex align-items-center justify-content-center">
            <div class="section-title-container">
                <h3 class="h3 mb-0">WINNER</h3>
            </div>
            <div class="section-image">
                <img src="<?php bloginfo('template_directory'); ?>/images/inspire-logo.svg" alt="winner" />
            </div>
        </div>
    </div>
</section><!-- .main-slider end -->
<?php }?>