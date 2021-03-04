<?php 
/*Template name: Influencer Programme*/
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>

    <section class="blurb pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section><!-- .blurb -->

    <section class="join-influencer">
        
        <?php $slider = get_field('influencer-slider'); ?>
        <?php if( ! empty ($slider['section_title']) ){?>
            <h3 class="section-title text-center"><?php echo $slider['section_title'];?></h3>
        <?php } ?>

        <div class="influencer-slider owl-carousel">
            <?php foreach($slider['images'] as $key => $slide): ?>
            <div class="item">
                <img src="<?php echo $slide['image']; ?>" alt="" />
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="influencer-form">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php $formSec = get_field('form_section'); ?>
                    <?php if( ! empty ($formSec['section_title']) ){?>
                        <h3 class="section-title text-center"><?php echo $formSec['section_title'];?></h3>
                    <?php } ?>
                    <?php if(! empty($formSec['content'])) {?>
                        <p class="text-center"><?php echo $formSec['content']; ?></p>
                    <?php } ?>
                    <?php if(! empty($formSec['form_shortcode'])) {?>
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div id="form" class="rounded">
                                <?php echo do_shortcode($formSec['form_shortcode']); ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer('slim'); ?>