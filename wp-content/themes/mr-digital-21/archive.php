<?php get_header('inner'); ?>

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>


 <!-- <div class="section_head mt200 center_head contact_head">
       <div class="container content-container way">
         <h5>Lates Posts</h5>
         <h2><?php single_term_title(); ?></h2>
         <div class="watermarkedlogo">MR. DIGITAL</div>
       </div>
     </div> -->
        <section class="page-banner new_design">
               <div class="container way">
                  <div class="row">
                     <div class="col-12">
                        <div class="water-mark-banner text-center">
                           <div class="water-mark-title">
                              <div class="section-heading top-line text-center">
                                <!--  <h5>Lates Posts</h5> -->
                                <?php 
                                //$post_title = get_the_title();

                                $post_title = single_term_title('', 0);
                                $title_as_array = explode(' ', $post_title);
                                $last_word = array_pop($title_as_array);
                                $last_word_with_span = '<strong>' . $last_word . '</strong>';
                                array_push($title_as_array,$last_word_with_span);
                                $modified_title = implode(' ', $title_as_array);
                                
                                ?>
                                <?php //if($modified_title){?>
                                <!-- <h1 class="heading-lg"> <?php echo $modified_title; //the_title(); ?></h1> -->
                                <?php //}else{?>
                              <h1 class="heading-lg  main-heading"> Lates <strong>Posts</strong><?php //echo $modified_title; //the_title(); ?></h1>
                            <?php //}?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
     <section class="blog_list_content alternate boxed d-none d-sm-block">
         <div class="container content-container">
           <div class="blog_lists">
             <div class="row">
               <?php

               while (have_posts()) : the_post();
                       ?>
               <div class="col-sm-6 way">
                 <div class="blog_thumb_mediul ">
                   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_landscape'); ?></a>
                 </div>
                 <div class="blog_detail_meta way">
                   <h5><?php echo get_the_date(); ?></h5>
                   <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                   <p><?php echo shortentext(get_the_excerpt(), 100); ?></p>
                 </div>
               </div>
						 <?php endwhile; wp_reset_query(); ?>
             </div>
           </div>
         </div>
       </section>
       <section class="casestudy blog_slider section d-sm-none">
         <div class="container content-container">
           <div id="blog_mobile" class="casestudy_slider">
             <?php

             			while (have_posts()) : the_post();
                     ?>
		             <div class="item way">
		               <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_landscape'); ?></a>
		               <div class="item_caption_over">
		                 <div class="contents">
		                   <div class="blog_meta"><?php echo get_the_date(); ?></div>
		                   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		                 </div>
		               </div>
		             </div>
             <?php endwhile; ?>
           </div>
         </div>
       </section>

			 <section class="pagination">
         <div class="container content-container">
           <div class="pagination"> <?php
               if (function_exists('wpneighbour_pagenations')) {
                       wpneighbour_pagenations();
               }wp_reset_query();
               ?> </div>
         </div>
       </section>

 <?php endif;?>
     <?php get_template_part('parts/footer', 'contact'); ?>
<?php get_footer(); ?>
