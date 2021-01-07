<!-- Footer -->
         <footer id="footer" class="site-footer new-site-footer">
            <!-- <div class="footer-subs">
               <div class="container">
                  <div class="row align-items-center ">
                     <div class="col-xl-5 col-lg-4 text-center mb-4 mb-lg-0 join">
                        <h3>Join Our Community</h3>
                     </div>
                     <div class="col-xl-7 col-lg-8">
                        <?php //echo do_shortcode('[contact-form-7 id="158" title="Subscription"]'); ?>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="top-footer">
               <div class="container">
                  <div class="row">

                     <div class="col-lg-12 footer-menu-row">
                        <div class="row">
							<div class="col-md-1"></div>
                           <div class="col-sm-12 col-md-2">
                              <div class="footer-panel footer-menu">
                                 <h4 class="panel-title">Quick Links</h4>
                                 <?php
                                 wp_nav_menu(array
                                     (
                                     'menu' => 'quick-links',
                                     'container' => '',
                                     'menu_class' => '',
                                 ));
                                 ?>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3">
                              <div class="footer-panel footer-menu">
                                 <h4 class="panel-title">Services</h4>
                                 <?php
                                 wp_nav_menu(array
                                     (
                                     'menu' => 'service-links',
                                     'container' => '',
                                     'menu_class' => '',
                                 ));
                                 ?>

                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3">
                              <div class="footer-panel footer-menu">
                                 <h4 class="panel-title">Checklists</h4>
                                 <?php
                                 wp_nav_menu(array
                                     (
                                     'menu' => 'tools-links',
                                     'container' => '',
                                     'menu_class' => '',
                                 ));
                                 ?>

                              </div>
                           </div>
						   	    <div class="col-sm-12 col-md-3 footer-partner-section">
									<div class="footer-brand">
										<img src="<?php _e(ISSPATH); ?>/img2/footer-brand.svg" alt="media">
									</div>
								<div class="footer-partner">
									<img src="<?php _e(ISSPATH); ?>/img/Google Partner.png" alt="media">
								</div>
								<div class="footer-contact-info">
									<div class="location">
										<img src="<?php _e(ISSPATH); ?>/img/footer map.png" alt="icon"><span>Elgin Gardens, Guildford,</br>Surrey, GU11UB</span>
									</div>

									<a href="tel:01483 920 998"><img src="<?php _e(ISSPATH); ?>/img/footer phone.png" alt=""><span>01483 920 998</span></a>
								</div>
							</div>
						   <!--<div class="col-sm-12 col-md-3">
                              <div class="footer-panel footer-menu">
                                 <h4 class="panel-title">Resources</h4>
                                 <?php
                                 wp_nav_menu(array
                                     (
                                     'menu' => 'resources-submenu',
                                     'container' => '',
                                     'menu_class' => 'footer-sub',
                                 ));
                                 ?>

                              </div>
                           </div>-->
                        </div>
                     </div>
					 <div class="col-lg-12 footer-address">
                        <div class="footer-panel">
                            <img src="<?php _e(ISSPATH); ?>/img2/footer-brand.svg" alt="media">
							<div class="footer-rating">
								<img src="<?php _e(ISSPATH); ?>/img/Google Partner.png" alt="media">
							</div>
							<div class="footer-contact-info">
								<img src="<?php _e(ISSPATH); ?>/img/footer map.png" alt="icon"><span>Elgin Gardens, Guildford, Surrey, GU11UB</span>
								<a href="tel:01483 920 998"><img src="<?php _e(ISSPATH); ?>/img/footer phone.png" alt=""><span>01483 920 998</span></a>
							</div>
						</div>
                     </div>
                  </div>
                  <!-- footer meta  -->

               </div>
            </div>
            <div class="bottom-footer py-4">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                        &copy;  <?php _e(date('Y')); ?> Mr Digital
					 <span class="text-center text-lg-right footer-meta-links">
					 <?php
                       wp_nav_menu(array
                           (
                           'menu' => 'footer',
                           'container' => '',
                           'menu_class' => '',
						   'items_wrap'      => '<ul id="%1$s" class="%2$s d-flex">%3$s</ul>',)); ?>

					 </span>
					 </div>
					<div class="col-lg-6 text-center text-lg-right footer-meta-links">

					   <div class="footer-social mb-4 mb-md-0">
                              <a href="<?php echo get_option('facebook_url'); ?>" target="_blank"><i class="fa fa-facebook-official"></i></a>
                              <a href="<?php echo get_option('linkedin'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                              <a href="<?php echo get_option('instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                           </div>
                    </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- Contact Modal -->
         <div class="modal fade contact-modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <div class="section-heading top-line has-note">
                        <h2 class="heading-lg">Get A Better ROI From Your Marketing</h2>
                        <p>Please fill out the following form we will contact you to show you how to get a better return on your marketing investment.</p>
                     </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                     <div></div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group form-group-site">
                              <input type="text" class="form-control" placeholder="What’s your name?">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group form-group-site">
                              <input type="text" class="form-control" placeholder="What’s your email address?">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group form-group-site">
                              <input type="text" class="form-control" placeholder="What’s your Phone Number">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group form-group-site">
                              <div class="form-group form-group-site">
                                 <select class="form-control">
                                    <option>Which Service You Need</option>
                                    <option>UI Design</option>
                                    <option>UI / UX Design</option>
                                    <option>SEO Optimization</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group form-group-site">
                              <textarea class="form-control" rows="1" placeholder="Tell us about you"></textarea>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group form-group-site">
                              <div class="custom-control custom-checkbox custom-control-site">
                                 <input type="checkbox" class="custom-control-input" id="chk3">
                                 <label class="custom-control-label" for="chk3">I would like to receive marketing updates from Mr Digital</label>
                              </div>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group form-group-site d-flex align-items-center justify-content-end mb-0">
                              <div class="form-veri mr-3">
                                 <span>5+5</span>
                                 <input type="text">
                              </div>
                              <button class="btn btn-brand">Submit <i class="fa fa-paper-plane-o ml-2 ml-sm-4"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>






</div>
<div class="modal fade contact-modal zindex-top" id="mdServicePopFooter" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-big  modal-dialog-centered zindex-top" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <div class="section-heading top-line has-note">
                        <h2 class="heading-lg"><?php the_field('popu_title', 5); ?></h2>
                        <p><?php the_field('popup_text', 5); ?></p>
                     </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-form-panel">
                      <?php echo do_shortcode('[contact-form-7 id="2733" title="Contact Us Page"]') ?>
                    </div>

                  </div>
               </div>
            </div>
         </div>


<?php /* if(is_front_page()) {?>
         <div class="modal fade small-aid-modal show" id="mdAdvPop" tabindex="-1" role="dialog" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <img src="img/modal-close.svg" alt="icon">
                           </button>
                           <div class="modal-body text-center">
                              <h3>Small Business Marketing Aid Save Nearly £3,000 Per Month</h3>
                              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
                              <a href="#" class="btn btn-brand has-arrow">Learn More</a>
                           </div>
                        </div>
                     </div>
                  </div>
<?php  } */?>
<?php wp_footer();
the_field('paste_your_tracking_code');
if ( is_singular('services') ) { ?>
	<script src="https://www.mr-digital.co.uk/wp-content/themes/mr-digital/js/nivo-lightbox.min.js"></script>
<script>
    $(document).ready(function () {
        $('#nivo-lightbox-demo a').nivoLightbox({
            effect: 'fade'
        });
    });
</script>
<?php } ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Mr Digital",
  "image": "https://www.mr-digital.co.uk/wp-content/uploads/2019/10/web-design-services-surrey-768x668.jpg",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "ratingCount": "12"
  }
}
</script>
</body>
</html>
