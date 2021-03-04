<?php $args = array( 'post_type' => 'mrd_checklist', 'showposts' => 6 );
$checkList = new WP_Query($args);
if($checkList->have_posts()): ?>
	<div class="checklist-slider owl-carousel">
		<?php while($checkList->have_posts()): $checkList->the_post(); ?>
        <div class="item">
            <div class="wrap">
                <figure class="d-flex align-items-center mb-3">
                    <?php echo get_the_post_thumbnail(get_the_id(), 'full'); ?>
                </figure>
                <h4 class="mb-4"><?php the_title(); ?></h4>
                <?php if(get_field('url')) :?>
                <p><a href="<?php echo get_field('url'); ?>" class="btn btn-primary rounded text-uppercase"><?php echo __('Download Checklist'); ?></a></p>
                <?php endif; ?>
            </div>
        </div>
    	<?php endwhile;?>
    </div>
<?php endif;
wp_reset_query();
?>