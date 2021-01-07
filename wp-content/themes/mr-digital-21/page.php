<?php get_header('inner'); ?>

<?php if (have_posts()) : the_post(); ?>
<!--   <section class="about_header blank_header pt150" style="padding-bottom:20px">
        <div class="container content-container">
          <div class="section_head  center_head contact_head about_section_head">
                <div class="" style="padding-top:30px;">
                <h5>Our Blog Posts</h5>
                 <h1><?php //the_title(); ?></h1>

                  <div class="watermarkedlogo">MR.DIGITAL</div>
                    <div class="row">
               <div class="col-12">
                  <div class="water-mark-banner text-center">
                     <div class="water-mark-title">
                        <div class="section-heading top-line text-center">
                           <h1 class="heading-lg"><?php the_title(); ?></h1>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
                </div>
              </div>
        <div class="mainCap">
            <h2><?php echo get_post_meta($post->ID,'page_maintitle', true); ?></h2>
          </div>
        </div>
      </section>
 -->
   <section class="page-banner new_design">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                        <div class="water-mark-banner text-center">
                           <div class="water-mark-title">
                              <div class="section-heading top-line text-center">
                                <?php 
                                $post_title = get_the_title();
                                $title_as_array = explode(' ', $post_title);
                                $last_word = array_pop($title_as_array);
                                $last_word_with_span = '<strong>' . $last_word . '</strong>';
                                array_push($title_as_array,$last_word_with_span);
                                $modified_title = implode(' ', $title_as_array);
                                
                                ?>
                                 <h1 class="heading-lg main-heading"><?php echo $modified_title; //the_title(); ?></h1>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
<section class="watwedo_lists alternate boxed single_case_study single_blog with_navs">
        <div class="container  content-container">
          <div class="caseStudy_details single_blog_details default-page-content">
            <?php the_post_thumbnail('full'); ?>
            <?php the_content(); ?>
            <?php dynamic_sidebar('inner_right_1'); ?>
          </div>
        </div>
</section>

    <?php get_template_part('parts/footer', 'contact'); ?>
<?php endif; ?>

<?php get_footer(); ?>
