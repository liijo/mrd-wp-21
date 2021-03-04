<?php
/*
  Template Name: Half Width Page
 */
get_header(); ?>
<?php if (have_posts()) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 mx-auto pt-5">
        <?php the_content(); ?>
      </div>
    </div>
  </div>


<?php endif; ?>
<?php get_footer(); ?>
