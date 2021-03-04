<?php 
/*Template name: Services Child*/
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>

    <?php get_template_part( 'parts/featured', 'logos' ); ?>
    <section class="blurb">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <?php the_content(); ?>
                    <div class="clearfix">
                        <?php /*<a href="#" class="btn btn-primary rounded"><?php echo (get_field('blurb_button_label')) ? get_field('blurb_button_label') : __('GET A FREE ZOOM STRATEGY SESSION'); ?> <span class="icon-right"></span></a>*/?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .blurb -->

    <?php get_template_part( 'parts/testimonial', 'slider' ); ?>

    <section class="process mb-5 mt-5 pt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="section-title mb-3"><?php echo __('Our'); ?> <span><?php echo __('Process'); ?></span></h3>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php if( have_rows('our_process') ): ?>
                        <div class="processes">
                            <?php $i = 0; ?>
                            <?php while( have_rows('our_process') ) : the_row(); ?>
                                <?php $cssClass = ($i % 2 == 0) ? '' : 'even'; ?>
                                <?php $i++; ?>
                                <div class="item mb-5 <?php echo $cssClass; ?>">
                                    <div class="number">
                                        <span class="num">
                                            <span>#<?php echo $i; ?></span>
                                        </span>
                                        <span class="line"></span>
                                    </div>
                                    <div class="content">
                                        <h2 class="h1"><?php echo get_sub_field('title'); ?></h2>
                                        <p><?php echo get_sub_field('content'); ?></p>
                                    </div>
                                    <div class="image">
                                        <img src="<?php echo get_sub_field('image'); ?>" alt=" " />
                                    </div>
                                </div>
                            <?php endwhile;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section><!-- process -->

    <?php /*if( ! empty (get_field('session_title', get_the_id())) ): ?>
    <section class="strategy-session mt-5 grey">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
    </section>
    <?php endif; */ ?>

    <section class="case-studies pt-5 mt-5 border-0">
        <?php get_template_part( 'parts/case-studies', 'slider' ); ?>
    </section> <!-- case studies -->

    <?php $args = array( 'post_type' => 'testimonials', 'showposts' => 4 );
    $testimIds = get_field('select_text_testimonials');
    if(!empty($testimIds))
      $args = array( 'post_type' => 'testimonials', 'post__in' => $testimIds );
    $testimonyQuery = new WP_Query($args);
    if($testimonyQuery->have_posts()): ?>
    <section class="testimonial grey mt-md-5">
        <div class="container">
            <?php if( ! empty (get_field('testimonial_section_title') ) ) {?>
            <div class="mb-md-5">
                <h3 class="section-title mb-3 text-center"><?php echo get_field('testimonial_section_title') ?></h3>
            </div>
            <?php }?>
            <div class="testimonials mb-5">

                <div class="service-testim-slider">
                    <?php while($testimonyQuery->have_posts()): $testimonyQuery->the_post(); ?>
                    <div class="item mb-5">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-lg-4">
                                <figure class="text-center">
                                    <img src="<?php the_field('logo') ?>" alt="" />
                                </figure>
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="content border-start border-1">
                                    <div class="offset-md-1">
                                        <?php the_content(); ?>
                                        <footer>
                                            <figure class="d-flex align-items-center">
                                                <div class="d-inline-block rounded-circle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($post, 'testimonial_avatar'); ?>
                                                </div>
                                                <figcaption class="ps-4">
                                                    <strong><?php the_field('name'); ?></strong>
                                                    <p class="mb-0"><?php the_title(); ?></p>
                                                </figcaption>
                                            </figure>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>

            </div>
            <?php /*<div class="text-center pt-2">
                <a href="<?php echo get_permalink(5100) ?>"><strong><?php echo __('VIEW ALL TESTIMONIALS'); ?></strong> <span class="icon-arrow-down"></span></a>
            </div>*/?>
        </div>
    </section><!-- Testimonials -->
    <?php endif; wp_reset_query(); ?>

    <?php $stratSection = get_field('strategy_section');?>
    <?php if( ! empty ($stratSection) ){?>
    <section class="strategy mt-5 pt-5 mb-5 test">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center mb-5">
                        <h3 class="section-title mb-3"><?php echo $stratSection['title'];?></h3>
                    </div>
                    <?php echo $stratSection['content'];?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <div class="clearfix"></div>

    <section class="faq grey mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="mb-5">
                        <h3 class="mb-3 fw-bolder h1 text-center"><?php echo __('FAQs'); ?></h3>
                    </div>
                    <?php if( have_rows('faq') ): ?>
                    <?php $i = 1; ?>
                    <div class="accordion accordion-flush" id="accordion">
                        <?php while( have_rows('faq') ) : the_row(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button <?php if($i > 1) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo get_sub_field('add_question'); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse <?php if($i == 1) echo 'show'; ?>" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p class="mb-0"><?php echo get_sub_field('add_answer'); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php $i++;?>
                        <?php endwhile;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>

    <?php if( ! empty (get_field('session_title', get_the_id())) ): ?>
    <section class="strategy-session pt-5 mt-md-5 border-bottom border-2 pb-5">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
        <div class="clearfix pt-md-5"></div>
    </section><!-- strategy-session -->
    <?php endif; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>