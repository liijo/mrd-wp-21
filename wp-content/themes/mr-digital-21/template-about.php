<?php 
/* Template name: About */
get_header(); ?>

<?php if (have_posts()) : the_post(); ?>

    <!-- ===== SECTION ===== -->
    <?php $directorMsg = get_field('director_message'); ?>
    <?php if(!empty($directorMsg)) :?>
    <section class="si-about-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel-content">
                        <?php echo $directorMsg['message']; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?php $image = ($directorMsg['image']) ? $directorMsg['image'] : get_bloginfo('template_directory') . '/images/about-ross.png' ?>
                    <div class="panel-media" style="background-image: url(<?php echo $image; ?>);"></div>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>

    <?php $logoId = get_theme_mod('featured_logo'); ?>
    <section class="featured">
        <div class="container">
            <div class="row logos d-flex align-items-center justify-content-between">
                <div class="col-lg-2 col-sm-3"><span><?php echo __('FETURED IN'); ?></span></div>
                <div class="col-lg-10 col-sm-9">
                    <?php if( have_rows('logos', $logoId) ): ?>
                    <div class="logo-slider">
                        <?php while( have_rows('logos', $logoId) ) : the_row(); ?>
                        <div class="item"><img src="<?php echo get_sub_field('image'); ?>" alt="logo" /></div>
                        <?php endwhile;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>

    <?php $directorQuote = get_field('director_quote');
    if(!empty($directorQuote)):?>
    <!-- ===== SECTION ===== -->
    <section class="si-about-blockquote">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-10 mx-auto">
                    <blockquote class="blockquote blockquote-alt text-center">
                        <p><?php echo $directorQuote['message']; ?></p>
                        <div class="blockquote-footer">
                            <h4><?php echo $directorQuote['name']; ?></h4>
                            <h5><?php echo $directorQuote['designation']; ?></h5>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>

    <?php get_template_part( 'template-result', 'count' ); ?>

    <?php if( have_rows('content_blocks') ):?>
    <!-- ===== SECTION ===== -->
    <section class="si-about-inner-grid pt-5">
        <div class="container-fluid">
            <?php $i = 0; ?>
            <?php while( have_rows('content_blocks') ) : the_row(); ?>
            <?php $cssClass = ($i % 2 == 0) ? 'row' : 'row flex-row-reverse'; ?>
            <div class="<?php echo $cssClass; ?>">
                <div class="col-xl-6">
                    <div class="panel-media"><img src="<?php echo get_sub_field('image'); ?>" alt="media"></div>
                </div>
                <div class="col-xl-6">
                    <div class="panel-content">
                        <h3 class="section-title mb-4 mb-md-5"><?php echo get_sub_field('title'); ?></h3>
                        <?php echo get_sub_field('content'); ?>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endwhile; ?>
        </div>
    </section>
    <?php endif;?>

    <?php $mission = get_field('mission');?>
    <?php if( ! empty ($mission) ):?>
    <!-- ===== SECTION ===== -->
    <section class="si-about-mission text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h3 class="section-title mb-4 mb-md-5"><?php echo $mission['title'];?></h3>
                    <?php echo $mission['content']; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>

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

            <?php get_template_part( 'team', 'slider' ); ?> 
            
        </div>
    </section><!-- Team --> 

    <?php if( have_rows('content_blocks_2') ): ?>
        <?php $i = 0; ?>
        <?php while( have_rows('content_blocks_2') ) : the_row(); ?>
        <?php $cssClass = ($i % 2 == 0) ? 'si-about-p-tracker mb-5' : 'si-about-promise' ?>
        <!-- ===== SECTION ===== -->
        <section class="<?php echo $cssClass; ?>">
            <div class="container-fluid">
                <div class="row align-items-center <?php if($i % 2 == 0) echo 'flex-row-reverse'; ?>">
                    <div class="col-xl-6 col-lg-9 mx-auto mx-xl-0">
                        <div class="panel-media">
                            <img src="<?php echo get_sub_field('image'); ?>" alt="media">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-9 mx-auto mx-xl-0">
                        <div class="panel-content">
                            <h3 class="section-title mb-4 mb-md-5"><?php echo get_sub_field('title'); ?></h3>
                            <?php echo get_sub_field('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $i++; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <section class="section-podcast">
        <div class="container">
            <div class="text-center">
                <?php $podcast = get_field('podcast');?>
                <?php if( ! empty ($podcast['section_title']) ){?>
                <h3 class="section-title mb-3"><?php echo $podcast['section_title']; ?></h3>
                <?php }?>
                <?php if( ! empty ($podcast['section_content']) ){
                    echo $podcast['section_content'];
                }?>
            </div>
            <?php get_template_part( 'podcast', 'slider' ); ?>             
        </div>
    </section><!-- .section-podcast -->

    <?php get_template_part( 'strategy', 'session' ); ?>             

<?php endif;?>
<?php get_footer(); ?>