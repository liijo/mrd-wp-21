<?php
$args = array( 'showposts' => 6 );
$blog = new WP_Query($args);
if($blog->have_posts()):
	?><div class="blog-slider owl-carousel"><?php
	while($blog->have_posts()): $blog->the_post();
		?><div class="item">
			<div class="item-wrap">
				<figure class="rounded overflow-hidden mb-0">
					<a href="<?php echo get_permalink(); ?>">
						<?php echo get_the_post_thumbnail($post->ID, 'events'); ?>
					</a>
				</figure>
				<div class="item-content">
					<h3 class="mb-4">
						<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<p><?php echo mrd_get_the_excerpt(300, $post->ID); ?></p>
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
		</div><?php
	endwhile;
	?></div><?php
endif;