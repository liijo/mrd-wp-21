<?php 
$id = get_the_id(); 
$banner = (get_field('background_image')) ? get_field('background_image') : bloginfo('template_directory') . '/images/banner.jpg';
?>
<section class="main-slider">
    <div id="banner" style="background-image: url(<?php echo $banner; ?>)">
        <?php 
        if( have_rows('slider') ): ?>
        <div class="banner-slider owl-carousel d-flex align-items-center">
            <?php while( have_rows('slider') ) : the_row(); ?>
                <div class="slider-item text-center">
                    <div class="container">
                        <?php if(get_sub_field('title')){?>
                            <h3 class="h1 mb-5"><?php echo get_sub_field('title'); ?></h3>
                        <?php }?>
                        <?php if(get_sub_field('content')){?>
                        <p class="text-white"><?php echo get_sub_field('content'); ?></p>
                        <?php }?>
                        <?php if(get_sub_field('button_text')){
                            $url = (get_sub_field('button_text')) ? get_sub_field('button_text') : '#'; ?>
                            <a href="<?php echo $url; ?>" class="btn btn-primary rounded"><?php echo get_sub_field('button_text'); ?> 
                                <span class="icon-right ps-2"></span>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <?php
            endwhile;?>
        </div><!-- end banner-slider --><?php
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