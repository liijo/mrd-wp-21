<?php
/*
  Template Name: Thank you seo checklist

 */
get_header('blank');
?>

      <div class="site-frame">

         <!-- Header -->
         <header id="header" class="site-header"></header>

         <!-- Page -->
         <div id="page" class="site-page">

            <!-- ==================[ banner ]================== -->
            <section class="section-seo-page section-seo-thankyou-banner">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-8 col-lg-10 col-md-11 mx-auto">
                        <div class="panel-heading-min">
                           <h6><?php the_field('count_down_title'); ?></h6>
                           <h5><?php the_field('count_down_subtitle'); ?></h5>
                        </div>
                        <div class="panel-heading">
                           <h1><?php the_field('main_title_thankyou_lp'); ?></h1>
                           <p><?php the_field('sub_title_thank_you'); ?></p>
                        </div>
                        <div class="panel-btn">
                           <a href="<?php the_field('call_action_button_url_thankyou_lp'); ?>" target="_blank" class="btn btn-primary rounded"><?php the_field('call_action_button_name_tankyou'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="#secondSection" class=" btn-scroll text-dark">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                     <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
               </a>
            </section>

            <!-- ==================[ section ]================== -->
            <section id="secondSection" class="section-seo-page section-seo-thankyou-one">
               <div class="container-fluid">
                  <div class="row align-items-center flex-row-reverse">
                     <div class="col-xl-5">
                        <?php $thankimg=get_field('section_2_image_thank_lp'); ?>
                        <div class="panel-media"><img src="<?php echo $thankimg['url']; ?>" alt="<?php echo $thankimg['alt']; ?>"></div>
                     </div>
                     <div class="col-xl-7">
                        <div class="panel-heading">
                           <h2><?php the_field('section_2_title_thank_lp'); ?></h2>
                           <p><?php the_field('section_2_sub_title_lp_thankyou'); ?></p>
                        </div>
                        <div class="panel-content">
                           <ul>
                                <?php while ( have_rows('consultation_points') ) : the_row();
                                 $points_thakyou = get_sub_field('points_thakyou_lp');
                                 ?>
                              <li><?php echo $points_thakyou;?></li>
                           <?php endwhile;?>
                             <!--  <li>Conduct competitor research in just a few minutes so you can see how you can get one step ahead of your competitors</li>
                              <li>Monitor your keywords week on week to track the progress and hold your SEO agency accountable</li>
                              <li>Run backlink analysis to see how which sites are linking to your competitors and identify opportunities for link building</li>
                              <li>Get your site ranking on page 1 of Google in just 90-days!</li> -->
                           </ul>
                        </div>
                        <div class="panel-btn">
                           <a href="<?php the_field('call_action_button_url_thankyou_lp'); ?>" target="_blank" class="btn btn-primary rounded"><?php the_field('call_action_button_name_tankyou'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

         </div>

         <!-- Footer -->


      </div>
      <!-- Script Files -->
   <?php get_footer(); ?>
<script type="text/javascript">
   jQuery(document).ready(function($) {
   $('a[href$=".pdf"]')
        .attr('download', '')
        .attr('target', '_blank');
});
</script>
