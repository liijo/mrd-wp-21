<?php 
/* Template name: Home */
get_header(); ?>

<?php get_template_part( 'parts/featured', 'logos' ); ?>

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

    <?php get_template_part( 'template-testimonial', 'slider' ); ?>   

    <section class="dev-stages">
        <div class="container">
            <div class="text-center mb-5">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php $devStage = get_field('development_stages');
                        if( ! empty ($devStage['dev_section_title']) ){?>
                        <h3 class="section-title mb-3">
                            <?php echo $devStage['dev_section_title'];?>
                        </h3>
                        <?php }?>
                        <?php
                        if( ! empty ($devStage['dev_section_subtitle']) ){?>
                        <p class="mb-4"><?php echo $devStage['dev_section_subtitle'];?></p>
                        <?php } 
                        if( ! empty ($devStage['dev_section_content']) ){?>
                        <p class="small"><?php echo $devStage['dev_section_content'];?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php if( have_rows('development_stage_slider') ): ?>
            <div class="dev-slider owl-carousel mt-5">
                <?php $i = 1; ?>
                <?php while( have_rows('development_stage_slider') ) : the_row(); ?>
                <div class="item" data-dot="<button role='button' class='owl-dot'><span><?php echo $i; ?></span></button>">
                    <?php $i++; ?>
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

    <?php get_template_part( 'parts/result', 'count' ); ?>

    <section class="case-studies pt-5 mt-5">
        <?php get_template_part( 'parts/case-studies', 'slider' ); ?>
    </section> <!-- case studies -->

    <section class="testimonial pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center mb-5">
                        <?php $testimonials = get_field('testimonials');
                        if( ! empty ($testimonials['section_title']) ){?>
                        <h3 class="section-title mb-3">
                            <?php echo $testimonials['section_title'];?>
                        </h3>
                        <?php } 
                        if( ! empty ($testimonials['section_subtitle']) ){?>
                        <p class="small"><?php echo $testimonials['section_subtitle'];?></p>
                        <?php } ?>
                    </div>
                    <?php if( ! empty ($testimonials['section_content']) ){?>
                    <div class="text-center">
                        <p class="mb-5"><?php echo $testimonials['section_content'] ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="testimonials">

                <span class="quote-open">                   
                    <svg xmlns="http://www.w3.org/2000/svg" width="102.327" height="85.53" viewBox="0 0 102.327 85.53"><defs><style>.ab{fill:#fff;stroke:#e30613;}</style></defs><path class="ab" d="M34.005-103.306H49.2v40.531H8.673V-93.448q0-50.253,40.531-53.813v15.2q-15.2,4.245-15.2,24.373Zm60.8,0H110v40.531H69.469V-93.448q0-50.253,40.531-53.813v15.2q-15.2,4.245-15.2,24.373Z" transform="translate(-8.173 147.806)"/></svg>
                </span>

                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <?php $args = array( 'post_type' => 'testimonials', 'showposts' => 6 );
                        $testimonials = new WP_Query($args);
                        if($testimonials->have_posts()): ?>
                        <div class="testim-slider owl-carousel">
                            <?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
                            <div class="item">
                                <div class="testim-content">
                                    <?php the_content(); ?>
                                </div>
                                <div class="testim-footer d-sm-flex align-items-center">
                                    <figure class="d-flex align-items-center">
                                        <div class="rounded-circle overflow-hidden d-inline-block">
                                            <?php echo get_the_post_thumbnail(get_the_id(), 'testimonial_avatar'); ?>
                                        </div>
                                        <figcaption>
                                            <strong><?php the_title(); ?></strong> 
                                            <p class="mb-0"><?php echo get_field('designation');?></p>
                                        </figcaption>
                                    </figure>
                                    <figure>
                                        <?php $logo = get_field('logo');
                                        if(!empty($logo)) {?>
                                        <img src="<?php echo $logo['sizes']['testimonial_logo']; ?>" alt="" />
                                        <?php }?>
                                    </figure>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; 
                        wp_reset_query(); ?>
                    </div>
                </div>

                <span class="quote-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="102.327" height="85.53" viewBox="0 0 102.327 85.53"><defs><style>.ab{fill:#fff;stroke:#e30613;}</style></defs><path class="ab" d="M34.005-103.306H49.2v40.531H8.673V-93.448q0-50.253,40.531-53.813v15.2q-15.2,4.245-15.2,24.373Zm60.8,0H110v40.531H69.469V-93.448q0-50.253,40.531-53.813v15.2q-15.2,4.245-15.2,24.373Z" transform="translate(110.5 -62.276) rotate(180)"/></svg>
                </span>

            </div>
        </div>
    </section><!-- Testimonials -->

    <section class="strategy grey">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php echo get_field('strategy'); ?>
                </div>
            </div>
        </div>
    </section><!-- Strategy -->

    <section class="team pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center mb-5">
                        <?php $team = get_field('team');
                        if( ! empty ($team['section_title']) ){?>
                        <h3 class="section-title mb-3">
                            <?php echo $team['section_title'];?>
                        </h3>
                        <?php } 
                        if( ! empty ($team['section_subtitle']) ){?>
                        <p class="small"><?php echo $team['section_subtitle'];?></p>
                        <?php } ?>
                        <?php if( ! empty ($team['section_content']) ){?>
                        <p class="mb-5"><?php echo $team['section_content'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php get_template_part( 'parts/team', 'slider' ); ?> 
            
        </div>
    </section><!-- Team -->

    <section class="clients mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center mb-5">
                        <?php $clients = get_field('clients');
                        if( ! empty ($clients['section_title']) ){?>
                        <h3 class="section-title mb-3">
                            <?php echo $clients['section_title'];?>
                        </h3>
                        <?php } 
                        if( ! empty ($clients['section_subtitle']) ){?>
                        <p class="small"><?php echo $clients['section_subtitle'];?></p>
                        <?php } ?>
                        <?php if( ! empty ($clients['section_content']) ){?>
                        <p class="mb-5"><?php echo $clients['section_content'] ?></p>
                        <?php } ?>
                    </div>
                    <?php if( have_rows('logos') ): ?>
                    <div class="row align-items-center justify-content-center">
                        <?php while( have_rows('logos') ) : the_row(); ?>
                        <div class="col-lg-3 col-md-3">
                            <div class="text-center mb-4">
                                <img src="<?php echo get_sub_field('image'); ?>">
                            </div>
                        </div>
                        <?php endwhile;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section><!-- Clients -->

    <?php $purpose = get_field('purpose');
    if(!empty($purpose)) {
    $background = ($purpose['background']) ? $purpose['background'] : ''; ?>
    <section class="purpose mt-5 pt-5" style="background-image: url(<?php echo $background; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="text-center position-relative mb-5 pb-5">
                        <?php if( ! empty ($purpose['section_title']) ){?>
                        <h3 class="section-title mb-3">
                            <?php echo $purpose['section_title'];?>
                        </h3>
                        <?php }
                        if( ! empty ($purpose['section_subtitle']) ){?>
                        <p class="small"><?php echo $purpose['section_subtitle'];?></p>
                        <?php } ?>
                        <?php if( ! empty ($purpose['section_content']) ){?>
                        <p class="mb-5"><?php echo $purpose['section_content'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- purpose -->
    <?php } ?>

    <section class="checklist mt-5 pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php $checklist = get_field('checklist');
                    if(!empty($checklist)) {?>
                    <div class="text-center position-relative mb-5">
                        <?php if( ! empty ($checklist['section_title']) ){?>
                        <h3 class="section-title mb-3">
                            <?php echo $checklist['section_title'];?>
                        </h3>
                        <?php } 
                        if( ! empty ($checklist['section_content']) ){?>
                        <p>
                            <?php echo $checklist['section_content'];?>
                        </p>
                        <?php }?>
                    </div>
                    <?php }?>
                </div>
            </div>
            <?php get_template_part( 'parts/checklist', 'slider' ); ?>
        </div>
    </section><!-- Checklist -->

    <section class="strategy-session mt-5 grey">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
    </section>

<?php endif;?>
<?php get_footer(); ?>