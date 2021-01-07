<?php 
/* Template name: Home */
get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
    <?php if(get_field('blurb')) :?>
        <section class="blurb">
            <div class="container">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php echo get_field('blurb'); ?>
                    </div>
                </div>
            </div>
        </section><!-- .blurb -->
    <?php endif;?>

    <section class="result-oriented grey">
        <div class="container">
            <div class="text-center">
                <?php $vTestimony = get_field('video_testimonial'); 
                if( ! empty ($vTestimony['section_title']) ){?>
                <h3 class="section-title mb-3">
                    <?php echo $vTestimony['section_title'];?>
                </h3>
                <?php }
                if( ! empty ($vTestimony['section_subtitle']) ){?>
                <p class="mb-5"><?php echo $vTestimony['section_subtitle'];?></p>
                <?php } ?>
            </div>

            <?php $args = array( 'post_type' => 'testimonials_video', 'showposts' => 6 );
            $testimonyQuery = new WP_Query($args);
            if($testimonyQuery->have_posts()): ?>
                <div class="result-slider owl-carousel">
                <?php while($testimonyQuery->have_posts()): $testimonyQuery->the_post(); ?>
                    <div class="item">
                        <div class="item-content mb-3">
                            <?php if( ! empty (get_field('thumbnail') ) ){
                                $thumbnail = get_field('thumbnail');
                                ?><img src="<?php echo $thumbnail['sizes']['video_testimonial_t']; ?>" alt=" " /><?php
                            }  ?>
                            <div class="play-button">
                                <a href="#" class="btn-play">
                                    <span class="icon-play-button-arrowhead"></span>
                                </a>
                            </div>
                        </div>
                        <div class="item-footer">
                            <figure class="d-flex align-items-center">
                                <?php if(get_field('client_logo')) echo '<img src="'.get_field('client_logo').'" alt="" />'; ?>
                                <figcaption>
                                    <strong><?php the_title(); ?></strong> 
                                    <?php if(get_field('designation')){?>
                                    <p class="mb-0"><?php echo get_field('designation'); ?></p>
                                    <?php } ?>
                                </figcaption>
                            </figure>
                        </div>

                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; 
            wp_reset_query(); ?>

        </div>
    </section><!-- .result-oriented grey -->

    <section class="dev-stages">
        <div class="container">
            <div class="text-center mb-5">
                <?php $devStage = get_field('development_stages');
                if( ! empty ($devStage['dev_section_title']) ){?>
                <h3 class="section-title mb-3">
                    <?php echo $devStage['dev_section_title'];?>
                </h3>
                <?php }
                if( ! empty ($devStage['dev_section_subtitle']) ){?>
                <p class="mb-4"><?php echo $devStage['dev_section_subtitle'];?></p>
                <?php } 
                if( ! empty ($devStage['dev_section_content']) ){?>
                <p class="small"><?php echo $devStage['dev_section_content'];?></p>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <?php if( have_rows('development_stage_slider') ): ?>
            <div class="dev-slider owl-carousel mt-5">
                <?php while( have_rows('development_stage_slider') ) : the_row(); ?>
                <div class="item">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="text-end item-wrap">
                                <img src="<?php echo get_sub_field('image'); ?>" alt="stage" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="item-wrap">
                                <?php echo get_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif;?>
        </div>
    </section><!-- Dev-stages -->

    <?php get_template_part( 'result', 'count' ); ?>

    <section class="case-studies pt-5 mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <?php $devStage = get_field('case_studies');
                if( ! empty ($devStage['section_title']) ){?>
                <h3 class="section-title mb-3">
                    <?php echo $devStage['section_title'];?>
                </h3>
                <?php }
                if( ! empty ($devStage['section_subtitle']) ){?>
                <p class="mb-4"><?php echo $devStage['section_subtitle'];?></p>
                <?php } 
                if( ! empty ($devStage['section_content']) ){?>
                <p class="small"><?php echo $devStage['section_content'];?></p>
                <?php } ?>
            </div>
        </div>
        <?php get_template_part( 'case-studies', 'slider' ); ?>        
    </section><!-- case studies -->

<?php endif;?>
<?php get_footer(); ?>