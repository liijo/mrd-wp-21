<section class="results grey" id="counter">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="section-title mb-3">We get <span>Real Results…</span></h3>
            <p class="mb-4">Check out average results across our clients in 2020.</p>
        </div>
        <?php $resultId = get_theme_mod('result_count'); ?>
        <?php if( have_rows('result', $resultId) ): ?>
        <div class="row">
            <?php while( have_rows('result', $resultId) ) : the_row(); ?>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-wrap text-center">
                    <div class="counter-bg">
                        <img src="<?php echo get_sub_field('image'); ?>" alt="google" />
                    </div>
                    <div class="counter counter-value" data-count="<?php echo get_sub_field('count'); ?>">0</div>
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