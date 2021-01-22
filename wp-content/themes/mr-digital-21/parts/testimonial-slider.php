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
                                <a href="#" class="btn-play">
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