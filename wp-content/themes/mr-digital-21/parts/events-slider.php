<?php
$args = array( 'post_type' => 'events', 'showposts' => 6 );
$events = new WP_Query($args);
if($events->have_posts()):
	?><div class="events-slider owl-carousel"><?php
	while($events->have_posts()): $events->the_post();
		?><div class="item">
			<div class="row">
				<div class="col-md-6">
					<figure class="rounded-10 overflow-hidden">
						<?php echo get_the_post_thumbnail($post->ID, 'events') ?>		
					</figure>
				</div>
				<div class="col-md-6">
					<div class="content-panel">
						<h3 class="mb-4"><?php the_title(); ?></h3>
						<p class="mb-5"><?php echo get_field('blurb') ; ?></p>
						<div class="row">
							<div class="col-md-6 mb-5">
								<div class="event-glimpse d-flex align-items-center">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-date"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Date'); ?></p>
										<h4 class="mb-0"><?php echo get_field('event_date'); ?></h4>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="event-glimpse d-flex align-items-center mb-5">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-organizer"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Organizer'); ?></p>
										<h4 class="mb-0"><?php echo get_field('organizer'); ?></h4>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="event-glimpse d-flex align-items-center mb-5">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-location"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Location'); ?></p>
										<h4 class="mb-0"><?php echo get_field('event_location'); ?></h4>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="event-glimpse d-flex align-items-center mb-5">
									<div class="icon">
										<span class="rounded-circle"><i class="icon-address"></i></span>
									</div>
									<div class="copy">
										<p class="mb-0"><?php echo __('Address'); ?></p>
										<h4 class="mb-0"><?php echo get_field('event_address'); ?></h4>
									</div>
								</div>
							</div>
						</div>
						<a href="#" class="btn btn-primary rounded"><?php echo __('REGISTER NOW') ?><span class="icon-right ps-2"></span></a>
					</div>
				</div>
			</div>
		</div><?php
	endwhile;
	?></div><?php
endif;