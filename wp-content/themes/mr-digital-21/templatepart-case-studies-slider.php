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
               <a href="<?php echo get_permalink(); ?>"><?php echo __('LEARN MORE'); ?></a>
           </div>
       <?php endwhile;?>
   </div>
<?php endif;
wp_reset_query();
?>