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
    <?php 
    $args = array( 'post_type' => 'works', 'showposts' => 6 );
    $csIds = get_field('select_case_studies');
    if(!empty($csIds))
      $args = array( 'post_type' => 'works', 'post__in' => $csIds );
    $worksQuery = new WP_Query($args);
    if($worksQuery->have_posts()): ?>
       <div class="cs-slider owl-carousel">
          <?php while($worksQuery->have_posts()): $worksQuery->the_post(); ?>
            <div class="item">
              <figure class="rounded overflow-hidden">
                <?php echo get_the_post_thumbnail(get_the_id(), 'case_studies_t'); ?>
              </figure>  
               <h3><?php the_title(); ?></h3>
               <p><?php echo mrd_get_the_excerpt(110, get_the_id()); ?></p>
               <a href="#" class="btn btn-primary rounded launch-modal" data-bs-toggle="modal" data-bs-target="#csModal" data-id="<?php echo get_the_id(); ?>"><?php echo __('Read Case Study'); ?></a>
           </div>
       <?php endwhile;?>
   </div>
   <script> 
        
    </script> 
<?php endif;
wp_reset_query();
?>