<?php
/*
  Template Name: SEO Service Page
 */
get_header(); 
?>
<?php if (have_posts()) : the_post(); ?>
  <div class="page-frame">

    <div id="page" class="site-page">

      <?php get_template_part( 'parts/featured', 'logos' ); ?>

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
			
       <!--=============== The Process ===============-->
       <section class="edw_section service-section ss-process">
          <div class="container">
             <div class="row">
                <div class="col-12">
                   <h2 class="title-border-top text-center">The Process</h2>
                </div>
             </div>
             <div class="row">
                <div class="col-lg-9 mx-auto ss-process-list">
                  <?php
                  $slides = get_post_meta($post->ID, 'wpnbr_slider', true);
                  //$slideCount = counts($slides);
                  if ($slides):
                          $count = 1;
                          foreach ($slides as $slide) {
                                  $big = wp_get_attachment_image_src($slide['imageId'], 'process_img');
                                  $big = $big[0];
                                  $caption = $slide['caption'];
                                  $description = $slide['description'];
                                  ?>
                  <div class="row <?php if($count % 2 == 0){ echo 'flex-row-reverse ';} ?>align-items-center">
                      <div class="col-md-6">
                        <div class="panel-img mb-4 mb-md-0">
                            <img src="<?php echo $big; ?>" alt="media">
                                <div class="triangle-bottom-right"><span class="num"><?php echo $count; ?></span></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="panel-txt">
                              <h4><?php echo $caption; ?></h4>
                                  <p class="mb-0"><?php echo $description; ?></p>
                          </div>
                      </div>
                  </div>
                <?php $count++;} endif; ?>

                </div>
             </div>
             <div class="text-center mt-50"><a href="<?php the_field('button_url_sec1'); ?>" class="btn btn-new mrd-ser" <?php if(get_field('button_url_sec1') == ''){ ?> data-toggle="modal" data-target="<?php if($post->ID == 2775){ echo '#mdServicePopAid';} else {echo '#mdServicePop';} ?>"<?php } ?>><?php the_field('button_text_sec1'); ?></a></div>
          </div>
       </section>

       <!--=============== Certifications ===============-->
        <section class="edw_section service-section ss-certification">
          <span class="water-logo d-none d-md-block">
             <span class="water-logo-inner"><img src="<?php echo get_template_directory_uri();?>/img/award-icon.svg" alt="media"></span>
          </span>
          <div class="container">
             <div class="row">
                <div class="col-12"><h2 class="title-border-top text-center">Certifications</h2></div>
             </div>
             <div class="row row-sb">
			 
                <div id="certificateCarousel" class="owl-carousel owl-dots-theme certificate-carousel service-certificate">
					<?php if( have_rows('add_certifications') ):
					while( have_rows('add_certifications') ): the_row(); 
						$certification_image = get_sub_field('certification_image');?>
						<div class="item">
							<figure class="figure-panel active-shadow mb-0">
								<a href="#certification"><img src="<?php echo $certification_image; ?>"></a>
							</figure>
						</div>
						<?php endwhile;
					endif; ?>                                
                </div>
				
             </div>

          </div>
       </section>
         

       <!--=============== Our Projects ===============-->
      <section class="case-studies pt-5 mt-5">
        <?php get_template_part( 'parts/case-studies', 'slider' ); ?>
      </section> <!-- case studies -->

       <!--=============== Testimonials ===============-->
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
                                        <img src="<?php echo $logo; ?>" alt="" />
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

    

		<!--=============== Project counters ===============-->
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
			
       <!--=============== FAQ ===============-->
       <section class="edw_section service-section ss-faq">
          <div class="container">
             <div class="row">
                <div class="col-12"><h2 class="title-border-top text-center"><?php echo __('FAQs'); ?></h2></div>
             </div>
             <div class="row">
                <div class="col-12">
				<?php if( have_rows('faq') ): 
					$i = 0; ?>
                   <div class="accordion accordion-alt" id="faqAccordion">
					<?php while( have_rows('faq') ): the_row(); 
						$i++;
						$add_question = get_sub_field('add_question');
						$add_answer = get_sub_field('add_answer');
						if( $add_question ):?>
                      <div class="card">
                         <div class="card-header" id="heading<?php echo $i; ?>">
                            <h2 class="mb-0">
                               <button class="btn <?php if($i!=1){ echo 'collapsed'; }?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                  <?php echo $add_question;?>
                                  <span class="control-line"><span class="cl-one"></span><span class="cl-two"></span></span>
                               </button>
                            </h2>
                         </div>
                         <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1){ echo 'show'; }?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#faqAccordion">
                            <div class="card-body">
                               <p><?php echo $add_answer;?></p>
                            </div>
                         </div>
                      </div>
					  <?php endif;
					  endwhile;?>
                   </div>
				   <?php endif; ?>
                </div>
             </div>
          </div>
       </section>

    </div>

  </div>

      <div class="modal modal-advpop fade" id="mdServicePop" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-head">
                  <h2 class="main-title text-center"><?php the_field('popup_title'); ?></h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="close icon"></button>
               </div>
               <div class="modal-body">
                 <?php if(get_field('popup_description')){ ?>
                  <p class="sub-title text-center"><?php the_field('popup_description'); ?></p>
                <?php } ?>
                  <?php echo do_shortcode('[contact-form-7 id="157" title="Contact form 1"]'); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="modal modal-advpop fade" id="mdServicePopAid" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-head">
                  <h2 class="main-title text-center"><?php the_field('popup_title'); ?></h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="close icon"></button>
               </div>
               <div class="modal-body">
                 <?php if(get_field('popup_description')){ ?>
                  <p class="sub-title text-center"><?php the_field('popup_description'); ?></p>
                <?php } ?>
                  <?php echo do_shortcode('[contact-form-7 id="2954" title="Business Aid 1"]'); ?>
               </div>
            </div>
         </div>
      </div>
      <div class="modal modal-advpop fade" id="mdServicePopAidAgency" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-head">
                  <h2 class="main-title text-center"><?php the_field('popup_title'); ?></h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="close icon"></button>
               </div>
               <div class="modal-body">
                 <?php if(get_field('popup_description')){ ?>
                  <p class="sub-title text-center"><?php the_field('popup_description'); ?></p>
                <?php } ?>
                  <?php echo do_shortcode('[contact-form-7 id="2957" title="Business Aid Marketing Agency"]'); ?>
               </div>
            </div>
         </div>
      </div>
<?php endif; ?>
<?php get_footer(); ?>
