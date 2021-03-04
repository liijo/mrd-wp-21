<?php $resultId = get_theme_mod('result_count'); ?>
<section class="results grey" id="counter">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="section-title mb-3"><?php echo get_field('title', $resultId); ?></h3>
            <p class="mb-4"><?php echo get_field('subtitle', $resultId); ?></p>
        </div>
        <?php if( have_rows('result', $resultId) ): ?>
        <div class="row">
            <?php while( have_rows('result', $resultId) ) : the_row(); ?>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="counter-wrap text-center">
                    <div class="counter-bg">
                        <img src="<?php echo get_sub_field('image'); ?>" alt="google" />
                    </div>
                    <div class="counter counter-value" data-count="<?php echo get_sub_field('count'); ?>" data-prefix="<?php echo get_sub_field('prefix'); ?>" data-postfix="<?php echo get_sub_field('postfix'); ?>">0</div>
                    <div class="counter-caption">
                        <p class="mb-0"><?php echo get_sub_field('title'); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <?php endif;?>
    </div>
</section><!-- Results -->