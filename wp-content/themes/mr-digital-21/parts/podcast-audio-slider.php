<?php $args = array( 
	'post_type' => 'podcast', 
	'showposts' => 6,
	'tax_query' => array(
        array(
            'taxonomy' => 'podcast_type',
            'field'    => 'slug',
            'terms'    => 'audio',
        ),
    ),
);
$podcast = new WP_Query($args);
if($podcast->have_posts()): ?>

<div id="podcastCarousel" class="owl-carousel podcast-carousel">
	<?php while($podcast->have_posts()): $podcast->the_post(); ?>
	<div class="item">
		<div class="card podcast-card">
			<div class="card-media">
				<span class="badge rounded-pill"><?php echo __('EPISODE ') . get_field('episode_number'); ?></span>
				<?php echo get_the_post_thumbnail(get_the_id(), 'podcast_t'); ?>
				<a class="btn btn-play" href="<?php echo get_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/podcast-play.svg" alt="icon"></a>
			</div>
			<div class="card-body">
				<h6 class="card-min-title"><?php the_title(); ?></h6>
				<!-- h4 class="card-title"><?php //the_content(); ?></h4> -->
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>