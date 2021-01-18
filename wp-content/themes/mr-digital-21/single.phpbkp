<?php get_header('inner'); ?>

<?php if (have_posts()) : the_post(); ?>
  <?php
    $next_post = get_next_post();
    $prev_post = get_previous_post();
  ?>
  <?php if(!empty($next_post)) {?>
    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="article_navigation previous_article"><img src="<?php _e(ISSPATH) ?>/img/article_arrow_left.svg" alt=""></a>
  <?php } ?>
    <?php if(!empty($prev_post)) {?>
        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="article_navigation next_article"> <img src="<?php _e(ISSPATH) ?>/img/article_arrow_right.svg" alt=""></a>
      <?php } ?>



<section class="watwedo_lists alternate boxed single_case_study single_blog with_navs">
   <div class="container">
      <div class="caseStudy_details single_blog_details">
         <div class="single-blog-img"><?php the_post_thumbnail('full'); ?></div>

         <div class="blog-meta-frame">
            <div class="blog-meta">
               <h1 class="blog-main-title text-center"><?php the_title(); ?></h1>
               <div class="blog-author">
                  <div class="d-flex align-items-center justify-content-center author-details">
                     <div class="author-image"><?php $meta = esc_attr( get_the_author_meta( 'author_image', $user->ID ) );
                 		if ($meta) { $image = wp_get_attachment_image_src($meta, 'thumbnail');	$image = $image[0]; } ?>
                     <img src="<?php echo $image; ?>" alt="<?php the_author(); ?>"></div>
                     <div class="author-data text-left"><span><?php the_author(); ?></span><span>/</span><span><?php echo get_the_date(); ?></span></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="blog-content">

            <!-- Scroll social media -->
            <div class="blog-social-frame">
               <div class="blog-social" id="blogSocial">
                  <div class="sharethis-inline-share-buttons"></div>
                  <!-- <span><a href="#" class="aside-icon ai-fb"><img src="<?php echo ISSPATH; ?>/img/aside-facebook.png" alt="icon"></a></span>
                  <span><a href="#" class="aside-icon ai-li"><img src="<?php echo ISSPATH; ?>/img/aside-linkedin.png" alt="icon"></a></span>
                  <span><a href="#" class="aside-icon ai-wa"><img src="<?php echo ISSPATH; ?>/img/aside-whatsapp.png" alt="icon"></a></span>
                  <span><a href="#" class="aside-icon ai-tw"><img src="<?php echo ISSPATH; ?>/img/aside-twitter.png" alt="icon"></a></span>
                  <span><a href="#" class="aside-icon ai-mail"><img src="<?php echo ISSPATH; ?>/img/aside-mail.png" alt="icon"></a></span> -->
               </div>
            </div>

            <?php the_content(); ?>

            <div class="tags">
                <?php the_tags(); ?>
            </div>



         </div>

      </div>
   </div>
</section>



    <?php get_template_part('parts/footer', 'contact'); ?>
<?php endif; ?>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d37e897be87c400123de072&product=inline-share-buttons"></script>


<?php get_footer(); ?>
