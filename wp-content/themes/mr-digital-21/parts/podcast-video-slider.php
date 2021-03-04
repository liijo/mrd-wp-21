<?php $args = array( 
	'post_type' => 'podcast', 
	'showposts' => 6,
	'tax_query' => array(
        array(
            'taxonomy' => 'podcast_type',
            'field'    => 'slug',
            'terms'    => 'video',
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
				<?php echo get_the_post_thumbnail(get_the_id(), 'podcast_t'); 
				if(get_field('podcast_url')) :?>
					<a class="btn btn-play" href="<?php echo get_permalink(); ?>" data-bs-toggle="modal" data-bs-target="#podcast-video-<?php echo get_the_id(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/podcast-play.svg" alt="icon"></a>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<h6 class="card-min-title"><?php the_title(); ?></h6>
				<h4 class="card-title"><?php echo mrd_get_the_excerpt(140, get_the_id()).'...'; ?></h4>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); ?>
<?php if($podcast->have_posts()): ?>
	<?php while($podcast->have_posts()): $podcast->the_post(); ?>
		<div class="modal fade podcast-video" id="podcast-video-<?php echo get_the_id(); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg">
		    <div class="modal-content">
		      <div class="modal-header border-0">
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<div style="padding:56.25% 0 0 0;position:relative;" id="video-wrap">
			        <?php echo get_field('podcast_url'); ?>
			    </div>
		      </div>
		    </div>
		  </div>
		</div>
	<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>