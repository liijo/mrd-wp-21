<?php
/*Template name: All Marketing Package 2*/
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
                    <div class="clearfix">
                        <?php /*<a href="#" data-bs-toggle="modal" data-bs-target="#applyModalss" class="btn btn-primary rounded"><?php echo __('I\'m Interested'); ?> <span class="icon-right"></span></a> */?>
                    </div>
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



        <?php wp_reset_query(); ?>
        <?php if(get_field('section_title_3')) : ?>
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
      <?php endif; ?>
        <?php wp_reset_query(); ?>
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
                       <button type="button" class="btn btn-brand has-arrow ms-track" data-bs-status="open" data-bs-annotation="iam-intrested"  data-bs-toggle="modal" data-bs-target="#applyModalss"><?php the_field( 'section_5a_button_text' ); ?></button>
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
              <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="won" data-bs-toggle="modal" data-bs-target="#applyModalss"><?php the_field( 'section_6_button_text' ); ?></a>
           </div>
        </section>

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
            <div class="text-center pt-2">
                <a href="<?php echo get_permalink(5100) ?>"><strong><?php echo __('VIEW ALL TESTIMONIALS'); ?></strong> <span class="icon-arrow-down"></span></a>
            </div>
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
                        <h3 class="mb-3 fw-bolder h1 text-center"><?php echo __('FAQ'); ?></h3>
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

<?php get_footer(); ?>
