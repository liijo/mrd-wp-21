<?php 
/*Template name: Blog*/
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
	<section class="section-podcast">
        <div class="container">
            <div class="text-center">
                <h3 class="section-title mb-5 pb-3"><?php echo __('Podcast videos'); ?></h3>
            </div>
            <?php get_template_part( 'podcast', 'slider' ); ?>
            <div class="mt-5 text-center">
	            <a href="#" class="btn btn-spotify"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/spotify-label.png" alt="media"></a>
	         </div>             
        </div>
    </section><!-- .section-podcast -->

    <section class="checklist pt-5 pb-5 grey">
        <div class="container">
        	<div class="text-center">
                <h3 class="section-title mb-3 mt-5"><?php echo __('Checklists'); ?></h3>
            </div>
            <div class="mb-5 pb-4">
            	<?php get_template_part( 'checklist', 'slider' ); ?>
           	</div>
        </div>
    </section><!-- Checklist -->

    <section class="events pt-5 pb-5 mt-5 mb-5">
    	<div class="container">
        	<div class="text-center">
                <h3 class="section-title mb-5 pt-3"><?php echo __('Events & Event Recordings'); ?></h3>
            </div>
            <div class="pt-4 mb-5">
            	<?php get_template_part( 'parts/events', 'slider' ); ?>
            </div>
        </div>
    </section><!-- Events -->

    <div class="clearfix pt-3"></div>

	<section class="strategy-session mt-5 grey">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
    </section>

    <section class="ultimate-guides pt-4 mt-5 mb-5">
    	<div class="container">
        	<div class="text-center">
                <h3 class="section-title mb-5 pt-3"><?php echo __('Ultimate Guides Blogs'); ?></h3>
            </div>
        </div>
        <div class="mrd-blogs">
        	<?php get_template_part('parts/blog', 'slider'); ?>
        </div>
    </section>

    <div class="clearfix pt-5"></div>

    <section class="section-podcast grey mt-5">
        <div class="container">
            <div class="text-center">
                <h3 class="section-title mb-5 pb-3"><?php echo __('Podcast Audios'); ?></h3>
            </div>
            <?php get_template_part( 'podcast', 'slider' ); ?>
            <div class="mt-5 text-center">
	            <a href="#" class="btn btn-spotify"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/spotify-label.png" alt="media"></a>
	         </div>             
        </div>
    </section><!-- .section-podcast -->

    <section class="blog-grid pt-4 mt-5 mb-5">
    	<div class="container">
        	<div class="text-center">
                <h3 class="section-title mb-5 pt-3"><?php echo __('Other Blog Articles'); ?></h3>
            </div>
	        <div class="mrd-blogs">
	        	<?php get_template_part('parts/blog', 'grid'); ?>
	        </div>
        </div>
    </section><!-- Blog grid -->

    <div class="clearfix"></div>

    <section class="strategy-session mt-5 grey">
        <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
    </section>

<?php endif; ?>
<?php get_footer(); ?>