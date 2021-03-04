<?php 
$pageId = get_the_id();
$deliverResults = get_theme_mod('deliver_results'); ?>
    <section class="result-oriented grey">
        <div class="container">
            <div class="text-center">
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

            <?php 
            $vTestimIds = get_field('select_video_testimonials');
            $args = array( 'post_type' => 'testimonials_video', 'showposts' => 6 );
            if(!empty($vTestimIds))
                $args = array( 'post_type' => 'testimonials_video', 'post__in' => $vTestimIds );

            $testimonyQuery = new WP_Query($args);
            if($testimonyQuery->have_posts()): ?>
                <div class="result-slider owl-carousel">
                <?php while($testimonyQuery->have_posts()): $testimonyQuery->the_post(); ?>
                    <div class="item">
                        <div class="item-content mb-3">
                            <?php if( ! empty (get_field('thumbnail') ) ){
                                $thumbnail = get_field('thumbnail');
                                ?><img src="<?php echo $thumbnail['sizes']['video_testimonial_t']; ?>" alt=" " /><?php
                            }  
                            if(! empty(get_field('thumbnail')) ){?>
                            <div class="play-button">
                                <a href="#" class="btn-play" data-bs-toggle="modal" data-bs-target="#video-popup" data-id="<?php the_id(); ?>">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="86" viewBox="0 0 85 86">
                                      <g id="Group_12356" data-name="Group 12356" transform="translate(-0.4 0.024)">
                                        <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="42.5" cy="43" rx="42.5" ry="43" transform="translate(0.4 -0.024)" fill="#fff"/>
                                        <path id="Polygon_1" data-name="Polygon 1" d="M14.519,3.648a3,3,0,0,1,4.962,0L30.813,20.313A3,3,0,0,1,28.332,25H5.668a3,3,0,0,1-2.481-4.687Z" transform="translate(59.4 25.976) rotate(90)" fill="#e30613"/>
                                      </g>
                                    </svg>

                                </a>
                            </div>
                            <?php } ?>
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