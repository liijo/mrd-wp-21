<?php
$args = array( 'post_type' => 'events', 'showposts' => 6 );
$events = new WP_Query($args);
if($events->have_posts()):
	?><div class="events-slider owl-carousel"><?php
	while($events->have_posts()): $events->the_post();
		?><div class="item">
			<div class="row align-items-center">
				<div class="col-md-6">
					<figure class="rounded-10 overflow-hidden mb-md-0">
						<?php echo get_the_post_thumbnail($post->ID, 'events') ?>		
					</figure>
				</div>
				<div class="col-md-6">
					<div class="content-panel">
						<h3 class="mb-md-4"><?php the_title(); ?></h3>
						<p class="mb-md-5"><?php echo get_field('blurb') ; ?></p>
						<div class="row">
							<?php if(get_field('event_date')):?><div class="col-md-6 mb-5">
								<div class="event-glimpse d-flex align-items-center">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-date"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Date'); ?></p>
										<h4 class="mb-0"><?php echo get_field('event_date'); ?></h4>
									</div>
								</div>
							</div><?php endif;?>
							<?php if(get_field('organizer')):?><div class="col-md-6">
								<div class="event-glimpse d-flex align-items-center mb-5">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-organizer"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Organizer'); ?></p>
										<h4 class="mb-0"><?php echo get_field('organizer'); ?></h4>
									</div>
								</div>
							</div><?php endif;?>
							<?php if(get_field('event_location')):?><div class="col-md-6">
								<div class="event-glimpse d-flex align-items-center mb-5">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-location"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Location'); ?></p>
										<h4 class="mb-0"><?php echo get_field('event_location'); ?></h4>
									</div>
								</div>
							</div><?php endif;?>
							<?php if(get_field('event_address')):?><div class="col-md-6">
								<div class="event-glimpse d-flex align-items-center mb-5">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-address"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Address'); ?></p>
										<h4 class="mb-0"><?php echo get_field('event_address'); ?></h4>
									</div>
								</div>
							</div><?php endif;?>
						</div>
						<?php 
						$ctsLabel = (get_field('cta_label')) ? get_field('cta_label') : 'REGISTER NOW'; 
						if(get_field('cta_video')):
						?>
						<a href="#" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#event-video-<?php echo get_the_id(); ?>"><?php echo $ctsLabel; ?><span class="icon-right ps-2"></span></a>
						
						<?php endif;?>
					</div>
				</div>
			</div>
		</div><?php
	endwhile;
	?></div><?php
	while($events->have_posts()): $events->the_post();
		if(get_field('cta_video')):
		?><div class="modal fade podcast-video" id="event-video-<?php echo get_the_id(); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="event-video-<?php echo get_the_id(); ?>" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg">
		    <div class="modal-content">
		      <div class="modal-header border-0">
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<div style="padding:56.25% 0 0 0;position:relative;" id="video-wrap">
			        <?php echo get_field('cta_video'); ?>		    
			    </div>
		      </div>
		    </div>
		  </div>
		</div><?php
		endif;
	endwhile;
endif; 
wp_reset_query();