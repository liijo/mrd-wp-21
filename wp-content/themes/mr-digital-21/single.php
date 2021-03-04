<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
  <?php
    /*$next_post = get_next_post();
    $prev_post = get_previous_post();*/
    ?>

    <section class="watwedo_lists alternate boxed single_case_study single_blog with_navs">
       <div class="container">
          <div class="caseStudy_details single_blog_details">
            <div class="single-blog-img rounded overflow-hidden">
              <?php the_post_thumbnail(); ?>
          </div>

          <div class="blog-meta-frame">
              <div class="blog-meta">
                 <h1 class="blog-main-title"><?php the_title(); ?></h1>
                 <div class="blog-author">
                    <div class="d-flex align-items-center author-details">
                       <div class="author-image">
                          <?php $image = get_field( 'profile_picture', 'user_'.$post->post_author ) ; ?>
                          <img src="<?php echo $image; ?>" alt="<?php the_author(); ?>"></div>
                          <div class="author-data text-left"><strong class="text-uppercase"><?php the_author(); ?> / </strong><span><?php echo get_the_date(); ?></span></div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="blog-content">

              <!-- Scroll social media -->
              <div class="blog-social-frame">
                 <div class="blog-social" id="blogSocial">
                    <div class="sharethis-inline-share-buttons"></div>

                </div>
            </div>

            <div id="mrd-post-content"><?php the_content(); ?></div>

    <!-- <div class="tags">
      <?php //the_tags(); ?>
  </div> -->
  <div class="author d-flex align-items-center rounded" id="author">
    <div class="author-image text-center">
        <?php $meta = esc_attr( get_the_author_meta( 'author_image', $user->ID ) );
        if ($meta) { $image = wp_get_attachment_image_src($meta, 'thumbnail'); $image = $image[0]; } ?>
        <figure class="rounded-circle overflow-hidden avatar">
            <img src="<?php echo $image; ?>" alt="<?php the_author(); ?>" />
        </figure>
        <div class="social-media">
            <?php 
            $facebook  = get_field('facebook', 'user_'.$post->post_author); 
            $twitter   = get_field('twitter', 'user_'.$post->post_author); 
            $linkedin  = get_field('linkedin', 'user_'.$post->post_author); 
            $instagram = get_field('instagram', 'user_'.$post->post_author); 
            if($facebook != '')
                echo '<a href="'.$facebook.'" target="_blank"><span class="icon-facebook"> </span></a>';
            if($twitter != '')
                echo '<a href="'.$twitter.'" target="_blank"><span class="icon-twitter"> </span></a>';
            if($linkedin != '')
                echo '<a href="'.$linkedin.'" target="_blank"><span class="icon-linkedin"> </span></a>';
            if($instagram != '')
                echo '<a href="'.$instagram.'" target="_blank"><span class="icon-instagram"> </span></a>';
            ?>
        </div>
    </div>
    <div class="author-data text-left">
        <h4><?php the_author(); ?></h4>
        <p><?php echo esc_attr( get_the_author_meta( 'description', $user->ID ) ); ?></p>
    </div>
</div>
</div>

</div>
</div>
</section>

<div class="clearfix mt-5 pb-5 border-bottom border-2"></div>

<?php endif; ?>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5d37e897be87c400123de072&product=inline-share-buttons"></script>


<?php get_footer(); ?>
