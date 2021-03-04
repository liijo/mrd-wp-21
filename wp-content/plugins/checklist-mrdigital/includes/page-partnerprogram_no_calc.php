<?php
/*Template name: Partner Program No Calc*/
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>

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
    <section class="blurb">
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section><!-- .blurb -->


    <?php $deliverResults = get_theme_mod('deliver_results'); ?>
        <section class="result-oriented grey">
            <div class="container">
                <div class="section-title-panel text-center">
                    <?php $title = get_field('section_title', $deliverResults);
                    $subtitle = get_field('section_subtitle', $deliverResults);
                    if( ! empty ($title) ){?>
                    <h3 class="section-title mb-3">
                        <?php echo $title;?>
                    </h3>
                    <?php }
                    if( ! empty ($subtitle) ){?>
                    <p class="mb-5"><?php echo $subtitle;?></p>
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
                                    <a href="#" class="btn-play" data-bs-toggle="modal" data-bs-target="#video-popup" data-id="<?php the_id(); ?>">
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
                <!-- Modal -->
                <div class="modal fade" id="video-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                      <div class="modal-body text-center">
                        <span class="loader-2 text-danger"></span>
                        <div id="video" class="text-center">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        </section><!-- .result-oriented grey -->
		<?php	$id = get_the_ID();
		//echo $id;
		if($id != '7593'){?>

        <section class="section-who">
           <div class="container">
              <div class="row">
                 <div class="col-12">
                    <div class="title-panel">
                       <h2 class="main-title"><?php the_field( 'section_title_who' ); ?></h2>
                       <?php if(get_field( 'section_desc_who' )){ ?>
                         <p><?php the_field( 'section_desc_who' ); ?></p>
                       <?php } ?>
                    </div>
                 </div>
              </div>
           </div>
           <div class="timeline-who">
              <div class="container">
            <?php if ( have_rows( 'time_line_1' ) ) : ?>
              <?php while ( have_rows( 'time_line_1' ) ) : the_row(); ?>
                 <div class="row">
                    <div class="col-md-6">
                       <div class="panel-media"><?php $image = get_sub_field( 'image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel-content">
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                    <span class="round-box"></span>
                 </div>
               <?php endwhile; ?>
             <?php endif; ?>
            <?php if ( have_rows( 'time_line_2' ) ) : ?>
              <?php while ( have_rows( 'time_line_2' ) ) : the_row(); ?>
              <?php if(get_sub_field( 'image' )){ ?>
                 <div class="row flex-row-reverse">
                    <div class="col-md-6">
                       <div class="panel-media"><?php $image = get_sub_field( 'image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel-content">
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                    <span class="round-box"></span>
                 </div>
              <?php }?>
               <?php endwhile; ?>
             <?php endif; ?>
            <?php if ( have_rows( 'time_line_3' ) ) : ?>
              <?php while ( have_rows( 'time_line_3' ) ) : the_row(); ?>
              <?php if(get_sub_field( 'image' )){ ?>
                 <div class="row">
                    <div class="col-md-6">
                       <div class="panel-media"><?php $image = get_sub_field( 'image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel-content">
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                    <span class="round-box"></span>
                 </div>
              <?php }?>
               <?php endwhile; ?>
             <?php endif; ?>
            <?php if ( have_rows( 'time_line_4' ) ) : ?>
              <?php while ( have_rows( 'time_line_4' ) ) : the_row(); ?>
              <?php if(get_sub_field( 'image' )){ ?>
                 <div class="row flex-row-reverse">
                    <div class="col-md-6">
                       <div class="panel-media"><?php $image = get_sub_field( 'image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel-content">
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                    <span class="round-box"></span>
                 </div>
              <?php }?>
               <?php endwhile; ?>
             <?php endif; ?>
            <?php if ( have_rows( 'time_line_5' ) ) : ?>
              <?php while ( have_rows( 'time_line_5' ) ) : the_row(); ?>
              <?php if(get_sub_field( 'image' )){ ?>
                 <div class="row">
                    <div class="col-md-6">
                       <div class="panel-media"><?php $image = get_sub_field( 'image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel-content">
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                    <span class="round-box"></span>
                 </div>
              <?php }?>
               <?php endwhile; ?>
             <?php endif; ?>
            <?php if ( have_rows( 'time_line_6' ) ) : ?>
              <?php while ( have_rows( 'time_line_6' ) ) : the_row(); ?>
              <?php if(get_sub_field( 'image' )){ ?>
                 <div class="row flex-row-reverse">
                    <div class="col-md-6">
                       <div class="panel-media"><?php $image = get_sub_field( 'image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $image ) : ?>
                            <?php echo wp_get_attachment_image( $image, $size ); ?>
                          <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel-content">
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                    <span class="round-box"></span>
                 </div>
              <?php }?>
               <?php endwhile; ?>
             <?php endif; ?>



              </div>
           </div>
         </div>
        </section>

        <?php wp_reset_query(); ?>
        <section class="section-vandm">
           <div class="container">
              <div class="row">
                 <div class="col-12">
                    <div class="title-panel">
                       <h2 class="main-title"><?php the_field( 'section_title_3' ); ?></h2>
                       <?php if(get_field( 'section_sub_3' )){ ?>
                         <p><?php the_field( 'section_sub_3' ); ?></p>
                       <?php } ?>
                    </div>
                 </div>
              </div>
              <div class="row row-vandm">
                 <div class="col-12">
                    <div class="panel-content">
                       <p><?php the_field( 'section_3_description' ); ?></p>
                    </div>
                 </div>
                 <div class="col-md-6">
                   <?php if ( have_rows( 'section_3_vision' ) ) : ?>
                  	<?php while ( have_rows( 'section_3_vision' ) ) : the_row(); ?>
                    <div class="panel-content">
                       <h4><?php the_sub_field( 'title' ); ?></h4>
                       <p><?php the_sub_field( 'content' ); ?></p>
                    </div>
                  <?php endwhile; ?>
        <?php endif; ?>
                 </div>
                 <div class="col-md-6">
                   <?php if ( have_rows( 'section_3_mission' ) ) : ?>
        	<?php while ( have_rows( 'section_3_mission' ) ) : the_row(); ?>
                    <div class="panel-content">
                       <h4><?php the_sub_field( 'title' ); ?></h4>
                       <p><?php the_sub_field( 'content' ); ?></p>
                    </div>
                  <?php endwhile; ?>
        <?php endif; ?>
                 </div>
                 <div class="col-lg-6">
                    <div class="panel-media">
                      <?php $section_image_3 = get_field( 'section_image_3' ); ?>
                      <?php $size = 'full'; ?>
                      <?php if ( $section_image_3 ) : ?>
                      	<?php echo wp_get_attachment_image( $section_image_3, $size ); ?>
                      <?php endif; ?>
                    </div>
                 </div>
                 <div class="col-lg-6">
                    <div class="panel-content mb-0">
                      <?php the_field( 'section_content_3' ); ?>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <?php wp_reset_query(); 
		}?>
        <section class="section-points">
           <div class="container container-xxl">
              <div class="point-panel">
                 <div class="row">
                    <div class="col-12">
                      <div class="title-panel">
                         <h2 class="main-title"><?php the_field( 'section_5a_heading' ); ?></h2>
                         <?php if(get_field( 'section_5a_sub_heading' )){ ?>
                           <p><?php the_field( 'section_5a_sub_heading' ); ?></p>
                         <?php } ?>
                      </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-lg-6">
                       <?php the_field( 'col_1' ); ?>
                    </div>
                    <div class="col-lg-6">
                       <?php the_field( 'col_2' ); ?>
                    </div>
                 </div>
              </div>
              <div class="package-panel">
                 <div class="row align-items-center">
                   <?php if(get_field( 'section_5a_description' )){ ?>
                     <div class="col-12">
                        <h2 class="title"><?php the_field( 'section_5a_description' ); ?></h2>
                     </div>
                   <?php } ?>

                    <div class="col-12">
                       <a href="https://calendly.com/mrdigitalharry/60min" class="btn btn-brand has-arrow ms-track" target="_blank"><?php the_field( 'section_5a_button_text' ); ?></a>
                    </div>
                 </div>
              </div>
           </div>
        </section>
        <?php wp_reset_query(); ?>
        <!-- #section **-->
        <section class="section-portfolio bg-light">
           <div class="container container-xxl">
              <div class="row">
                 <div class="col-12">
                    <div class="title-panel">
                       <h2 class="main-title"><?php the_field( 'section_6_title' ); ?></h2>
                       <p><?php the_field( 'section_6_subtitle' ); ?></p>
                    </div>
                 </div>
              </div>
           </div>
           <div class="carousel-frame">
              <div class="owl-carousel portfolio-carousel">
                <?php if ( have_rows( 'carousel_slide_section_6_1' ) ) : ?>
                <?php while ( have_rows( 'carousel_slide_section_6_1' ) ) : the_row(); ?>
                 <div class="item">
                    <div class="carousel-panel">
                       <div class="panel-media">
                         <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $slide_image ) : ?>
                          <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
                        <?php endif; ?>
                       </div>
                       <div class="panel-overlay">
                          <h4><?php the_sub_field( 'slide_title' ); ?></h4>
                          <p><?php the_sub_field( 'slide_desc' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
              <?php endif; ?>
                <?php if ( have_rows( 'carousel_slide_section_6_2' ) ) : ?>
                <?php while ( have_rows( 'carousel_slide_section_6_2' ) ) : the_row(); ?>
                 <div class="item">
                    <div class="carousel-panel">
                       <div class="panel-media">
                         <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $slide_image ) : ?>
                          <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
                        <?php endif; ?>
                       </div>
                       <div class="panel-overlay">
                          <h4><?php the_sub_field( 'slide_title' ); ?></h4>
                          <p><?php the_sub_field( 'slide_desc' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
              <?php endif; ?>
                <?php if ( have_rows( 'carousel_slide_section_6_3' ) ) : ?>
                <?php while ( have_rows( 'carousel_slide_section_6_3' ) ) : the_row(); ?>
                 <div class="item">
                    <div class="carousel-panel">
                       <div class="panel-media">
                         <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $slide_image ) : ?>
                          <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
                        <?php endif; ?>
                       </div>
                       <div class="panel-overlay">
                          <h4><?php the_sub_field( 'slide_title' ); ?></h4>
                          <p><?php the_sub_field( 'slide_desc' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
              <?php endif; ?>
                <?php if ( have_rows( 'carousel_slide_section_6_4' ) ) : ?>
                <?php while ( have_rows( 'carousel_slide_section_6_4' ) ) : the_row(); ?>
                 <div class="item">
                    <div class="carousel-panel">
                       <div class="panel-media">
                         <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $slide_image ) : ?>
                            <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
                          <?php endif; ?>
                       </div>
                       <div class="panel-overlay">
                          <h4><?php the_sub_field( 'slide_title' ); ?></h4>
                          <p><?php the_sub_field( 'slide_desc' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
              <?php endif; ?>
                <?php if ( have_rows( 'carousel_slide_section_6_5' ) ) : ?>
                <?php while ( have_rows( 'carousel_slide_section_6_5' ) ) : the_row(); ?>
                 <div class="item">
                    <div class="carousel-panel">
                       <div class="panel-media">
                         <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                          <?php $size = 'full'; ?>
                          <?php if ( $slide_image ) : ?>
                            <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
                          <?php endif; ?>
                       </div>
                       <div class="panel-overlay">
                          <h4><?php the_sub_field( 'slide_title' ); ?></h4>
                          <p><?php the_sub_field( 'slide_desc' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
              <?php endif; ?>
                <?php if ( have_rows( 'carousel_slide_section_6_6' ) ) : ?>
                <?php while ( have_rows( 'carousel_slide_section_6_6' ) ) : the_row(); ?>
                 <div class="item">
                    <div class="carousel-panel">
                       <div class="panel-media">
                         <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $slide_image ) : ?>
                          <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
                        <?php endif; ?>
                       </div>
                       <div class="panel-overlay">
                          <h4><?php the_sub_field( 'slide_title' ); ?></h4>
                          <p><?php the_sub_field( 'slide_desc' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
              <?php endif; ?>
              </div>
           </div>
           <div class="panel-btn">
              <a href="https://calendly.com/mrdigitalharry/60min" class="btn btn-brand has-arrow ms-track" data-ms-status="won" target="_blank"><?php the_field( 'section_6_button_text' ); ?></a>
           </div>
        </section>

    <section class="process mb-5 mb-md-0 mt-5 pt-5">
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

    <section class="case-studies pt-5 mt-5 pt-md-0 mt-md-0 border-0">
      <?php $csId = get_theme_mod('case_studies'); ?>
          <div class="container">
              <div class="text-center mb-5">
                  <?php if( ! empty (get_field('cs_section_title', $csId)) ){?>
                      <h3 class="section-title mb-3">
                          <?php echo get_field('cs_section_title', $csId);?>
                      </h3>
                  <?php }
                  if( ! empty (get_field('cs_section_subtitle', $csId)) ){?>
                      <p class="mb-4"><?php echo get_field('cs_section_subtitle', $csId);?></p>
                  <?php }
                  if( ! empty (get_field('cs_section_content', $csId)) ){?>
                      <p class="small"><?php echo get_field('cs_section_content', $csId);?></p>
                  <?php } ?>
              </div>
          </div>
          <?php $args = array( 'post_type' => 'works', 'showposts' => 6 );
          $worksQuery = new WP_Query($args);
          if($worksQuery->have_posts()): ?>
             <div class="cs-slider owl-carousel">
                <?php while($worksQuery->have_posts()): $worksQuery->the_post(); ?>
                  <div class="item">
                      <?php echo get_the_post_thumbnail(get_the_id(), 'case_studies_t'); ?>
                      <?php $ptype = wp_get_post_terms(get_the_id(), 'work_category', array("fields" => "all")); ?>
                      <p class="light-grey"><?php if($ptype){
                         foreach ($ptype as $postType) {
                             echo $postType->name;
                         }
                     } ?></p>
                     <h3><?php the_title(); ?></h3>
                     <p><?php echo mrd_get_the_excerpt(110, get_the_id()); ?></p>
                     <a href="<?php echo get_permalink() ?>" data-bs-toggle="modal" data-bs-target="#csModal" data-id="<?php echo get_the_id(); ?>" class="btn btn-primary rounded launch-modal"><?php echo __('Read Case Study'); ?></a>
                 </div>
             <?php endwhile;?>
         </div>
      <?php endif;
      wp_reset_query();
      ?>

    </section> <!-- case studies -->

    <?php $args = array( 'post_type' => 'testimonials', 'showposts' => 3 );
    $testimonyQuery = new WP_Query($args);
    if($testimonyQuery->have_posts()): ?>
    <section class="testimonial grey pt-5 mt-5">
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
            </div>*/ ?>
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
    <section class="strategy-session mt-5 border-bottom border-2 pb-5">
      <?php $pageId = get_the_id();
      if(!empty($pageId)) {?>

          <div class="container">
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <div class="text-center mb-5">
                          <?php if( ! empty (get_field('session_title', $pageId)) ){?>
                          <h3 class="section-title mb-3">
                              <?php echo get_field('session_title', $pageId);?>
                          </h3>
                          <?php } ?>
                      </div>
                      <?php if( ! empty (get_field('session_content', $pageId)) )
                          echo get_field('session_content', $pageId);?>
                  </div>
              </div>
          </div>

      <?php }?>
    </section><!-- strategy-session -->
    <?php endif; ?>
    <div class="modal apply-modal fade" id="applyModalss" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header">
                <div>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                   </button>
                   <h5 class="modal-title"><?php the_field("heading_all_market"); ?></h5>
                   <p><?php the_field("description_all_market"); ?></p>
                </div>
             </div>
             <div class="modal-body">
                <div class="form-panel">
                   <form name="enquiry-form" method="post" id="formsubmit">

                   <div class="row">
                      <div class="col-lg-6">
                         <div class="form-group form-group-line">
                            <input type="text" class="form-control" id="yname" placeholder="Your Name" name="youname" required="" >
                            <div class="show_message_name"></div>
                         </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="form-group form-group-line">
                            <input type="text" class="form-control"  id="company" placeholder="Company" name="company" required="">
                            <div class="show_message_company"></div>

                         </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="form-group form-group-line">
                            <input type="email" class="form-control"  id="email" placeholder="Email" required="" name="youremail" >
                            <div class="show_message_email"></div>

                         </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="form-group form-group-line">
                            <input type="text" class="form-control"  id="phone" placeholder="Phone" required="" name="Phone">
                            <div class="show_message_phone"></div>

                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group form-group-line">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck1"  name="receiveupdate">
                               <label class="custom-control-label" for="customCheck1">I agree to being contacted by Mr Digital and receiving marketing emails inline its <a href="https://www.mr-digital.co.uk/privacy-policy/" style="text-decoration:underline">GDPR Privacy Policy</a>. </label>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group form-group-line">
                           <div class="g-recaptcha" data-sitekey="6Lem2kAaAAAAAK6iKWbWsrZ9JpIg_9kIGgunGMZ1"></div>

                         </div>
                      </div>
                      <div class="col-lg-12">
                         <div class="form-group-btn">
                            <button type="submit" name="submitform" id="submit_form" class="btn btn-brand has-arrow ms-track" data-ms-status="won" data-ms-annotation="form-submitted" >Submit</button>

                         </div>
                         <div class="message_main"></div>
                      </div>
                   </div>
                      </form>
                </div>
             </div>
          </div>
       </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php if($_GET['test']){ ?>
  <div class="modal exitmodal-modal fade show active" id="exitmodal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg modal-bg">
        <div class="modal-content">
           <div class="modal-header pt-1 b-0">
              <div class="text-right">
                <button type="button" class="close border-none b-0" data-bs-dismiss="modal" aria-label="Close">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                     </svg>
                  </button>

              </div>
           </div>
           <div class="modal-body">
             <div class="row">
                                   <div class="col-md-4">
                                               <img src="https://www.mr-digital.co.uk/wp-content/uploads/2021/01/Linkedin-Book.png" alt="">
                                   </div>
                                   <div class="col-md-8">
                                       <h3 class="section-title">Guaranteed Page 1 Google Rankings In 90 Days <span>Or We Work For FREE</span></h3>
                                       <p class="fw-bold mb-5">We know our SEO services work so we guarantee results. Our personal guarantee is that you will get you on page 1 of Google in 90 days or we’ll work for FREE!</p>
                                                                   <div class="clearfix pt-2 mb-5">
                                           <a href="#" class="btn btn-primary rounded showExitForm">YES, I WANT MORE SUBSCRIBERS <span class="icon-right"></span></a> <a href="#" class="btn btn-outline-primary rounded" data-bs-dismiss="modal" >NO, I HAVE ENOUGH LEADS<span class="icon-right"></span></a>
                                       </div>
                                   </div>
                               </div>
              <div class="subscribers_form_pop">
                <?php echo do_shortcode('[contact-form-7 id="8161" title="Exit Popup"]'); ?>
              </div>

           </div>
        </div>
     </div>
  </div>

<?php } ?>
<?php get_footer(); ?>
