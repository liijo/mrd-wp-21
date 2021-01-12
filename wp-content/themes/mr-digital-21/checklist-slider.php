<?php $args = array( 'post_type' => 'mrd_checklist', 'showposts' => 6 );
$checkList = new WP_Query($args);
if($checkList->have_posts()): ?>
	<div class="checklist-slider owl-carousel mt-5">
		<?php while($checkList->have_posts()): $checkList->the_post(); ?>
        <div class="item">
            <div class="wrap">
                <figure class="d-flex align-items-center mb-3">
                    <?php echo get_the_post_thumbnail(get_the_id(), 'full'); ?>
                </figure>
                <h4><?php the_title(); ?></h4>
                <p><?php echo substr(get_field('mrdchecklist_checklist_description'), 0, 60).'...'; ?></p>
            </div>
        </div>
    	<?php endwhile;?>
    </div>
<?php endif;
wp_reset_query();
?>