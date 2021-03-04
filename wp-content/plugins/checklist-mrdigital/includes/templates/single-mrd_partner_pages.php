<?php
get_header('landing');
 ?>
<?php if (have_posts()) : the_post(); ?>

  <?php
    $banner = (get_field('background_image')) ? get_field('background_image') : get_bloginfo('template_directory') . '/images/banner.jpg';
  ?>

  <div id="page" class="site-page">
    <!-- #section **-->
    <section class="section-main-banner">
       <div class="container">
          <div class="row">
             <div class="col-xl-11 col-lg-11 mx-auto">
                <h1 class="main-title"><?php the_field( 'banner_title' ); ?></h1>
                <p class="lead"><?php the_field( 'banner_description' ); ?></p>
                <button type="button" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested" data-toggle="modal" data-target=".apply-modal"><?php the_field( '_button_text' ); ?></button>
             </div>
          </div>
       </div>
    </section>
    <!--  -->
    <section class="section-main-area">
       <div class="container">
          <div class="area-panel">
             <div class="row">
                <div class="col-12">
                   <!-- <h2 class="main-title">Want more customers? Let us help you…</h2> -->
                   <div class="title-panel">
                      <h2 class="main-title"><?php the_field( 'section_s0_title' ); ?></h2>
                      <?php if(get_field( 'section_s0_desc' )){ ?>
                      <p><?php the_field( 'section_s0_desc' ); ?></p>
                      <?php } ?>
                  </div>

                   <p><?php the_field( 'section_s0_content' ); ?></p>
                   <div class="panel-btn"><a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested" data-toggle="modal" data-target=".apply-modal"><?php the_field( 'section_s0_button_text' ); ?></a></div>
                </div>
             </div>
          </div>

       </div>
    </section>

     <!-- #section -->
     <section id="sectionCalculate" class="section-service-calc bg-light">
        <div class="container container-xxl">
           <div class="row">
              <div class="col-12">
                 <div class="title-panel">
                    <h2 class="main-title"><?php the_field( 'section_s1_title' ); ?></h2>
                    <p><?php the_field( 'section_s1_desc' ); ?></p>
                 </div>
              </div>
           </div>
           <div class="">
              <div class="row justify-content-center">
                 <div class="col-lg-6 service-calc-frame">
                    <div class="service-calc-panel">
                       <div class="form-group form-group-alt">
                          <label for="">Select Service</label>
                          <select class="form-control" id="mrdServices">
                             <option value="0" selected>Select</option>
                             <?php
                            $New = new WP_Query(array('post_type' => 'mrd_services','posts_per_page'=> -1, 'order'=>'ASC',));
                            $i = 1;
                            while ($New->have_posts()) : $New->the_post();?>
                             <option value="<?php echo get_the_id(); ?>"><?php the_title(); ?></option>
                           <?php endwhile; ?>
                          </select>
                          <div class="show_message_select"></div>
                       </div>
                       <!-- Mobile screen start -->
                       <div class="mobile-service-option-frame">
                         <div class="include_div" style="display: none;">
                            <button class="btn btn-s-collapse collapsed" type="button" data-toggle="collapse" data-target="#sCollapse" aria-expanded="false" aria-controls="sCollapse">
                               What’s Included in
                               <span class="icon">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                               </span>
                            </button>
                            <div class="collapse" id="sCollapse">
                               <div class="mobile-service-option-panel">
                                  <p class="include_title"></p>
                                  <div id="whats_included_mob">
                                  </div>
                               </div>
                            </div>
                          </div>
                       </div>
                       <!-- Mobile screen end -->
                       <div class="form-group-panel">
                          <div class="form-group form-group-alt">
                             <label for="">How much will you charge your<br> client for this service?</label>
                             <input id="myCost" type="text" class="form-control">
                             <div class="show_message_number"></div>
                          </div>
                          <button id="get_result" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="calculated-price">Calculate</button>
                       </div>
                       <div class="result-panel" style="display:none;">
                          <div class="result-label">Your profit</div>
                          <div class="result-no">£ <span id="discount"></span></div>
                       </div>
                    </div>
                 </div>
                 <div class="col-lg-6 service-calc-frame include_div" style="display:none">
                    <div class="service-option-panel service-calc-frame include_div" style="display:none">
                       <h4>What’s Included in</h4>
                       <p class="include_title"></p>
                       <div id="whats_included">
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
    <!-- end calculator Section -->
    <?php wp_reset_query(); ?>
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

    <?php wp_reset_query(); ?>
    <section class="section-google-partner">
       <div class="container">
          <div class="row align-items-center flex-row-reverse">
             <div class="col-lg-6 col-md-4">
                <div class="media-panel">
                  <?php $section_image = get_field( 'section_image' ); ?>
                  <?php $size = 'full'; ?>
                  <?php if ( $section_image ) : ?>
                   <?php echo wp_get_attachment_image( $section_image, $size ); ?>
                  <?php endif; ?>
                </div>
             </div>
             <div class="col-lg-6 col-md-8">
                <h3 class="title-google-partner"><?php the_field( 'section_4_content' ); ?></h3>
             </div>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-main-area">
       <div class="container">

          <div class="area-panel">
             <div class="row">
                <div class="col-12">
                   <!-- <h2 class="main-title">Save Over £2,000 EVERY Month!</h2> -->
                   <div class="title-panel">
                     <h2 class="main-title"><?php the_field( 'section_5_title_group_2' ); ?></h2>
                     <?php if(get_field( 'section_5_sub_group_2' )){ ?>
                       <p><?php the_field( 'section_5_sub_group_2' ); ?></p>
                     <?php } ?>
                   </div>

                   <p><?php the_field( 'section_5_content_group_2' ); ?></p>
                </div>
             </div>
          </div>
          <div class="area-panel">
             <div class="row row-icons">
               <?php if ( have_rows( 'icon_section_5_group_1' ) ) : ?>
              	<?php while ( have_rows( 'icon_section_5_group_1' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-6">
                   <div class="icon-panel">
                      <div class="icon-media">
                        <?php $icon = get_sub_field( 'icon' ); ?>
                    		<?php $size = 'full'; ?>
                    		<?php if ( $icon ) : ?>
                    			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                    		<?php endif; ?>
                      </div>
                      <h6 class="icon-title"><?php the_sub_field( 'text' ); ?></h6>
                   </div>
                </div>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php if ( have_rows( 'icon_section_5_group_2' ) ) : ?>
              <?php while ( have_rows( 'icon_section_5_group_2' ) ) : the_row(); ?>
               <div class="col-lg-3 col-sm-6">
                  <div class="icon-panel">
                     <div class="icon-media">
                       <?php $icon = get_sub_field( 'icon' ); ?>
                      <?php $size = 'full'; ?>
                      <?php if ( $icon ) : ?>
                        <?php echo wp_get_attachment_image( $icon, $size ); ?>
                      <?php endif; ?>
                     </div>
                     <h6 class="icon-title"><?php the_sub_field( 'text' ); ?></h6>
                  </div>
               </div>
               <?php endwhile; ?>
             <?php endif; ?>
              <?php if ( have_rows( 'icon_section_5_group_3' ) ) : ?>
              <?php while ( have_rows( 'icon_section_5_group_3' ) ) : the_row(); ?>
               <div class="col-lg-3 col-sm-6">
                  <div class="icon-panel">
                     <div class="icon-media">
                       <?php $icon = get_sub_field( 'icon' ); ?>
                      <?php $size = 'full'; ?>
                      <?php if ( $icon ) : ?>
                        <?php echo wp_get_attachment_image( $icon, $size ); ?>
                      <?php endif; ?>
                     </div>
                     <h6 class="icon-title"><?php the_sub_field( 'text' ); ?></h6>
                  </div>
               </div>
               <?php endwhile; ?>
             <?php endif; ?>
              <?php if ( have_rows( 'icon_section_5_group_4' ) ) : ?>
              <?php while ( have_rows( 'icon_section_5_group_4' ) ) : the_row(); ?>
               <div class="col-lg-3 col-sm-6">
                  <div class="icon-panel">
                     <div class="icon-media">
                       <?php $icon = get_sub_field( 'icon' ); ?>
                      <?php $size = 'full'; ?>
                      <?php if ( $icon ) : ?>
                        <?php echo wp_get_attachment_image( $icon, $size ); ?>
                      <?php endif; ?>
                     </div>
                     <h6 class="icon-title"><?php the_sub_field( 'text' ); ?></h6>
                  </div>
               </div>
               <?php endwhile; ?>
             <?php endif; ?>
             </div>
          </div>
       </div>
    </section>

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
                   <button type="button" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested"  data-toggle="modal" data-target=".apply-modal"><?php the_field( 'section_5a_button_text' ); ?></button>
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
          <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="won" data-toggle="modal" data-target=".apply-modal"><?php the_field( 'section_6_button_text' ); ?></a>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <!-- #section **-->
    <section class="section-services">
       <div class="container container-xxl">
          <div class="row">
             <div class="col-xl-11 mx-auto">
                <div class="panel-content">
                   <div class="title-panel">
                      <h2 class="main-title"><?php the_field( 'section_7_title' ); ?></h2>
                      <?php if(get_field( 'section_7_sub_title' )){ ?>
                        <p><?php the_field( 'section_7_sub_title' ); ?></p>
                      <?php } ?>
                   </div>
                   <p><?php the_field( 'section_7_description' ); ?></p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <ul class="service-grid">
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#030504;}.c{fill:#cc001b;}</style></defs><g transform="translate(-970 -465)"><rect class="a" width="60" height="60" transform="translate(970 465)"/><g transform="translate(980 484.981)"><g transform="translate(0 6.274)"><path class="b" d="M2012.32,193.591h-2.434a2.954,2.954,0,0,1-2.951-2.951v-7.075l-15.471-17.435a1,1,0,0,1,.748-1.663h0l37.9.033a1,1,0,0,1,.746,1.665l-15.592,17.517v6.958A2.955,2.955,0,0,1,2012.32,193.591Zm-17.882-27.122,14.245,16.052a1,1,0,0,1,.252.664v7.455a.953.953,0,0,0,.951.951h2.434a.952.952,0,0,0,.951-.951V183.3a1,1,0,0,1,.253-.665l14.365-16.139Z" transform="translate(-1991.212 -164.467)"/></g><g transform="translate(0)"><path class="b" d="M2030.116,166.467h-37.9a1,1,0,0,1-1-1v-6.274a1,1,0,0,1,1-1h37.9a1,1,0,0,1,1,1v6.274A1,1,0,0,1,2030.116,166.467Zm-36.9-2h35.9v-4.274h-35.9Z" transform="translate(-1991.212 -158.193)"/></g></g><g transform="translate(985.568 469)"><path class="b" d="M2024.548,157.6a1,1,0,0,1-1-1v-2.1l-1.9-.414a1,1,0,0,1-.738-.667,10.2,10.2,0,0,0-.6-1.453,1,1,0,0,1,.05-.994l1.052-1.636-2.977-2.977L2016.8,147.4a1,1,0,0,1-.995.05,10.327,10.327,0,0,0-1.453-.6,1,1,0,0,1-.667-.738l-.413-1.9h-4.21l-.413,1.9a1,1,0,0,1-.667.738,10.327,10.327,0,0,0-1.453.6,1,1,0,0,1-.995-.05l-1.635-1.052-2.977,2.977,1.051,1.636a1,1,0,0,1,.051.994,10.229,10.229,0,0,0-.6,1.454,1,1,0,0,1-.739.666l-1.9.414v2.1a1,1,0,0,1-2,0V154.33a1.809,1.809,0,0,1,1.417-1.758l1.513-.33c.086-.224.178-.447.277-.666l-.838-1.3a1.811,1.811,0,0,1,.241-2.246l3.2-3.205a1.809,1.809,0,0,1,2.246-.241l1.3.837c.219-.1.442-.191.666-.276l.329-1.513a1.81,1.81,0,0,1,1.759-1.418h4.532a1.809,1.809,0,0,1,1.759,1.419l.329,1.512c.224.085.447.178.666.276l1.3-.838a1.81,1.81,0,0,1,2.247.243l3.2,3.2a1.81,1.81,0,0,1,.242,2.245l-.838,1.3q.148.33.276.666l1.514.33a1.809,1.809,0,0,1,1.417,1.758V156.6A1,1,0,0,1,2024.548,157.6Z" transform="translate(-1996.78 -142.212)"/></g><g transform="translate(998.952 495.292)"><path class="c" d="M2011.164,176.2a1,1,0,0,1-1-1V169.5a1,1,0,1,1,2,0V175.2A1,1,0,0,1,2011.164,176.2Z" transform="translate(-2010.164 -168.504)"/></g><g transform="translate(996.197 499.592)"><path class="c" d="M2011.134,177.589a.993.993,0,0,1-.707-.293l-2.725-2.724a1,1,0,0,1,1.414-1.414l2.018,2.017,2.078-2.078a1,1,0,1,1,1.414,1.414l-2.785,2.785A.993.993,0,0,1,2011.134,177.589Z" transform="translate(-2007.409 -172.804)"/></g><g transform="translate(994.153 477.585)"><path class="c" d="M2015.963,157.6a1,1,0,0,1-1-1,3.8,3.8,0,0,0-7.6,0,1,1,0,0,1-2,0,5.8,5.8,0,0,1,11.6,0A1,1,0,0,1,2015.963,157.6Z" transform="translate(-2005.365 -150.797)"/></g></g></svg>
                         </div>
                         <h4>Lead Generation</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#040505;}.c{fill:#cc001b;}</style></defs><g transform="translate(-1581 -848)"><rect class="a" width="60" height="60" transform="translate(1581 848)"/><g transform="translate(1586 856.415)"><path class="b" d="M2427.667,365.845a23.617,23.617,0,1,1,13.692-42.863,1,1,0,1,1-1.161,1.629,21.606,21.606,0,1,0,5.442,5.6,1,1,0,0,1,1.662-1.113,23.621,23.621,0,0,1-19.635,36.746Z" transform="translate(-2404.05 -318.611)"/></g><g transform="translate(1591.918 862.333)"><path class="c" d="M2427.667,359.927a17.7,17.7,0,1,1,9.376-32.712,1,1,0,1,1-1.06,1.7,15.684,15.684,0,1,0,5.323,5.538,1,1,0,0,1,1.736-.992,17.7,17.7,0,0,1-15.375,26.471Z" transform="translate(-2409.968 -324.529)"/></g><g transform="translate(1598.535 868.95)"><path class="b" d="M2427.667,353.309a11.081,11.081,0,1,1,4.349-21.276,1,1,0,1,1-.785,1.839,9.072,9.072,0,1,0,5.02,5.385,1,1,0,0,1,1.891-.654,11.09,11.09,0,0,1-10.475,14.706Z" transform="translate(-2416.585 -331.146)"/></g><g transform="translate(1610.101 859.041)"><path class="c" d="M2429.151,342.155a1,1,0,0,1-.707-1.707l18.918-18.918a1,1,0,0,1,1.414,1.414l-18.918,18.918A1,1,0,0,1,2429.151,342.155Z" transform="translate(-2428.151 -321.237)"/></g><g transform="translate(1628.495 855)"><path class="c" d="M2447.545,323.829a1,1,0,0,1-1-1V318.2a1,1,0,0,1,2,0v4.633A1,1,0,0,1,2447.545,323.829Z" transform="translate(-2446.545 -317.196)"/></g><g transform="translate(1628.495 859.633)"><path class="c" d="M2452.258,323.829h-4.713a1,1,0,0,1,0-2h4.713a1,1,0,0,1,0,2Z" transform="translate(-2446.545 -321.829)"/></g><g transform="translate(1608.576 874.811)"><path class="c" d="M2427.626,343.639a1,1,0,0,1-1-1v-4.632a1,1,0,0,1,2,0v4.632A1,1,0,0,1,2427.626,343.639Z" transform="translate(-2426.626 -337.007)"/></g><g transform="translate(1608.576 879.443)"><path class="c" d="M2432.339,343.639h-4.713a1,1,0,0,1,0-2h4.713a1,1,0,0,1,0,2Z" transform="translate(-2426.626 -341.639)"/></g></g></svg>
                         </div>
                         <h4>Digital Marketing Strategy</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;}.b{fill:#040505;}.c{fill:#cc001b;}.d{fill:#030504;}</style></defs><g transform="translate(-664 -1251)"><rect class="a" width="60" height="60" transform="translate(664 1251)"/><g transform="translate(670 1259.766)"><path class="b" d="M1790.561,546.707h-33.9a7,7,0,0,1-6.99-6.99V516.083a7,7,0,0,1,6.99-6.99h33.9a7,7,0,0,1,6.99,6.99v23.634A7,7,0,0,1,1790.561,546.707Zm-33.9-35.614a5,5,0,0,0-4.99,4.99v23.634a5,5,0,0,0,4.99,4.99h33.9a5,5,0,0,0,4.99-4.99V516.083a5,5,0,0,0-4.99-4.99Z" transform="translate(-1749.672 -509.093)"/><g transform="translate(18.734 35.614)"><path class="b" d="M1778.817,552.848h-10.411v-8.141h10.411Zm-8.411-2h6.411v-4.141h-6.411Z" transform="translate(-1768.406 -544.707)"/></g><g transform="translate(11.787 41.755)"><path class="b" d="M1784.764,552.848h-22.305a1,1,0,0,1,0-2h22.305a1,1,0,0,1,0,2Z" transform="translate(-1761.459 -550.848)"/></g><g transform="translate(1 29.175)"><rect class="b" width="45.88" height="2"/></g></g><g transform="translate(674.672 1264.848)"><path class="c" d="M1790.212,522.512h-33.39a2.481,2.481,0,0,1-2.478-2.478v-3.381a2.481,2.481,0,0,1,2.478-2.478h33.39a2.481,2.481,0,0,1,2.478,2.478v3.381A2.481,2.481,0,0,1,1790.212,522.512Zm-33.39-6.337a.478.478,0,0,0-.478.478v3.381a.479.479,0,0,0,.478.478h33.39a.479.479,0,0,0,.478-.478v-3.381a.479.479,0,0,0-.478-.478Z" transform="translate(-1754.344 -514.175)"/></g><g transform="translate(674.413 1275.466)"><path class="c" d="M1765.225,535.265h-8.4a2.743,2.743,0,0,1-2.739-2.74v-4.991a2.744,2.744,0,0,1,2.739-2.741h8.4a2.744,2.744,0,0,1,2.74,2.741v4.991A2.744,2.744,0,0,1,1765.225,535.265Zm-8.4-8.472a.741.741,0,0,0-.739.741v4.991a.741.741,0,0,0,.739.74h8.4a.741.741,0,0,0,.74-.74v-4.991a.741.741,0,0,0-.74-.741Z" transform="translate(-1754.085 -524.793)"/></g><g transform="translate(690.177 1275.829)"><path class="c" d="M1780.322,527.156h-9.473a1,1,0,0,1,0-2h9.473a1,1,0,0,1,0,2Z" transform="translate(-1769.849 -525.156)"/></g><g transform="translate(690.177 1279.311)"><path class="d" d="M1788.766,530.638h-17.917a1,1,0,0,1,0-2h17.917a1,1,0,0,1,0,2Z" transform="translate(-1769.849 -528.638)"/></g><g transform="translate(690.177 1282.846)"><path class="c" d="M1790.5,534.173h-19.647a1,1,0,0,1,0-2H1790.5a1,1,0,0,1,0,2Z" transform="translate(-1769.849 -532.173)"/></g></g></svg>
                         </div>
                         <h4>Web Development</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#cc001b;}.c{fill:#030504;}</style></defs><g transform="translate(-970 -2425)"><rect class="a" width="60" height="60" transform="translate(970 2425)"/><g transform="translate(993.762 2461.083)"><path class="b" d="M2006.326,1129.512a1,1,0,0,1-1-1v-5.581a1,1,0,0,1,1.744-.668l3.177,3.531a1,1,0,0,1-.2,1.51l-3.177,2.048A1,1,0,0,1,2006.326,1129.512Zm1-3.974v1.139l.648-.418Z" transform="translate(-2005.326 -1121.931)"/></g><g transform="translate(976 2452.194)"><path class="c" d="M2033.764,1134.414h-4.332a1,1,0,0,1-.987-1.162,4.632,4.632,0,0,0-1.4-3.372c-2.41-2.75-8.687-6.028-24.907-6.028h-9.964a1,1,0,0,1-.707-.293l-3.61-3.61a1,1,0,0,1-.293-.707v-5.2a1,1,0,0,1,2,0v4.785l3.024,3.024h9.55c17.121,0,23.865,3.709,26.508,6.822a7.247,7.247,0,0,1,1.756,3.74h2.362v-16.638a1,1,0,0,1,2,0v17.638A1,1,0,0,1,2033.764,1134.414Z" transform="translate(-1987.564 -1113.043)"/></g><g transform="translate(976 2435.309)"><path class="c" d="M2033.764,1121.938a1,1,0,0,1-1-1v-22.78H2030.4a7.246,7.246,0,0,1-1.756,3.74c-2.643,3.113-9.387,6.822-26.508,6.822h-9.55l-3.024,3.023v4.785a1,1,0,0,1-2,0v-5.2a1,1,0,0,1,.293-.707l3.61-3.609a1,1,0,0,1,.707-.293h9.964c16.356,0,22.614-3.327,24.984-6.117a4.575,4.575,0,0,0,1.323-3.283,1,1,0,0,1,.987-1.162h4.332a1,1,0,0,1,1,1v23.78A1,1,0,0,1,2033.764,1121.938Z" transform="translate(-1987.564 -1096.158)"/></g><g transform="translate(1016.868 2443.546)"><path class="b" d="M2029.432,1126.176a1,1,0,0,1-1-1V1105.4a1,1,0,0,1,2,0v19.781A1,1,0,0,1,2029.432,1126.176Z" transform="translate(-2028.432 -1104.395)"/></g><g transform="translate(992.458 2449.293)"><path class="b" d="M2005.022,1120.429a1,1,0,0,1-1-1v-8.287a1,1,0,0,1,2,0v8.287A1,1,0,0,1,2005.022,1120.429Z" transform="translate(-2004.022 -1110.142)"/></g><g transform="translate(982.643 2461.039)"><path class="c" d="M2003.05,1136.193a4.269,4.269,0,0,1-3.875-2.449l-4.874-10.433a1,1,0,0,1,.906-1.423h0l11.119.043a1,1,0,0,1,1,1v9.005a4.243,4.243,0,0,1-3.555,4.2A4.428,4.428,0,0,1,2003.05,1136.193Zm-6.27-12.3,4.207,9a2.281,2.281,0,0,0,4.339-.962v-8.008Z" transform="translate(-1994.207 -1121.888)"/></g></g></svg>
                         </div>
                         <h4>Pay Per Click (PPC) Marketing</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#040505;}.c{fill:#cc001b;}</style></defs><g transform="translate(-1278 -1635)"><rect class="a" width="60" height="60" transform="translate(1278 1635)"/><g transform="translate(1300.028 1646.007)"><path class="b" d="M2223.625,738.531a1,1,0,0,0,1.783,0l6.969-14.006a.992.992,0,0,0-.06-.992l-3.818-5.791v-3.684a1,1,0,0,0-1-1h-5.974a1,1,0,0,0-1,1v3.684l-3.818,5.791a1,1,0,0,0-.06.992Zm-1.1-23.478h3.983v1.992h-3.983Zm-.46,3.983h4.9l3.372,5.115-4.827,9.7v-9.771a1,1,0,1,0-1.992,0v9.771l-4.827-9.7Z" transform="translate(-2216.551 -713.062)"/></g><g transform="translate(1291 1662.071)"><path class="c" d="M2210.51,747.049a2.992,2.992,0,0,0,2.816-1.992h8.2v1a1,1,0,0,0,1,1h3.983a1,1,0,0,0,.995-1v-1h8.2a2.988,2.988,0,1,0,0-1.99h-3.725a14.947,14.947,0,0,0,7.536-12.945,1,1,0,1,0-1.991,0,13.035,13.035,0,0,1-10.024,12.6v-.65a1,1,0,0,0-.995-1h-3.983a1,1,0,0,0-1,1v.65a13.035,13.035,0,0,1-10.023-12.6,1,1,0,0,0-1.992,0,14.945,14.945,0,0,0,7.537,12.944h-3.725a2.987,2.987,0,1,0-2.816,3.983Zm28.012-3.983a1,1,0,1,1-.995,1A1,1,0,0,1,2238.522,743.066Zm-15,0h1.992v1.991h-1.992Zm-13.01,0a1,1,0,1,1-1,1A1,1,0,0,1,2210.51,743.066Z" transform="translate(-2207.523 -729.126)"/></g></g></svg>
                         </div>
                         <h4>Graphic Design Services</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#080909;}.c{fill:#030504;}.d{fill:#cc001b;}</style></defs><g transform="translate(-970 -2826)"><rect class="a" width="60" height="60" transform="translate(970 2826)"/><g transform="translate(974 2830.746)"><path class="b" d="M2011.743,1342.8h-21.491a3.438,3.438,0,0,1-3.414-3.452v-39.77a3.438,3.438,0,0,1,3.414-3.452h40.14a3.437,3.437,0,0,1,3.414,3.452v12a1,1,0,0,1-2,0v-12a1.435,1.435,0,0,0-1.414-1.452h-40.14a1.435,1.435,0,0,0-1.414,1.452v39.77a1.435,1.435,0,0,0,1.414,1.452h21.491a1,1,0,0,1,0,2Z" transform="translate(-1986.838 -1296.123)"/></g><g transform="translate(990.163 2843.571)"><path class="c" d="M2018.742,1340.43a15.741,15.741,0,1,1,15.742-15.741A15.759,15.759,0,0,1,2018.742,1340.43Zm0-29.482a13.741,13.741,0,1,0,13.742,13.741A13.756,13.756,0,0,0,2018.742,1310.948Z" transform="translate(-2003.001 -1308.948)"/></g><g transform="translate(1013.83 2867.363)"><path class="c" d="M2035.125,1344.236a3.019,3.019,0,0,1-2.15-.89l-6.014-6.014a1,1,0,0,1,1.414-1.414l6.014,6.013a1.065,1.065,0,0,0,1.471,0,1.041,1.041,0,0,0,0-1.47l-6.015-6.014a1,1,0,0,1,1.414-1.414l6.016,6.014a3.04,3.04,0,0,1-2.15,5.189Z" transform="translate(-2026.668 -1332.74)"/></g><g transform="translate(978.536 2841.668)"><path class="d" d="M2005.936,1309.045h-13.562a1,1,0,0,1,0-2h13.562a1,1,0,0,1,0,2Z" transform="translate(-1991.374 -1307.045)"/></g><g transform="translate(978.536 2846.952)"><path class="d" d="M2000.471,1314.329h-8.1a1,1,0,0,1,0-2h8.1a1,1,0,0,1,0,2Z" transform="translate(-1991.374 -1312.329)"/></g><g transform="translate(978.536 2851.502)"><path class="d" d="M1995.913,1318.879h-3.539a1,1,0,0,1,0-2h3.539a1,1,0,0,1,0,2Z" transform="translate(-1991.374 -1316.879)"/></g><g transform="translate(978.536 2870.286)"><path class="d" d="M1998.357,1337.663h-5.983a1,1,0,0,1,0-2h5.983a1,1,0,0,1,0,2Z" transform="translate(-1991.374 -1335.663)"/></g><g transform="translate(978.536 2864.882)"><path class="d" d="M1994.781,1332.259h-2.407a1,1,0,0,1,0-2h2.407a1,1,0,0,1,0,2Z" transform="translate(-1991.374 -1330.259)"/></g><g transform="translate(978.278 2835.522)"><path class="d" d="M1992.632,1302.9h-.516a1,1,0,0,1,0-2h.516a1,1,0,0,1,0,2Z" transform="translate(-1991.116 -1300.899)"/></g><g transform="translate(981.357 2835.522)"><path class="b" d="M1995.712,1302.9h-.517a1,1,0,0,1,0-2h.517a1,1,0,0,1,0,2Z" transform="translate(-1994.195 -1300.899)"/></g><g transform="translate(984.53 2835.522)"><path class="b" d="M1998.884,1302.9h-.516a1,1,0,0,1,0-2h.516a1,1,0,0,1,0,2Z" transform="translate(-1997.368 -1300.899)"/></g></g></svg>
                         </div>
                         <h4>Search Engine Optimisation (SEO)</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#030504;}.c{fill:#cc001b;}</style></defs><g transform="translate(-1278 -3642)"><rect class="a" width="60" height="60" transform="translate(1278 3642)"/><g transform="translate(1283 3649.701)"><g transform="translate(4.545 8.317)"><path class="b" d="M2243.675,1798.12h-37.2a1,1,0,0,1-1-1v-21.774a4.406,4.406,0,0,1,4.4-4.4h9.726a1,1,0,0,1,0,2h-9.726a2.4,2.4,0,0,0-2.4,2.4v20.774h35.2v-20.774a2.4,2.4,0,0,0-2.4-2.4h-2.213a1,1,0,0,1,0-2h2.213a4.407,4.407,0,0,1,4.4,4.4v21.774A1,1,0,0,1,2243.675,1798.12Z" transform="translate(-2205.477 -1770.944)"/></g><g transform="translate(0 33.493)"><path class="b" d="M2243.263,1804.873h-36.727a5.611,5.611,0,0,1-5.6-5.605v-1.306a1.844,1.844,0,0,1,1.842-1.842h45.093a1.844,1.844,0,0,1,1.842,1.842v.466A6.453,6.453,0,0,1,2243.263,1804.873Zm-40.331-6.753v1.148a3.609,3.609,0,0,0,3.6,3.605h36.727a4.45,4.45,0,0,0,4.446-4.445v-.308Z" transform="translate(-2200.932 -1796.12)"/></g><g transform="translate(18.461)"><path class="b" d="M2228.71,1781.262a9.318,9.318,0,1,1,9.318-9.318A9.328,9.328,0,0,1,2228.71,1781.262Zm0-16.635a7.318,7.318,0,1,0,7.318,7.317A7.325,7.325,0,0,0,2228.71,1764.627Z" transform="translate(-2219.393 -1762.627)"/></g><g transform="translate(19.492 4.302)"><path class="b" d="M2228.709,1772.944a.992.992,0,0,1-.481-.124l-7.285-4.015a1,1,0,1,1,.964-1.752l7.286,4.015a1,1,0,0,1-.484,1.876Z" transform="translate(-2220.424 -1766.929)"/></g><g transform="translate(26.779 8.318)"><path class="b" d="M2234.647,1778.18a1,1,0,0,1-.661-.25l-5.937-5.236a1,1,0,1,1,1.322-1.5l5.937,5.236a1,1,0,0,1-.661,1.75Z" transform="translate(-2227.71 -1770.944)"/></g><g transform="translate(26.778 3.548)"><path class="b" d="M2228.711,1772.944a1,1,0,0,1-.591-1.807l6.532-4.769a1,1,0,1,1,1.179,1.615l-6.531,4.769A1,1,0,0,1,2228.711,1772.944Z" transform="translate(-2227.71 -1766.175)"/></g><g transform="translate(8.844 13.247)"><path class="c" d="M2217.975,1785.073h-7.2a1,1,0,0,1-1-1v-7.2a1,1,0,0,1,1-1h7.2a1,1,0,0,1,1,1v7.2A1,1,0,0,1,2217.975,1785.073Zm-6.2-2h5.2v-5.2h-5.2Z" transform="translate(-2209.776 -1775.874)"/></g><g transform="translate(9.129 16.846)"><path class="c" d="M2217.975,1781.473h-6.914a1,1,0,0,1,0-2h6.914a1,1,0,0,1,0,2Z" transform="translate(-2210.061 -1779.473)"/></g><g transform="translate(10.833 25.528)"><path class="c" d="M2230.48,1794.126a1.006,1.006,0,0,1-.292-.044l-6.427-1.96-6.629,1.963a1,1,0,0,1-.748-.073l-4.083-2.136a1,1,0,1,1,.928-1.772l3.723,1.948,6.529-1.933a1.008,1.008,0,0,1,.576,0l6.342,1.933,7.922-3.8a1,1,0,0,1,.866,1.8l-8.275,3.969A.99.99,0,0,1,2230.48,1794.126Z" transform="translate(-2211.765 -1788.155)"/></g><g transform="translate(8.65 25.799)"><circle class="c" cx="1.921" cy="1.921" r="1.921"/></g><g transform="translate(14.067 28.451)"><circle class="c" cx="1.921" cy="1.921" r="1.921"/></g><g transform="translate(20.913 26.531)"><circle class="c" cx="1.921" cy="1.921" r="1.921"/></g><g transform="translate(27.52 28.451)"><circle class="c" cx="1.921" cy="1.921" r="1.921"/></g><g transform="translate(36.378 24.336)"><circle class="c" cx="1.921" cy="1.921" r="1.921"/></g><g transform="translate(21.833 20.136)"><path class="b" d="M2238.425,1784.763h-14.66a1,1,0,0,1,0-2h14.66a1,1,0,0,1,0,2Z" transform="translate(-2222.765 -1782.763)"/></g><g transform="translate(21.833 22.95)"><path class="b" d="M2232.293,1787.577h-8.528a1,1,0,0,1,0-2h8.528a1,1,0,0,1,0,2Z" transform="translate(-2222.765 -1785.577)"/></g></g></g></svg>
                         </div>
                         <h4>Social Media Marketing</h4>
                      </div>
                   </li>
                   <li>
                      <div class="service-panel-icon">
                         <div class="icon">

                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#030504;}.c{fill:#e30613;}</style></defs><g transform="translate(-1582 -465)"><rect class="a" width="60" height="60" transform="translate(1582 465)"/><g transform="translate(1588 483.035)"><path class="b" d="M2449.408,187.887H2409.36a3.474,3.474,0,0,1-3.47-3.47V161.41a3.012,3.012,0,0,1,1.337-2.506l3.709-2.487a1,1,0,0,1,1.113,1.661l-3.709,2.487a1.015,1.015,0,0,0-.45.845v23.007a1.471,1.471,0,0,0,1.47,1.47h40.048a1.471,1.471,0,0,0,1.47-1.47v-23.05a.967.967,0,0,0-.418-.8L2447,158.185a1,1,0,1,1,1.135-1.646l3.461,2.386a2.962,2.962,0,0,1,1.283,2.442v23.05A3.474,3.474,0,0,1,2449.408,187.887Z" transform="translate(-2405.89 -156.247)"/></g><g transform="translate(1613.623 499.595)"><path class="b" d="M2450.859,187.407a1,1,0,0,1-.566-.176l-18.347-12.6a1,1,0,0,1,1.133-1.648l18.347,12.6a1,1,0,0,1-.567,1.824Z" transform="translate(-2431.513 -172.807)"/></g><g transform="translate(1588.746 499.595)"><path class="b" d="M2407.637,187.182a1,1,0,0,1-.546-1.838l19.042-12.375a1,1,0,1,1,1.09,1.676l-19.042,12.376A1,1,0,0,1,2407.637,187.182Z" transform="translate(-2406.635 -172.807)"/></g><g transform="translate(1588.746 486.788)"><path class="b" d="M2429.383,176.471a1,1,0,0,1-.553-.167l-21.748-14.472a1,1,0,1,1,1.108-1.665l21.748,14.471a1,1,0,0,1-.555,1.833Z" transform="translate(-2406.635 -160)"/></g><g transform="translate(1610.493 486.32)"><path class="b" d="M2429.385,176.471a1,1,0,0,1-.558-1.831l22.3-14.938a1,1,0,1,1,1.113,1.662l-22.3,14.938A1,1,0,0,1,2429.385,176.471Z" transform="translate(-2428.383 -159.532)"/></g><g transform="translate(1597.422 473.65)"><path class="c" d="M2436.387,1130.371h-7.051a4.183,4.183,0,0,1-4.178-4.179v-1.552a4.183,4.183,0,0,1,4.178-4.179h7.051a.848.848,0,0,1,.849.849v8.213A.848.848,0,0,1,2436.387,1130.371Zm-7.051-8.213a2.484,2.484,0,0,0-2.481,2.481v1.552a2.484,2.484,0,0,0,2.481,2.481h6.2v-6.515Z" transform="translate(-2425.158 -1120.461)"/></g><g transform="translate(1607.802 469.258)"><path class="c" d="M2447.283,1134.422a.851.851,0,0,1-.4-.1l-9.045-4.836a.847.847,0,0,1-.448-.748v-8.213a.849.849,0,0,1,.478-.764l9.046-4.392a.848.848,0,0,1,1.219.763v17.44a.85.85,0,0,1-.849.849Zm-8.2-6.193,7.348,3.929V1117.49l-7.348,3.568Z" transform="translate(-2437.389 -1115.286)"/></g><g transform="translate(1616.847 467.272)"><path class="c" d="M2451.24,1136.362h-.436a2.76,2.76,0,0,1-2.757-2.757v-17.9a2.76,2.76,0,0,1,2.757-2.757h.436A2.76,2.76,0,0,1,2454,1115.7v17.9A2.76,2.76,0,0,1,2451.24,1136.362Zm-.436-21.718a1.062,1.062,0,0,0-1.06,1.06v17.9a1.062,1.062,0,0,0,1.06,1.06h.436a1.061,1.061,0,0,0,1.059-1.06v-17.9a1.061,1.061,0,0,0-1.059-1.06Z" transform="translate(-2448.047 -1112.946)"/></g><g transform="translate(1600.152 481.863)"><path class="c" d="M2432.471,1138.171a3.065,3.065,0,0,1-3-2.377l-1.076-4.614a.848.848,0,1,1,1.652-.386l1.076,4.613a1.38,1.38,0,0,0,2.724-.313v-4.107a.849.849,0,0,1,1.7,0v4.107A3.081,3.081,0,0,1,2432.471,1138.171Z" transform="translate(-2428.375 -1130.138)"/></g></g></svg>
                         </div>
                         <h4>Email Marketing</h4>
                      </div>
                   </li>
                   <li class="toggle-mobile">
                      <div class="service-panel-icon">
                         <div class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#1a1818;}.c{fill:#cc001b;}.d{fill:#040505;}.ba{fill:#e30613;}</style></defs><g transform="translate(-1382 -1192)"><g transform="translate(1505.329 1030.186)"><path class="a" d="M0,0H60V60H0Z" transform="translate(-123.329 161.814)"/><path class="b" d="M-96.705,210.411h-16.087a4.54,4.54,0,0,1-4.537-4.537V174.486a4.542,4.542,0,0,1,4.537-4.537h33.143a4.542,4.542,0,0,1,4.537,4.537v12.947h-2V174.486a2.538,2.538,0,0,0-2.537-2.537h-33.143a2.538,2.538,0,0,0-2.537,2.537v31.388a2.538,2.538,0,0,0,2.537,2.537h16.087Z"/><path class="b" d="M-112.4,206.7a1,1,0,0,1-1-1v-2.253a1,1,0,0,1,1-1,1,1,0,0,1,1,1V205.7A1,1,0,0,1-112.4,206.7Z"/><path class="ba" d="M-109.383,206.7a1,1,0,0,1-1-1v-2.253a1,1,0,0,1,1-1,1,1,0,0,1,1,1V205.7A1,1,0,0,1-109.383,206.7Z"/><path class="b" d="M-106.412,206.7a1,1,0,0,1-1-1v-2.253a1,1,0,0,1,1-1,1,1,0,0,1,1,1V205.7A1,1,0,0,1-106.412,206.7Z"/><path class="b" d="M-85.88,206.359h-8.308a4.929,4.929,0,0,1-4.924-4.923v-1.829a4.931,4.931,0,0,1,4.924-4.923h8.308a1,1,0,0,1,1,1v9.675A1,1,0,0,1-85.88,206.359Zm-8.308-9.675a2.928,2.928,0,0,0-2.924,2.923v1.829a2.928,2.928,0,0,0,2.924,2.923h7.308v-7.675Z"/><path class="b" d="M-75.222,212.058a1,1,0,0,1-.472-.119l-10.658-5.7a1,1,0,0,1-.528-.882v-9.675a1,1,0,0,1,.563-.9l10.658-5.176a1,1,0,0,1,1.336.463.99.99,0,0,1,.1.437v20.55a1,1,0,0,1-1,1Zm-9.658-7.3,8.658,4.629V192.1l-8.658,4.2Z"/><path class="b" d="M-72.46,214.759h-.513a3.252,3.252,0,0,1-3.249-3.248V190.417a3.252,3.252,0,0,1,3.249-3.248h.513a3.252,3.252,0,0,1,3.248,3.248v21.094A3.252,3.252,0,0,1-72.46,214.759Zm-.513-25.59a1.25,1.25,0,0,0-1.249,1.248v21.094a1.25,1.25,0,0,0,1.249,1.248h.513a1.25,1.25,0,0,0,1.248-1.248V190.417a1.25,1.25,0,0,0-1.248-1.248Z"/><path class="b" d="M-91.067,213.826a3.609,3.609,0,0,1-3.53-2.8l-1.269-5.437a1,1,0,0,1,.773-1.184,1,1,0,0,1,1.174.729l1.269,5.437a1.625,1.625,0,0,0,1.954,1.211,1.627,1.627,0,0,0,1.255-1.58v-4.841a1,1,0,0,1,1-1,1,1,0,0,1,1,1V210.2A3.631,3.631,0,0,1-91.067,213.826Z"/><path class="b" d="M-85.88,210.411h-2.563a1,1,0,0,1-1-1,1,1,0,0,1,1-1h2.563a1,1,0,0,1,1,1A1,1,0,0,1-85.88,210.411Z"/><path class="ba" d="M-93.783,182a.7.7,0,0,0-.687-.568H-102.7a.7.7,0,0,0-.7.7v3.391a.7.7,0,0,0,.7.7h3.437a4.437,4.437,0,0,1-1.4,1.307,4.392,4.392,0,0,1-2.22.6,4.419,4.419,0,0,1-4.119-2.854,4.367,4.367,0,0,1-.278-1.543,4.407,4.407,0,0,1,.237-1.429,4.4,4.4,0,0,1,4.16-2.968,4.378,4.378,0,0,1,2.324.665.7.7,0,0,0,.813-.052l2.777-2.274a.7.7,0,0,0,.256-.538.7.7,0,0,0-.253-.54,9.276,9.276,0,0,0-5.917-2.135,9.282,9.282,0,0,0-9.271,9.271,9.285,9.285,0,0,0,1.105,4.394A9.268,9.268,0,0,0-102.892,193a9.284,9.284,0,0,0,5.871-2.1,9.3,9.3,0,0,0,3.2-5.239,9.357,9.357,0,0,0,.2-1.936A9.273,9.273,0,0,0-93.783,182Zm-1.408,3.377a7.906,7.906,0,0,1-7.7,6.228,7.873,7.873,0,0,1-6.936-4.142,7.891,7.891,0,0,1-.938-3.731,7.882,7.882,0,0,1,7.874-7.873,7.883,7.883,0,0,1,4.335,1.3l-1.714,1.4a5.78,5.78,0,0,0-2.621-.626,5.8,5.8,0,0,0-5.482,3.911,5.785,5.785,0,0,0-.313,1.883,5.758,5.758,0,0,0,.368,2.034,5.822,5.822,0,0,0,5.427,3.761,5.794,5.794,0,0,0,2.927-.793,5.818,5.818,0,0,0,2.5-2.967.7.7,0,0,0-.08-.643.7.7,0,0,0-.574-.3H-102v-1.993h6.934a7.97,7.97,0,0,1,.052.9A7.933,7.933,0,0,1-95.191,185.374Z"/></g></g></svg>

                         </div>
                         <h4>Google Ads Agency</h4>
                      </div>
                   </li>
                   <li class="toggle">
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#1a1818;}.c{fill:#040505;}.d{fill:#cc001b;}</style></defs><g transform="translate(-1581 -2425)"><rect class="a" width="60" height="60" transform="translate(1581 2425)"/><g transform="translate(1587 2433.603)"><path class="b" d="M2427.36,1134.914h-16.087a4.542,4.542,0,0,1-4.537-4.537v-31.388a4.542,4.542,0,0,1,4.537-4.537h33.143a4.541,4.541,0,0,1,4.536,4.537v12.946h-2v-12.946a2.539,2.539,0,0,0-2.536-2.537h-33.143a2.539,2.539,0,0,0-2.537,2.537v31.388a2.539,2.539,0,0,0,2.537,2.537h16.087Z" transform="translate(-2406.736 -1094.452)"/></g><g transform="translate(1605.422 2452.097)"><g transform="translate(0 7.515)"><path class="b" d="M2438.389,1132.138h-8.308a4.929,4.929,0,0,1-4.923-4.924v-1.829a4.929,4.929,0,0,1,4.923-4.924h8.308a1,1,0,0,1,1,1v9.677A1,1,0,0,1,2438.389,1132.138Zm-8.308-9.677a2.927,2.927,0,0,0-2.923,2.924v1.829a2.927,2.927,0,0,0,2.923,2.924h7.308v-7.677Z" transform="translate(-2425.158 -1120.461)"/></g><g transform="translate(12.231 2.34)"><path class="b" d="M2449.047,1137.835a1,1,0,0,1-.472-.118l-10.658-5.7a1,1,0,0,1-.528-.881v-9.677a1,1,0,0,1,.563-.9l10.659-5.175a1,1,0,0,1,1.436.9v20.55a1,1,0,0,1-1,1Zm-9.658-7.3,8.658,4.629v-17.284l-8.658,4.2Z" transform="translate(-2437.389 -1115.286)"/></g><g transform="translate(22.889)"><path class="b" d="M2451.809,1140.537h-.513a3.252,3.252,0,0,1-3.249-3.249v-21.093a3.252,3.252,0,0,1,3.249-3.249h.513a3.252,3.252,0,0,1,3.248,3.249v21.093A3.252,3.252,0,0,1,2451.809,1140.537Zm-.513-25.591a1.251,1.251,0,0,0-1.249,1.249v21.093a1.251,1.251,0,0,0,1.249,1.249h.513a1.25,1.25,0,0,0,1.248-1.249v-21.093a1.25,1.25,0,0,0-1.248-1.249Z" transform="translate(-2448.047 -1112.946)"/></g><g transform="translate(3.218 17.192)"><path class="c" d="M2433.2,1139.6a3.611,3.611,0,0,1-3.531-2.8l-1.268-5.437a1,1,0,1,1,1.947-.455l1.268,5.436a1.626,1.626,0,0,0,3.21-.369v-4.839a1,1,0,0,1,2,0v4.839A3.631,3.631,0,0,1,2433.2,1139.6Z" transform="translate(-2428.375 -1130.138)"/></g><g transform="translate(9.669 21.242)"><path class="b" d="M2438.389,1136.188h-2.562a1,1,0,0,1,0-2h2.562a1,1,0,0,1,0,2Z" transform="translate(-2434.827 -1134.188)"/></g></g><g transform="translate(1594.717 2447.73)"><path class="d" d="M2420.3,1108.579h-5.06a.788.788,0,0,0-.788.788v16.869a.788.788,0,0,0,.788.788h5.06a.788.788,0,0,0,.788-.788v-16.869A.788.788,0,0,0,2420.3,1108.579Zm-.787,16.87h-3.486v-15.295h3.486Z" transform="translate(-2414.453 -1108.579)"/></g><g transform="translate(1594.717 2439.296)"><path class="d" d="M2417.771,1100.145a3.318,3.318,0,1,0,3.318,3.317A3.322,3.322,0,0,0,2417.771,1100.145Zm0,5.06a1.742,1.742,0,1,1,1.743-1.743A1.745,1.745,0,0,1,2417.771,1105.2Z" transform="translate(-2414.453 -1100.145)"/></g><g transform="translate(1603.152 2447.619)"><g transform="translate(5.061 4.751)"><path class="d" d="M2435.428,1116.958a3.746,3.746,0,0,0-4.525-3.659,3.809,3.809,0,0,0-2.954,3.767v.387a.788.788,0,0,0,.787.788h0a.788.788,0,0,0,.788-.788v-.367a2.253,2.253,0,0,1,1.939-2.281,2.167,2.167,0,0,1,2.39,2.153v.361a.788.788,0,0,0,.788.788h0a.787.787,0,0,0,.787-.788Z" transform="translate(-2427.949 -1113.219)"/></g><path class="d" d="M2437.92,1110.378a7.447,7.447,0,0,0-8.4-1.082.788.788,0,0,0-.785-.717h-5.061a.787.787,0,0,0-.787.788v13.362a.787.787,0,0,0,.787.788h0a.788.788,0,0,0,.788-.788v-12.575h3.486v.582a.787.787,0,0,0,1.28.614,5.911,5.911,0,0,1,4.043-1.3,6.106,6.106,0,0,1,5.642,6.176v-.094a.788.788,0,0,0,.788.787h0a.788.788,0,0,0,.787-.787v.18A7.9,7.9,0,0,0,2437.92,1110.378Z" transform="translate(-2422.888 -1108.468)"/></g></g></svg>
                         </div>
                         <h4>LinkedIn Marketing Agency</h4>
                      </div>
                   </li>
                   <li class="toggle">
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{opacity:0;}.b{fill:#e30613;}</style></defs><g transform="translate(-1037 -2719)"><g transform="translate(1160.329 2670.186)"><path class="a" d="M0,0H60V60H0Z" transform="translate(-123.329 48.814)"/><path class="ba" d="M-98.714,74.734a1.37,1.37,0,0,0,1.369-1.445,1.424,1.424,0,0,0-1.447-1.3H-101.8V68.22a2.743,2.743,0,0,1,2.743-2.743h.608A1.424,1.424,0,0,0-97,64.179a1.372,1.372,0,0,0-1.369-1.445h-.686a5.486,5.486,0,0,0-5.486,5.486v3.771h-3.008a1.424,1.424,0,0,0-1.447,1.3,1.372,1.372,0,0,0,1.369,1.445h3.086v10.56a1.372,1.372,0,0,0,1.372,1.372h0a1.371,1.371,0,0,0,1.371-1.372V74.734Z"/><path d="M-96.705,97.411h-16.087a4.54,4.54,0,0,1-4.537-4.537V61.486a4.542,4.542,0,0,1,4.537-4.537h33.143a4.542,4.542,0,0,1,4.537,4.537V74.433h-2V61.486a2.538,2.538,0,0,0-2.537-2.537h-33.143a2.538,2.538,0,0,0-2.537,2.537V92.874a2.538,2.538,0,0,0,2.537,2.537h16.087Z"/><path d="M-112.4,93.7a1,1,0,0,1-1-1V90.451a1,1,0,0,1,1-1,1,1,0,0,1,1,1V92.7A1,1,0,0,1-112.4,93.7Z"/><path class="ba" d="M-109.383,93.7a1,1,0,0,1-1-1V90.451a1,1,0,0,1,1-1,1,1,0,0,1,1,1V92.7A1,1,0,0,1-109.383,93.7Z"/><path d="M-106.412,93.7a1,1,0,0,1-1-1V90.451a1,1,0,0,1,1-1,1,1,0,0,1,1,1V92.7A1,1,0,0,1-106.412,93.7Z"/><path d="M-85.88,93.359h-8.308a4.929,4.929,0,0,1-4.924-4.923V86.607a4.931,4.931,0,0,1,4.924-4.923h8.308a1,1,0,0,1,1,1v9.675A1,1,0,0,1-85.88,93.359Zm-8.308-9.675a2.928,2.928,0,0,0-2.924,2.923v1.829a2.928,2.928,0,0,0,2.924,2.923h7.308V83.684Z"/><path d="M-75.222,99.058a1,1,0,0,1-.472-.119l-10.658-5.7a1,1,0,0,1-.528-.882V82.682a1,1,0,0,1,.563-.9l10.658-5.176a1,1,0,0,1,1.336.463.99.99,0,0,1,.1.437v20.55a1,1,0,0,1-1,1Zm-9.658-7.3,8.658,4.629V79.105l-8.658,4.2Z"/><path d="M-72.46,101.759h-.513a3.252,3.252,0,0,1-3.249-3.248V77.417a3.252,3.252,0,0,1,3.249-3.248h.513a3.252,3.252,0,0,1,3.248,3.248V98.511A3.252,3.252,0,0,1-72.46,101.759Zm-.513-25.59a1.25,1.25,0,0,0-1.249,1.248V98.511a1.25,1.25,0,0,0,1.249,1.248h.513a1.25,1.25,0,0,0,1.248-1.248V77.417a1.25,1.25,0,0,0-1.248-1.248Z"/><path d="M-91.067,100.826a3.609,3.609,0,0,1-3.53-2.8l-1.269-5.437a1,1,0,0,1,.773-1.184,1,1,0,0,1,1.174.729l1.269,5.437A1.625,1.625,0,0,0-90.7,98.782a1.627,1.627,0,0,0,1.255-1.58V92.361a1,1,0,0,1,1-1,1,1,0,0,1,1,1V97.2A3.631,3.631,0,0,1-91.067,100.826Z"/><path d="M-85.88,97.411h-2.563a1,1,0,0,1-1-1,1,1,0,0,1,1-1h2.563a1,1,0,0,1,1,1A1,1,0,0,1-85.88,97.411Z"/><path d="M-92.151,73.974a1.742,1.742,0,0,0-1.741,1.743,1.741,1.741,0,0,0,1.743,1.741,1.742,1.742,0,0,0,1.741-1.741A1.745,1.745,0,0,0-92.151,73.974Z"/></g></g></svg>
                         </div>
                         <h4>Facebook Ads Agency</h4>
                      </div>
                   </li>
                   <li class="toggle">
                      <div class="service-panel-icon">
                         <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60"><defs><style>.a{fill:#fff;opacity:0;}.b{fill:#1a1818;}.c{fill:#cc001b;}.d{fill:#040505;}</style></defs><g transform="translate(-1277 -2425)"><rect class="a" width="60" height="60" transform="translate(1277 2425)"/><g transform="translate(1283 2435.135)"><path class="b" d="M2223.107,1136.446H2207.02a4.542,4.542,0,0,1-4.537-4.537v-31.388a4.542,4.542,0,0,1,4.537-4.537h33.143a4.542,4.542,0,0,1,4.537,4.537v12.947h-2v-12.947a2.539,2.539,0,0,0-2.537-2.537H2207.02a2.539,2.539,0,0,0-2.537,2.537v31.388a2.539,2.539,0,0,0,2.537,2.537h16.087Z" transform="translate(-2202.483 -1095.984)"/></g><g transform="translate(1286.625 2449.32)"><path class="c" d="M2213.4,1112.169h-6.293a1,1,0,0,1,0-2h6.293a1,1,0,0,1,0,2Z" transform="translate(-2206.108 -1110.169)"/></g><g transform="translate(1286.924 2467.637)"><path class="c" d="M2207.407,1132.739a1,1,0,0,1-1-1v-2.253a1,1,0,0,1,2,0v2.253A1,1,0,0,1,2207.407,1132.739Z" transform="translate(-2206.407 -1128.486)"/></g><g transform="translate(1289.946 2467.637)"><path class="b" d="M2210.429,1132.739a1,1,0,0,1-1-1v-2.253a1,1,0,0,1,2,0v2.253A1,1,0,0,1,2210.429,1132.739Z" transform="translate(-2209.429 -1128.486)"/></g><g transform="translate(1292.918 2467.637)"><path class="c" d="M2213.4,1132.739a1,1,0,0,1-1-1v-2.253a1,1,0,0,1,2,0v2.253A1,1,0,0,1,2213.4,1132.739Z" transform="translate(-2212.401 -1128.486)"/></g><g transform="translate(1313.449 2449.32)"><path class="c" d="M2240.082,1112.169h-6.15a1,1,0,0,1,0-2h6.15a1,1,0,0,1,0,2Z" transform="translate(-2232.932 -1110.169)"/></g><g transform="translate(1291.612 2443.77)"><path class="c" d="M2218.819,1128.577a.987.987,0,0,1-.415-.091,12.5,12.5,0,1,1,17.684-11.371,1,1,0,0,1-2,0,10.5,10.5,0,1,0-14.853,9.553,1,1,0,0,1-.416,1.909Z" transform="translate(-2211.095 -1104.619)"/></g><g transform="translate(1301.218 2452.355)"><g transform="translate(0 7.515)"><path class="b" d="M2233.932,1132.394h-8.308a4.928,4.928,0,0,1-4.923-4.923v-1.829a4.929,4.929,0,0,1,4.923-4.923h8.308a1,1,0,0,1,1,1v9.675A1,1,0,0,1,2233.932,1132.394Zm-8.308-9.675a2.927,2.927,0,0,0-2.923,2.923v1.829a2.927,2.927,0,0,0,2.923,2.923h7.308v-7.675Z" transform="translate(-2220.701 -1120.719)"/></g><g transform="translate(12.231 2.339)"><path class="b" d="M2244.59,1138.093a.992.992,0,0,1-.472-.119l-10.658-5.7a1,1,0,0,1-.528-.882v-9.675a1,1,0,0,1,.563-.9l10.658-5.176a1,1,0,0,1,1.437.9v20.55a1,1,0,0,1-1,1Zm-9.658-7.3,8.658,4.629V1118.14l-8.658,4.2Z" transform="translate(-2232.932 -1115.543)"/></g><g transform="translate(22.889)"><path class="b" d="M2247.352,1140.794h-.513a3.252,3.252,0,0,1-3.249-3.248v-21.094a3.252,3.252,0,0,1,3.249-3.248h.513a3.252,3.252,0,0,1,3.248,3.248v21.094A3.252,3.252,0,0,1,2247.352,1140.794Zm-.513-25.59a1.25,1.25,0,0,0-1.249,1.248v21.094a1.25,1.25,0,0,0,1.249,1.248h.513a1.25,1.25,0,0,0,1.248-1.248v-21.094a1.249,1.249,0,0,0-1.248-1.248Z" transform="translate(-2243.59 -1113.204)"/></g><g transform="translate(3.218 17.19)"><path class="d" d="M2228.744,1139.861a3.61,3.61,0,0,1-3.53-2.8l-1.269-5.437a1,1,0,0,1,1.947-.455l1.269,5.437a1.626,1.626,0,0,0,3.209-.369v-4.841a1,1,0,0,1,2,0v4.841A3.631,3.631,0,0,1,2228.744,1139.861Z" transform="translate(-2223.918 -1130.394)"/></g><g transform="translate(9.669 21.242)"><path class="b" d="M2233.932,1136.446h-2.562a1,1,0,0,1,0-2h2.562a1,1,0,0,1,0,2Z" transform="translate(-2230.37 -1134.446)"/></g></g><g transform="translate(1304.435 2450.16)"><path class="c" d="M2227.661,1118.494a3.742,3.742,0,1,1,3.743-3.742A3.747,3.747,0,0,1,2227.661,1118.494Zm0-5.485a1.742,1.742,0,1,0,1.743,1.743A1.745,1.745,0,0,0,2227.661,1113.009Z" transform="translate(-2223.918 -1111.009)"/></g><g transform="translate(1314.605 2440.026)"><path class="c" d="M2239.212,1106.619h-4.124a1,1,0,0,1-1-1v-3.744a1,1,0,0,1,1-1h4.124a1,1,0,0,1,1,1v3.744A1,1,0,0,1,2239.212,1106.619Zm-3.124-2h2.124v-1.744h-2.124Z" transform="translate(-2234.088 -1100.875)"/></g></g></svg>
                         </div>
                         <h4>Instagram Ads Agency</h4>
                      </div>
                   </li>
                </ul>
             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <div class="panel-btn">
                   <button class="btn btn-brand btn-grid-toggle">Load More</button>
                </div>
             </div>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-proof bg-light">
       <div class="container container-xxl">
          <div class="row">
             <div class="col-12">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'section_8_title' ); ?></h2>
                   <p><?php the_field( 'section_8_description' ); ?></p>
                </div>
             </div>
          </div>
          <div id="project-terms">
        <a id="all" class="btn btn-default active" href="#">All</a>
        <?php $tags = get_terms( array(
        'taxonomy' => 'casestudy_cat',
        'hide_empty' => false
          ) ); ?>
        <?php foreach ($tags as $tag) { ?>
          <a id="f-<?php echo $tag->slug; ?>" class="btn btn-default" href="#"><?php echo $tag->name; ?></a>
        <?php } ?>

    </div>
          <div class="rows row-expert owl-carousel">
            <?php
           $New = new WP_Query(array('post_type' => 'mrd_case_study','posts_per_page'=> -1, 'order'=>'ASC',));
           $i = 1;
           while ($New->have_posts()) : $New->the_post();
           $class = "";
           $terms = wp_get_post_terms( $post->ID, $taxonomy = 'casestudy_cat', $args = array('fields'=>'all') );
           foreach ($terms as $terms) {
             $class .= ' f-' . $terms->slug;
           }
           ?>

             <div class="cols-lg-6 project<?php echo $class; ?>">
                <div class="expert-work-panel">
                  <a href="<?php the_field( 'link_url' ); ?>" target="_blank" class="panel_link"></a>
                   <div class="panel-media">
                     <?php the_post_thumbnail( 'full' ); ?>
                   </div>
                   <div class="panel-content">
                      <h4><?php the_title(); ?></h4>
                        <p><?php the_content(  ); ?></p>
                   </div>
                </div>
             </div>
           <?php endwhile; wp_reset_query(); ?>


          </div>
          <div id="projects-hidden" class="hide d-none"></div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-team">
       <div class="container container-xxl">
          <div class="row">
             <div class="col-xl-9 col-lg-10 mx-auto">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'section_9_title' ); ?></h2>
                   <p><?php the_field( 'section_9_description' ); ?></p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <div id="teamCarousel" class="owl-carousel team-carousel">
                  <?php
                 $New = new WP_Query(array('post_type' => 'mrd_team','posts_per_page'=> -1, 'order'=>'ASC',));
                 $i = 1;
                 while ($New->have_posts()) : $New->the_post();?>
                   <div class="item">
                      <div class="team-panel">
                         <div class="panel-media"><?php the_post_thumbnail('team'); ?></div>
                         <div class="panel-content">
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_field( 'position' ); ?></p>
                         </div>
                      </div>
                   </div>
                 <?php endwhile;?>
                 <?php wp_reset_query(); ?>

                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <div class="panel-btn">
                   <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested" data-toggle="modal" data-target=".apply-modal"><?php the_field( 'section_9_button_text' ); ?></a>
                </div>
             </div>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-partners bg-light">
       <div class="container">
          <div class="row">
             <div class="col-12">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'section_10_title' ); ?></h2>
                   <p><?php the_field( 'section_10_desc' ); ?></p>
                </div>
             </div>
          </div>
          <div class="row">
            <?php if ( have_rows( 'certificate_section_ten_grid_1' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_1' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_2' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_2' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_3' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_3' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_4' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_4' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_5' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_5' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_6' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_6' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_7' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_7' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_8' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_8' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_9' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_9' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_10' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_10' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_11' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_11' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
            <?php if ( have_rows( 'certificate_section_ten_grid_12' ) ) : ?>
            	<?php while ( have_rows( 'certificate_section_ten_grid_12' ) ) : the_row(); ?>
                <div class="col-lg-3 col-sm-4 col-6">
                   <div class="certificate-panel">
                     <?php $icon = get_sub_field( 'icon' ); ?>
                 		<?php $size = 'full'; ?>
                 		<?php if ( $icon ) : ?>
                 			<?php echo wp_get_attachment_image( $icon, $size ); ?>
                 		<?php endif; ?>
                   </div>
                </div>
            	<?php endwhile; ?>
            <?php endif; ?>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-company-special bg-light">
       <div class="container container-xxl">
          <div class="row">
             <div class="col-xl-10 mx-auto">
                <div class="panel-content">
                   <div class="title-panel">
                      <h2 class="main-title"><?php the_field( 'section_11_title' ); ?></h2>
                      <p><?php the_field( 'section_11_subtitle' ); ?></p>
                   </div>
                   <p><?php the_field( 'section_11_description' ); ?></p>
                </div>
             </div>
          </div>
       </div>
       <div class="carousel-frame">
          <div class="owl-carousel portfolio-carousel">
            <?php for ($i=1; $i < 7; $i++) {

            ?>
            <?php if ( have_rows( 'carousel_slide_section_11_' . $i ) ) : ?>
            	<?php while ( have_rows( 'carousel_slide_section_11_' . $i ) ) : the_row(); ?>
                <?php $slide_image = get_sub_field( 'slide_image' ); ?>
                <?php if($slide_image) : ?>
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
              <?php endif; ?>
            	<?php endwhile; ?>
            <?php endif; ?>
          <?php } ?>

          </div>
       </div>
       <div class="panel-btn">
          <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested" data-toggle="modal" data-target=".apply-modal"><?php the_field( 'section_11_button_text' ); ?></a>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-video-testimonial">
       <div class="container container-xxl">
          <div class="row">
             <div class="col-lg-10 mx-auto">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'section_12_title' ); ?></h2>
                   <p><?php the_field( 'section_12_description' ); ?></p>
                </div>
             </div>
          </div>
          <div class="row row-video-panel">
             <div class="col-lg-6 mx-auto">
                <div class="video-panel">
                   <div class="embed-responsive embed-responsive-16by9">
                     <?php if ( have_rows( 'testimonial_1' ) ) : ?>
                     <?php while ( have_rows( 'testimonial_1' ) ) : the_row(); ?>
                       <?php the_sub_field( 'testimonial_video' ); ?>
                     <?php endwhile; ?>
                    <?php endif; ?>
                   </div>
                </div>
             </div>
             <div class="col-lg-6">
                <div class="video-panel">
                   <div class="embed-responsive embed-responsive-16by9">
                     <?php if ( have_rows( 'testimonial_2' ) ) : ?>
                     <?php while ( have_rows( 'testimonial_2' ) ) : the_row(); ?>
                       <?php the_sub_field( 'testimonial_video' ); ?>
                     <?php endwhile; ?>
                    <?php endif; ?>
                   </div>
                </div>
             </div>
             <?php if ( have_rows( 'testimonial_3' ) ) : ?>
             <?php while ( have_rows( 'testimonial_3' ) ) : the_row(); ?>
               <?php if(get_sub_field( 'testimonial_video' )) {?>
             <div class="col-lg-6">
                <div class="video-panel">
                   <div class="embed-responsive embed-responsive-16by9">

                       <?php the_sub_field( 'testimonial_video' ); ?>

                   </div>
                </div>
             </div>
           <?php } ?>
           <?php endwhile; ?>
          <?php endif; ?>
             <?php if ( have_rows( 'testimonial_4' ) ) : ?>
             <?php while ( have_rows( 'testimonial_4' ) ) : the_row(); ?>
               <?php if(get_sub_field( 'testimonial_video' )) {?>
             <div class="col-lg-6">
                <div class="video-panel">
                   <div class="embed-responsive embed-responsive-16by9">

                       <?php the_sub_field( 'testimonial_video' ); ?>

                   </div>
                </div>
             </div>
           <?php } ?>
           <?php endwhile; ?>
          <?php endif; ?>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <section class="section-process">
       <div class="container">
          <div class="row">
             <div class="col-12">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'section_13_title' ); ?></h2>
                   <p><?php the_field( 'section_13_desc' ); ?></p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-12 process-list">
               <?php if ( have_rows( 'sec_13_process_item_1' ) ) : ?>
              	<?php while ( have_rows( 'sec_13_process_item_1' ) ) : the_row(); ?>
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="panel-img">
                          <?php $image = get_sub_field( 'image' ); ?>
                         <?php $size = 'full'; ?>
                         <?php if ( $image ) : ?>
                           <?php echo wp_get_attachment_image( $image, $size ); ?>
                         <?php endif; ?>
                           <div class="triangle-bottom-right"><span class="num">1</span></div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="panel-txt">
                           <h4><?php the_sub_field( 'title' ); ?></h4>
                           <p><?php the_sub_field( 'content' ); ?></p>
                        </div>
                     </div>
                  </div>
              	<?php endwhile; ?>
              <?php endif; ?>
               <?php if ( have_rows( 'sec_13_process_item_2' ) ) : ?>
              	<?php while ( have_rows( 'sec_13_process_item_2' ) ) : the_row(); ?>
                  <div class="row flex-row-reverse align-items-center">
                     <div class="col-lg-6">
                        <div class="panel-img">
                          <?php $image = get_sub_field( 'image' ); ?>
                         <?php $size = 'full'; ?>
                         <?php if ( $image ) : ?>
                           <?php echo wp_get_attachment_image( $image, $size ); ?>
                         <?php endif; ?>
                           <div class="triangle-bottom-right"><span class="num">2</span></div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="panel-txt">
                           <h4><?php the_sub_field( 'title' ); ?></h4>
                           <p><?php the_sub_field( 'content' ); ?></p>
                        </div>
                     </div>
                  </div>
              	<?php endwhile; ?>
              <?php endif; ?>
               <?php if ( have_rows( 'sec_13_process_item_3' ) ) : ?>
              	<?php while ( have_rows( 'sec_13_process_item_3' ) ) : the_row(); ?>
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="panel-img">
                          <?php $image = get_sub_field( 'image' ); ?>
                         <?php $size = 'full'; ?>
                         <?php if ( $image ) : ?>
                           <?php echo wp_get_attachment_image( $image, $size ); ?>
                         <?php endif; ?>
                           <div class="triangle-bottom-right"><span class="num">3</span></div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="panel-txt">
                           <h4><?php the_sub_field( 'title' ); ?></h4>
                           <p><?php the_sub_field( 'content' ); ?></p>
                        </div>
                     </div>
                  </div>
              	<?php endwhile; ?>
              <?php endif; ?>
               <?php if ( have_rows( 'sec_13_process_item_4' ) ) : ?>
              	<?php while ( have_rows( 'sec_13_process_item_4' ) ) : the_row(); ?>
                  <div class="row flex-row-reverse align-items-center">
                     <div class="col-lg-6">
                        <div class="panel-img">
                          <?php $image = get_sub_field( 'image' ); ?>
                         <?php $size = 'full'; ?>
                         <?php if ( $image ) : ?>
                           <?php echo wp_get_attachment_image( $image, $size ); ?>
                         <?php endif; ?>
                           <div class="triangle-bottom-right"><span class="num">4</span></div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="panel-txt">
                           <h4><?php the_sub_field( 'title' ); ?></h4>
                           <p><?php the_sub_field( 'content' ); ?></p>
                        </div>
                     </div>
                  </div>
              	<?php endwhile; ?>
              <?php endif; ?>
              <?php if ( have_rows( 'sec_13_process_item_5' ) ) : ?>
               <?php while ( have_rows( 'sec_13_process_item_5' ) ) : the_row(); ?>
                 <div class="row align-items-center">
                    <div class="col-lg-6">
                       <div class="panel-img">
                         <?php $image = get_sub_field( 'image' ); ?>
                        <?php $size = 'full'; ?>
                        <?php if ( $image ) : ?>
                          <?php echo wp_get_attachment_image( $image, $size ); ?>
                        <?php endif; ?>
                          <div class="triangle-bottom-right"><span class="num">5</span></div>
                       </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="panel-txt">
                          <h4><?php the_sub_field( 'title' ); ?></h4>
                          <p><?php the_sub_field( 'content' ); ?></p>
                       </div>
                    </div>
                 </div>
               <?php endwhile; ?>
             <?php endif; ?>

             </div>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <!-- #section *-->
    <section class="section-profit-calc-banner">
       <div class="container">
          <div class="row">
             <div class="col-xl-12 mx-auto">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'section_14_title' ); ?></h2>
                   <p><?php the_field( 'section_14_content' ); ?></p>
                </div>
                <a href="#sectionCalculate" class="btn btn-brand btn-brand-white has-arrow">Calculate</a>
             </div>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?>
    <!-- #section *-->







    <section class="section-faq">
       <div class="container container-xxl">
          <div class="row">
             <div class="col-xl-8 col-lg-10 mx-auto">
                <div class="title-panel">
                   <h2 class="main-title"><?php the_field( 'faq_section_title' ); ?></h2>
                   <p><?php the_field( 'faq_section_description' ); ?></p>
                </div>

             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <div id="faqAccordion" class="accordion accordion-alt">
                   <div class="card">
                      <div class="card-header" id="headingOne">
                         <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">
                              <?php the_field( 'faq_question_1' ); ?>
                               <span class="rotate-icon"><img src="<?php echo ISSPATH ?>/img/icon-plus.svg" alt="icon"></span>
                            </button>
                         </h2>
                      </div>
                      <div id="faq1" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                         <div class="card-body">
                            <p><?php the_field( 'faq_answer_1' ); ?></p>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header" id="headingTwo">
                         <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq2" aria-expanded="false" aria-controls="faq2">
                               <?php the_field( 'faq_question_2' ); ?>
                               <span class="rotate-icon"><img src="<?php echo ISSPATH ?>/img/icon-plus.svg" alt="icon"></span>
                            </button>
                         </h2>
                      </div>
                      <div id="faq2" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                         <div class="card-body">
                            <p><?php the_field( 'faq_answer_2' ); ?></p>
                         </div>
                      </div>
                   </div>





                   <div class="card">
                      <div class="card-header" id="headingThree">
                         <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3">
                               <?php the_field( 'faq_question_3' ); ?>
                               <span class="rotate-icon"><img src="<?php echo ISSPATH ?>/img/icon-plus.svg" alt="icon"></span>
                            </button>
                         </h2>
                      </div>
                      <div id="faq3" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                         <div class="card-body">
                          <p><?php the_field( 'faq_answer_3' ); ?></p>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header" id="headingFour">
                         <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq4" aria-expanded="false" aria-controls="faq4">
                               <?php the_field( 'faq_question_4' ); ?>
                               <span class="rotate-icon"><img src="<?php echo ISSPATH ?>/img/icon-plus.svg" alt="icon"></span>
                            </button>
                         </h2>
                      </div>
                      <div id="faq4" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                         <div class="card-body">
                            <p><?php the_field( 'faq_answer_4' ); ?></p>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header" id="headingFive">
                         <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq5" aria-expanded="false" aria-controls="faq5">
                              <?php the_field( 'faq_question_5' ); ?>
                               <span class="rotate-icon"><img src="<?php echo ISSPATH ?>/img/icon-plus.svg" alt="icon"></span>
                            </button>
                         </h2>
                      </div>
                      <div id="faq5" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                         <div class="card-body">
                            <p><?php the_field( 'faq_answer_5' ); ?></p>
                         </div>
                      </div>
                   </div>
                   <div class="card">
                      <div class="card-header" id="headingSix">
                         <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#faq6" aria-expanded="false" aria-controls="faq6">
                               <?php the_field( 'faq_question_6' ); ?>
                               <span class="rotate-icon"><img src="<?php echo ISSPATH ?>/img/icon-plus.svg" alt="icon"></span>
                            </button>
                         </h2>
                      </div>
                      <div id="faq6" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                         <div class="card-body">
                            <p><?php the_field( 'faq_answer_6' ); ?></p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>

    <?php wp_reset_query(); ?><section class="section-apply-banner bg-light">
       <div class="container">
          <div class="row">
             <div class="col-12 banner-col">
                <h2 class="main-title">What are <span class="brand-color">you waiting for?</span></h2>
                <?php wp_reset_query();
                  if(get_the_id() == 37){
                ?>
                <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested" data-toggle="modal" data-target=".apply-modal">I’m Interested</a>
              <?php } else{ ?>
                <a href="#" class="btn btn-brand has-arrow ms-track" data-ms-status="open" data-ms-annotation="iam-intrested" data-toggle="modal" data-target=".apply-modal">BOOK A CALL</a>
              <?php } ?>
             </div>
          </div>
       </div>
    </section>

  </div>
  <?php endif; ?>
<?php get_footer(); ?>
         <script type="text/javascript">
jQuery(document).ready(function(){
document.addEventListener( 'wpcf7mailsent', function( event ) {
  //Seo check list LP

if ( '6788' == event.detail.contactFormId ) {
location = '<?php echo get_permalink( 6784 ) ?>';
}
//LinkedIn Prospecting Checklist form
else if( '6716' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6777 ) ?>';
}
//Ideal Customer Checklist form
else if( '6715' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6760 ) ?>';
}
//Landing Page Optimisation Checklist
else if( '6713' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6757 ) ?>';
}
//Facebook Ads Checklist form
else if( '6417' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6748 ) ?>';
}
///Instagram
else if( '6690' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6781 ) ?>';
}
}, false );
});
</script>
