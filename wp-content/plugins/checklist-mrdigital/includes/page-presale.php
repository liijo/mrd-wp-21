<?php
/*Template name: Pre Sale Page*/
get_header('blank'); ?>
<?php if (have_posts()) : the_post(); ?>


    <section class="presale_section">
        <div class="container">
            <div class="row">

                <div class="col-sm-10 mx-auto">
                    <?php the_content(); ?>
                    <div class="item-content mb-3">
                            <img src="<?php the_field('video_thumbnail'); ?>" alt=" ">                            <div class="play-button">
                                <a href="#" class="btn-play" data-bs-toggle="modal" data-bs-target="#video-popup" data-id="5916">
                                    <span class="icon-play-button-arrowhead"></span>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section><!-- .blurb -->

    <section class="section-clients clients mt-5 pt-5 section_border">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="section-title-panel text-center mb-5">

                        <h3 class="section-title mb-3">
                            <?php the_field('section_title');?>
                        </h3>

                        <?php if( ! empty (get_field('section_description')) ){?>
                        <p class="mb-5"><?php echo get_field('section_description'); ?></p>
                        <?php } ?>
                    </div>
                    <?php if( have_rows('clients') ):
                        $i = 1;?>
                    <div class="d-flex flex-wrap align-items-center row-clients justify-content-around align-items-stretch">
                        <?php while( have_rows('clients') ) : the_row(); ?>
                        <div class="col-lg-3 col-md-3 col-4 py-0">
                            <div class="justify-content-center pb-4 pt-4 c-border <?php echo 'c-border-'.$i;?> d-flex align-items-center">
                                <img src="<?php echo get_sub_field('logo'); ?>">
                            </div>
                        </div>
                        <?php $i++; endwhile;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section><!-- Clients -->

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
            </div>*/?>
        </div>
    </section><!-- Testimonials -->
    <?php endif; wp_reset_query(); ?>

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
                   <h5 class="modal-title">Want to grow your agency fast? <span class="brand-color">Let us help you…</span></h5>
                   <p>To apply for our Agency Partner Programme, simply complete the below form and we will contact you to discuss your eligibility. </p>
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

    <div class="modal fade" id="video-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                  <div class="modal-body text-center">
                    <span class="loader-2 text-danger"></span>
                    <div id="videos" class="text-center">
                      <?php wp_reset_query(); ?>
                      <?php the_field('video'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
