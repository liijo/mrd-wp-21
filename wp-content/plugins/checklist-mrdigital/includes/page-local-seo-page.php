<?php
/*Template name: Local SEO Page*/
get_header('blank'); ?>
<?php if (have_posts()) : the_post(); ?>
  <?php
    $banner = (get_field('background_image')) ? get_field('background_image') : get_bloginfo('template_directory') . '/images/banner.jpg';
  ?>
  <section class="main-slider">
      <div id="banner" style="background-image: url(<?php echo $banner; ?>)">


          <div class="banner-slider d-flex align-items-center">

                  <div class="slider-item text-center">
                      <div class="container">

                              <h1 class="h1 mb-5"><?php the_field('section_head_sec1'); ?></h1>

                          <p class="text-white mb-5"><?php the_field('section_content_sec1'); ?></p>

                              <a href="#" data-bs-toggle="modal" data-bs-target="#applyModalss" class="btn btn-primary rounded"><?php the_field('button_text_sec1'); ?> <span class="icon-right"></span></a>


                      </div>
                  </div>

          </div>


          <div class="banner-footer d-flex align-items-stretch justify-content-center">
                <div class="section-image align-items-center d-flex">
                    <img src="<?php bloginfo('template_directory'); ?>/images/inspire-logo.png" alt="winner" width="250" />
                </div>
            </div>
      </div>
  </section><!-- .main-slider end -->
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
  <!--=============== 3 block section ===============-->
     <section class="edw_section service-section-3-blocks">
         <div class="container">
             <div class="row flex-row-reverse">
                 <div class="col-lg-6">
                     <div class="media-panel">
           <?php $seo_image_1 = get_field('seo_image_1');
           if( !empty( $seo_image_1 ) ): ?>
           <img src="<?php the_field('seo_image_1'); ?>" alt="<?php the_field('seo_heading_1');?>">
           <?php endif; ?>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="content-panel">
                        <h2><?php the_field('seo_heading_1');?></h2>
                        <p><?php the_field('seo_content_1');?></p>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-lg-6">
                     <div class="media-panel">
           <?php $seo_image_2 = get_field('seo_image_2');
           if( !empty( $seo_image_2 ) ): ?>
             <img src="<?php the_field('seo_image_2'); ?>" alt="<?php the_field('seo_heading_2');?>">
           <?php endif; ?>
         </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="content-panel">
                        <h2><?php the_field('seo_heading_2');?></h2>
                        <p><?php the_field('seo_content_2');?></p>
                     </div>
                 </div>
             </div>

             <div class="row flex-row-reverse">
                 <div class="col-lg-6">
                     <div class="media-panel">
           <?php $seo_image_3 = get_field('seo_image_3');
           if( !empty( $seo_image_3 ) ): ?>
             <img src="<?php the_field('seo_image_3'); ?>" alt="<?php the_field('seo_heading_3');?>">
           <?php endif; ?>
         </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="content-panel">
                        <h2><?php the_field('seo_heading_3');?></h2>
                        <p><?php the_field('seo_content_3');?></p>
         </div>
       </div>
     </div>
   </div>
     </section>


        <?php wp_reset_query(); ?>


    <section class="process mb-5 mt-5 pt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="section-title mb-3"><?php echo __('Our'); ?> <span><?php echo __('Process'); ?></span></h3>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-10 offset-md-1">
                  <?php wp_reset_query(); ?>
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
              <?php $slide_image = get_sub_field( 'slide_image' ); ?>
              <?php if($slide_image) {?>
             <div class="item">
                <div class="carousel-panel">
                   <div class="panel-media">


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
           <?php } ?>
           <?php endwhile; ?>
          <?php endif; ?>
            <?php if ( have_rows( 'carousel_slide_section_6_6' ) ) : ?>
            <?php while ( have_rows( 'carousel_slide_section_6_6' ) ) : the_row(); ?>
              <?php $slide_image = get_sub_field( 'slide_image' ); ?>
              <?php if($slide_image) {?>
             <div class="item">
                <div class="carousel-panel">
                   <div class="panel-media">

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
           <?php } ?>
           <?php endwhile; ?>
          <?php endif; ?>
          </div>
       </div>
       <div class="panel-btn">
          <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="won" data-bs-toggle="modal" data-bs-target="#applyModalss"><?php the_field( 'section_6_button_text' ); ?></a>
       </div>
    </section>

    <?php $args = array( 'post_type' => 'testimonials', 'showposts' => 3 );
    $testimonyQuery = new WP_Query($args);
    if($testimonyQuery->have_posts()): ?>
    <section class="testimonial pt-5 mt-5 mb-5">
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
            <div class="text-center pt-2">
                <a href="<?php echo get_permalink(5100) ?>"><strong><?php echo __('VIEW ALL TESTIMONIALS'); ?></strong> <span class="icon-arrow-down"></span></a>
            </div>
        </div>
    </section><!-- Testimonials -->
    <?php endif; wp_reset_query(); ?>
    <?php $achievement_background_image = get_field('achievement_background_image');?>
        <section class="edw_section service-section-counter" <?php if( !empty( $achievement_background_image ) ): ?> style="background: #000000 url('<?php the_field('achievement_background_image'); ?>') no-repeat center/cover;"<?php endif; ?>>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="si-counter-panel">
                           <div class="icon">
						   <?php $achievement_1_image = get_field('achievement_1_image');
							if( !empty( $achievement_1_image ) ): ?>
								<img src="<?php the_field('achievement_1_image'); ?>" alt="icon">
							<?php endif; ?>
							</div>
                           <div class="number"><?php the_field('achievement_1_count');?> <small>+</small></div>
                           <h6 class="title"><?php the_field('achievement_1_title');?></h6>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="si-counter-panel">
                           <div class="icon">
						   <?php $achievement_2_image = get_field('achievement_2_image');
								if( !empty( $achievement_2_image ) ): ?>
								<img src="<?php the_field('achievement_2_image'); ?>" alt="icon">
							<?php endif; ?>
						   </div>
                           <div class="number"><?php the_field('achievement_2_count');?> <small>+</small></div>
                           <h6 class="title"><?php the_field('achievement_2_title');?></h6>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="si-counter-panel">
                           <div class="icon">
								<?php $achievement_3_image = get_field('achievement_3_image');
								if( !empty( $achievement_3_image ) ): ?>
								<img src="<?php the_field('achievement_3_image'); ?>" alt="icon">
								<?php endif; ?>
						   </div>
                           <div class="number"><?php the_field('achievement_3_count');?> <small>+</small></div>
                           <h6 class="title"><?php the_field('achievement_3_title');?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-seo-page section-seo-five pt-5 mt-5 pb-5 mb-5">
           <div class="container">
              <div class="row">
                 <div class="col-12">
                   <div class="title-panel text-center">
                       <h2 class="main-title"><?php the_field('section_title_certificate'); ?></h2>
                       <p><?php the_field('section_sub_certificate'); ?></p>
                  </div>

                 </div>
              </div>
              <div class="certificate-frame">
                 <div class="row">
                    <?php while ( have_rows('add_certifications') ) : the_row();
                             $certificate_img = get_sub_field('certification_image');
                             ?>
                    <div class="col-md-4 col-6 mx-auto text-center"><div class="c-panel"><img class="mx-auto" src="<?php echo $certificate_img; ?>"></div></div>
                    <?php endwhile;?>
                 </div>
              </div>
              <div class="row">
                 <div class="col-12">
                    <div class="panel-btn text-center">
                       <a class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                    </div>
                 </div>
              </div>
           </div>
        </section>

    <div class="clearfix"></div>

    <section class="faq grey mt-0">
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
                   <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                   </button>
                   <h5 class="modal-title"><?php the_field("popup_title"); ?></h5>
                   <p><?php the_field("popup_description"); ?></p>
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
                            <button type="submit" name="submitform" id="submit_form_local" class="btn btn-brand has-arrow ms-track" data-ms-status="won" data-ms-annotation="form-submitted" >Submit</button>

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
<?php get_footer(); ?>
