<?php
get_header('landing');
 ?>
<?php if (have_posts()) : the_post(); ?>

  <?php
    $banner = (get_field('background_image')) ? get_field('background_image') : get_bloginfo('template_directory') . '/images/banner.jpg';
  ?>
  <section class="main-slider">
      <div id="banner" style="background-image: url(<?php echo $banner; ?>)">


          <div class="banner-slider d-flex align-items-center">

                  <div class="slider-item text-center">
                      <div class="container">

                              <h3 class="h1 mb-5"><?php the_field('banner_title_seochklist'); ?></h3>

                          <p class="text-white mb-5"><?php the_field('banner_description__seochklist'); ?></p>


                              <a href="#" class="btn btn-primary rounded"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?>
                                  <span class="icon-right ps-2"></span>
                              </a>

                      </div>
                  </div>

          </div>


          <div class="banner-footer d-flex align-items-stretch justify-content-center">
                <div class="section-image align-items-center d-flex">
                    <img src="<?php bloginfo('template_directory'); ?>/images/inspire-logo.png" alt="winner" width="250" />
                </div>
            </div>
      </div>
  </section><!-- .main-slider end -->


      <div class="site-frame">

         <!-- Header -->
         <header id="header" class="site-header"></header>

         <!-- Page -->
         <div id="page" class="site-page">

            <!-- ==================[ banner **]================== -->


              <section class="section-brand-carousel">
                 <div class="container">
                    <div class="row">
                      <div class="col-12 text-center">
                        <h4 style="font-size: 18px; margin-bottom: 20px;">WE WORK WITH</h4>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-12">
                          <div class="owl-carousel brand-carousel">

                                    <?php while ( have_rows('we_work_clients') ) : the_row();
                                      $we_work_clients = get_sub_field('points_seocheck');
                                      ?>
                                      <div class="item"><div class="bc-panel"><img src="<?php echo $we_work_clients['url']; ?>" alt="<?php echo $we_work_clients['alt']; ?>"></div></div>

                                <?php endwhile;?>


                          </div>
                       </div>
                    </div>
                 </div>
              </section>

            <!-- ==================[ 1 section **]================== -->
            <section id="firstSection" class="section-seo-page section-seo-one">
               <div class="container-fluid">

                  <div class="row align-items-center flex-row-reverse">
                     <div class="col-xl-5">
                        <?php $section1img=get_field('section_image_seocheckl_ist'); ?>
                        <div class="panel-media img1"><img src="<?php echo $section1img['url']; ?>" alt="<?php echo $section1img['alt']; ?>"></div>
                     </div>
                     <div class="col-xl-7">
                        <div class="panel-heading">
                           <h2><?php the_field('section_1_title__'); ?></h2>
                           <p><?php the_field('sub_title_section1__'); ?></p>
                        </div>
                        <div class="panel-content">
                           <ul>
                              <?php while ( have_rows('seo_points___') ) : the_row();
                        $points_seocheck = get_sub_field('points_seocheck');
                        ?>
                              <li><?php echo $points_seocheck;?></li>
                           <?php endwhile;?>
                           </ul>
                        </div>
                        <div class="panel-btn">
                           <a  class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk" ><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <!-- ==================[ 2 section **]================== -->
            <section class="section-seo-page section-seo-two">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-10 mx-auto text-center">
                        <div class="panel-heading">
                           <h2><?php the_field('section_2_title'); ?></h2>
                           <p><?php the_field('section_2_sub_title'); ?></p>
                        </div>
                     </div>
                  </div>

                  <?php
                   $landimage=get_field('landing_pages_images');

                  if($landimage=="Yes") {
                    ?>

                  <div class="row">
                     <div class="col-12">
                        <div class="popup-panel popimgland">
                           <?php $popimgurl= get_field('section_2_image_popup'); ?>
                           <?php $imgdis=get_field('section_2_image'); ?>
                           <!-- <a href="<?php //echo $popimgurl['url']; ?>"> -->
                            <img src="<?php  echo $imgdis['url'];?>" alt="<?php echo $imgdis['alt']; ?>">
                          <!--  </a> -->
                         <!--   <div class="hiden-popup d-none">
                               <?php //while ( have_rows('popup_image') ) : the_row();
                                 //$popup_imagelist = get_sub_field('popup_image___');
                                 ?>
                              <a href="<?php //echo $popup_imagelist['url']; ?>"><img class="" src="<?php //echo $popup_imagelist['url']; ?>" alt="<?php //echo $popup_imagelist['alt']; ?>"></a>
                           <?php //endwhile;?>

                           </div> -->
                        </div>
                     </div>
                      <div class="col-12">
                        <div class="panel-btn text-center">
                           <a  class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>

                <?php } else{?>

                  <div class="row">
                     <div class="col-12">
                        <div class="popup-panel">
                           <?php $popimgurl= get_field('section_2_image_popup'); ?>
                           <?php $imgdis=get_field('section_2_image'); ?>
                           <a href="<?php echo $popimgurl['url']; ?>"><img src="<?php  echo $imgdis['url'];?>" alt="<?php echo $imgdis['alt']; ?>"></a>
                           <div class="hiden-popup d-none">
                               <?php while ( have_rows('popup_image') ) : the_row();
                                 $popup_imagelist = get_sub_field('popup_image___');
                                 ?>
                              <a href="<?php echo $popup_imagelist['url']; ?>"><img src="<?php echo $popup_imagelist['url']; ?>" alt="<?php echo $popup_imagelist['alt']; ?>"></a>
                           <?php endwhile;?>

                           </div>
                        </div>
                     </div>
                  </div>



                  <div class="row">
                     <div class="col-12">
                        <div class="panel-btn text-center">
                           <a  class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>
                   <?php }?>
               </div>
            </section>

            <!-- ==================[ 3 section **]================== -->
            <section class="section-seo-page section-seo-three">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12">
                        <div class="panel-heading">
                           <h2><?php the_field('section_3_title'); ?></h2>
                           <p><?php the_field('section_3_small_description'); ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <?php $googleimg= get_field('google_rating_image'); ?>
                        <div class="g-rating-media"><img src="<?php echo $googleimg['url']; ?>" alt="<?php echo $googleimg['alt']; ?>"></div>
                     </div>
                     <div class="col-xl-10 mx-auto">
                        <ul class="g-quote-list">
                           <?php while ( have_rows('client_review_image') ) : the_row();
                                 $review_image = get_sub_field('review_image___');
                                 ?>
                           <li><img src="<?php echo $review_image['url']; ?>" alt="<?php echo $review_image['alt']; ?>"></li>
                        <?php endwhile;?>

                        </ul>
                     </div>
                     <div class="col-12">
                        <div class="panel-btn text-center">
                           <a  class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <!-- ==================[ 4 section]================== -->
             <?php
                  //  $sectiondisable=get_field('section_4_disable');

                  // if($sectiondisable=="Yes") {
                  // }else{
                    ?>
            <section class="section-seo-page section-seo-four">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12">
                        <div class="panel-heading text-center">
                           <h2><?php the_field('section_4_title__'); ?></h2>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xl-7 col-lg-9 col-md-10 mx-auto">
                        <div class="water-wheel-carousel-panel">
                           <div id="carousel" class="water-wheel-carousel">
                              <?php while ( have_rows('google_ranking_image') ) : the_row();
                                 $ranking_image = get_sub_field('ranking_image_slider');
                                 ?>
                              <img src="<?php echo $ranking_image['url']; ?>" alt="<?php echo $ranking_image['alt']; ?>">
                              <?php endwhile;?>
                           </div>
                           <div class="arrow-panel">
                              <a href="#" id="prev" class="arrow-prev"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/imglp/arrow-prev.svg" alt="icon"></a>
                              <a href="#" id="next" class="arrow-next"><img src="<?php echo  plugin_dir_url( __FILE__ ); ?>/imglp/arrow-next.svg" alt="icon"></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="panel-btn text-center">
                           <a  class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <?php //}?>


            <!-- ==================[ 5 section **]================== -->
            <section class="section-seo-page section-seo-five">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12">
                        <div class="panel-heading text-center">
                           <h2><?php the_field('section_5_title'); ?></h2>
                           <p><?php the_field('section_5_small_description_'); ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="certificate-frame">
                     <div class="row">
                        <?php while ( have_rows('certificate_image') ) : the_row();
                                 $certificate_img = get_sub_field('certificate_image_list');
                                 ?>
                        <div class="col-md-3 col-6 mx-auto"><div class="c-panel"><img src="<?php echo $certificate_img['url']; ?>" alt="<?php echo $certificate_img['alt']; ?>"></div></div>
                        <?php endwhile;?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="panel-btn text-center">
                           <a class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <!-- ==================[ 6 section **]================== -->


            <section class="section-seo-page section-seo-six">
               <div class="container-fluid">
                  <div class="row align-items-center">
                     <div class="col-xl-5">
                        <?php $sectionimg6=get_field('section_6_image'); ?>
                        <div class="panel-media"><img src="<?php echo $sectionimg6['url']; ?>" alt="<?php echo $sectionimg6['alt']; ?>"></div>
                     </div>
                     <div class="col-xl-7">
                        <div class="panel-heading">
                           <h2><?php the_field('section_6_title'); ?></h2>
                           <p><?php the_field('section_6_sub_title'); ?></p>
                        </div>
                        <div class="panel-content">
                           <ul>
                               <?php while ( have_rows('section_6_list_item_') ) : the_row();
                                 $points_section6 = get_sub_field('points_section6');
                                 ?>
                              <li><?php echo $points_section6;?></li>
                           <?php endwhile;?>

                           </ul>
                        </div>
                        <div class="panel-btn">
                           <a  class="btn-seo-gradient lpbtn"  data-toggle="modal" data-target="#mdServiceseochk"><?php the_field('call_action_button_name'); ?></a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>


         </div>


        <!--  <footer id="footer" class="site-footer"></footer> -->

      </div>
<?php endif; ?>
<style type="text/css">div#mdServiceseochk span.wpcf7-form-control-wrap.yname {
    display: block;
    width: 100%;
    padding-right: 0;
}</style>
<div class="modal fade seocheklist-modal zindex-top" id="mdServiceseochk" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
<!--   <div class="modal seocheklist-modal  modal-advpop fade show" id="mdServiceseochk" tabindex="-1" role="dialog" style="padding-right: 16px; display: block;"> -->
         <div class="modal-dialog modal-dialog-centered modal-lg">

            <!-- <div class="modal-dialog modal-lg modal-big  modal-dialog-centered zindex-top" role="document"> -->
               <div class="modal-content">
                  <div class="modal-header">
                     <div class="section-heading mb-0 top-line has-note">
                        <h2 class="heading-lg">

                         <?php the_field('form_title_popuplp'); ?> <?php //the_field('popu_title', 5); ?></h2>
                        <p><?php //the_field('popup_text', 5); ?></p>
                     </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-form-panel">
                      <?php $formopou=get_field('form_landing_page'); ?>
                      <?php //echo do_shortcode('[contact-form-7 id="4017" title="Seo check list LP"]') ;
                       echo $formopou;
                      ?>
                    </div>

                  </div>
               </div>
            </div>
         </div>

<?php get_footer(); ?>
         <script type="text/javascript">
jQuery(document).ready(function(){
document.addEventListener( 'wpcf7mailsent', function( event ) {
  //Seo check list LP

if ( '6788' == event.detail.contactFormId ) {
location = '<?php echo get_permalink( 6784 ) ?>';
}
//LinkedIn Prospecting Checklist form
else if( '6716' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6777 ) ?>';
}
//Ideal Customer Checklist form
else if( '6715' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6760 ) ?>';
}
//Landing Page Optimisation Checklist
else if( '6713' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6757 ) ?>';
}
//Facebook Ads Checklist form
else if( '6417' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6748 ) ?>';
}
///Instagram
else if( '6690' == event.detail.contactFormId ){
location = '<?php echo get_permalink( 6781 ) ?>';
}
}, false );
});
</script>
