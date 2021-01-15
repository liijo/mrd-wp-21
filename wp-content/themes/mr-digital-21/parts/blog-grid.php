<?php 
$taxonomy = 'category';
$department = get_terms( array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false
) );

if ( !empty($department) ) :
    ?><div class="cs-dropdown-main">
    <select name="work_category" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        <option selected value="">Categories</option><?php
        foreach( $department as $category ) {
        ?><option value="<?php echo get_term_link($category); ?>">
            <?php echo esc_attr( $category->name ); ?>
        </option><?php
        }
    ?></select>
</div><?php
endif;?>
<?php
$args = array( 'offset' => 6, 'posts_per_page' => 12 );
$blog = new WP_Query($args);
if($blog->have_posts()):
	?><div class="blog-grid row"><?php
	while($blog->have_posts()): $blog->the_post();
		?><div class="col-md-4">
			<div class="item mb-5 pb-4">
				<div class="item-wrap">
					<figure class="rounded overflow-hidden mb-4">
						<a href="<?php echo get_permalink(); ?>">
							<?php echo get_the_post_thumbnail($post->ID, 'blog_t'); ?>
						</a>
					</figure>
					<div class="item-content">
						<h3 class="mb-4">
							<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<p class="mb-4"><?php echo mrd_get_the_excerpt(300, $post->ID); ?></p>
						<div class="post-meta d-flex align-items-center">
	                        <?php $meta = esc_attr( get_the_author_meta( 'author_image', $user->ID ) );
	                		if ($meta) { 
	                			$image = wp_get_attachment_image_src($meta, 'thumbnail');
	                			$image = $image[0]; 
	                		}
	                		$authorName = esc_attr( get_the_author_meta( 'display_name', $user->ID ) ); ?>
	                        <figure class="overflow-hidden rounded-circle me-3 mb-0">
	                        	<img src="<?php echo $image; ?>" alt="<?php the_author(); ?>">
	                        </figure>
	                        <div>
	                        	<p class="mb-0 fw-bold text-uppercase"><?php echo $authorName; ?></p>
	                        	<time><?php the_date(); ?></time>
	                        </div>
	                    </div>
					</div>
				</div>
			</div>
		</div><?php
	endwhile;
	?></div><?php
endif;