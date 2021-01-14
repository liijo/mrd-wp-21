<?php 
/*Template name: Blog*/
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
	<section class="section-podcast">
        <div class="container">
            <div class="text-center">
                <h3 class="section-title mb-3"><?php echo __('Podcast videos'); ?></h3>
            </div>
            <?php get_template_part( 'podcast', 'slider' ); ?>
            <div class="mt-5 text-center">
	            <a href="#" class="btn btn-spotify"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/spotify-label.png" alt="media"></a>
	         </div>             
        </div>
    </section><!-- .section-podcast -->

    <section class="checklist pt-5 pb-4 grey">
        <div class="container">
        	<div class="text-center">
                <h3 class="section-title mb-3"><?php echo __('Checklists'); ?></h3>
            </div>
            <?php get_template_part( 'checklist', 'slider' ); ?>
        </div>
    </section><!-- Checklist -->

    <section class="events pt-5 pb-4">
    	<div class="container">
        	<div class="text-center">
                <h3 class="section-title mb-3"><?php echo __('Events & Event Recordings'); ?></h3>
            </div>
            <?php get_template_part( 'parts/events', 'slider' ); ?>
        </div>
    </section><!-- Events -->

<?php endif; ?>
<?php get_footer(); ?>