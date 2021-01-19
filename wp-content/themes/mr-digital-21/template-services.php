<?php 
/* Template name: Services */
get_header(); ?>

<?php get_template_part( 'parts/featured', 'logos' ); ?>

<?php if (have_posts()) : the_post(); ?>

    <!-- ===== SECTION ===== -->

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

    <?php $args = array( 'post_type' => 'services', 'showposts' => 10 );
    $services = new WP_Query($args);
    $i = 0;
    if($services->have_posts()): ?>
        <?php while($services->have_posts()) : $services->the_post();?>
            <?php $cssClass = ($i % 2 == 0) ? 'grey' : 'pt-6 pb-7'; ?>
            <section class="overflow-hidden <?php echo implode(' ', get_post_class()). ' ' . $cssClass; ?>">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-md-6 <?php if(($i % 2 == 0)) echo 'order-md-2'; ?>">
                            <div class="request-loader <?php if(($i % 2 != 0)) echo 'float-start'; ?>">
                                <span>
                                    <img src="<?php echo get_field('image'); ?>" alt="" />
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 order-md-1">
                            <h3 class="section-title"><?php echo get_field('title'); ?></h3>
                            <p class="fw-bold mb-5"><?php echo get_field('subtitle'); ?></p>
                            <?php echo get_field('blurb'); ?>
                            <div class="clearfix pt-2 mb-5">
                                <a href="<?php echo get_permalink(); ?>" class="btn btn-primary rounded">LEARN MORE <span class="icon-right"></span></a> <a href="#" class="btn btn-outline-primary rounded">BOOK A FREE 15-MIN STRATEGY CALL <span class="icon-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 <?php if(($i % 2 != 0)) echo 'order-md-2'; ?>">
                            <div class="row">
                                <?php if( have_rows('achievements') ): ?>
                                <?php while( have_rows('achievements') ) : the_row(); ?>
                                    <div class="col-md-6">
                                        <div class="achievement mb-4">
                                            <h3><?php echo get_sub_field('count'); ?></h3>
                                            <p class="mb-0"><?php echo get_sub_field('caption'); ?></p>
                                        </div>
                                    </div>
                                <?php endwhile;?>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if( have_rows('carousel') ): ?>
                                <div class="badge-slider owl-carousel">
                                    <?php while( have_rows('carousel') ) : the_row(); ?>
                                    <div class="item">
                                        <img src="<?php echo get_sub_field('image'); ?>" alt="" />
                                    </div>
                                    <?php endwhile;?>
                                </div>
                            <?php else :?>
                                <div class="<?php if(($i % 2 != 0)) echo 'float-end'; ?>">
                                    <div class="item">
                                        <img src="<?php echo get_field('badge'); ?>" alt="" />
                                    </div>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </section><!-- <?php echo $post->post_name; ?> -->
            <?php $i++; ?>
        <?php endwhile;?>
    <?php endif;?>

<?php endif;?>
<?php get_footer(); ?>