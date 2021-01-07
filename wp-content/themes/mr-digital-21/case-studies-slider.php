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
            <?php echo get_the_excerpt(); ?>
            <a href="<?php echo get_permalink(); ?>"><?php echo __('LEARN MORE'); ?></a>
        </div>
    	<?php endwhile;?>
    </div>
<?php endif;?>