<?php $logoId = get_theme_mod('featured_logo'); ?>
<section class="featured">
    <div class="container">
        <div class="row logos d-flex align-items-center justify-content-between">
            <div class="col-lg-2 col-sm-3"><span><?php echo __('FEATURED IN'); ?></span></div>
            <div class="col-lg-10 col-sm-9">
                <?php if( have_rows('logos', $logoId) ): ?>
                <div class="logo-slider d-flex justify-content-between flex-wrap">
                    <?php while( have_rows('logos', $logoId) ) : the_row(); ?>
                    <div class="item"><img src="<?php echo get_sub_field('image'); ?>" alt="logo" /></div>
                    <?php endwhile;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>