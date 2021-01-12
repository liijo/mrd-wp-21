<?php 
/* Template name: Services */
get_header(); ?>

<?php get_template_part( 'template-part', 'logos' ); ?>

<?php if (have_posts()) : the_post(); ?>

    <!-- ===== SECTION ===== -->

    <?php if(get_field('blurb')) :?>
        <section class="blurb">
            <div class="container">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <?php echo get_field('blurb'); ?>
                    </div>
                </div>
            </div>
        </section><!-- .blurb -->
    <?php endif;?>

    <section class="grey overflow-hidden google">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6 order-md-2">
                    <div class="request-loader">
                        <span>
                            <img src="images/google-rounded.png" alt="" />
                        </span>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3 class="section-title">Generate ROI quickly by partnering with our Certified <span>Google Ads experts</span></h3>
                    <p class="fw-bold mb-5">Discover how we can fuel sales growth and win new clients with performance-focused Google Ad campaigns</p>
                    <p class="mb-4">Google Ads can be a powerful means of growing your business. However, not every business has the resources or practical knowledge to get the best out of Google Ads. If you have ever invested your time and money in Google Ads, you must have known the obstacles to actually generating profit on the advertising platform.</p>
                    <div class="clearfix pt-2 mb-5">
                        <a href="#" class="btn btn-primary rounded">LEARN MORE <span class="icon-right"></span></a>
                        <a href="#" class="btn btn-outline-primary rounded">BOOK A FREE 15-MIN STRATEGY CALL <span class="icon-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>125+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>99+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100%</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="badge-slider owl-carousel">
                        <div class="item">
                            <img src="images/google-ads-search.png" alt="" />
                        </div>
                        <div class="item">
                            <img src="images/google-ads-display.png" alt="" />
                        </div>
                        <div class="item">
                            <img src="images/google-ads-video.png" alt="" />
                        </div>
                        <div class="item">
                            <img src="images/google-ads-display.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Google -->

    <section class="overflow-hidden pt-6 pb-7 instagram">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6">
                    <div class="request-loader float-start">
                        <span>
                            <img src="images/instagram.png" alt="" />
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="section-title">Generate ROI quickly by partnering with our Certified <span>Instagram Ads experts</span></h3>
                    <p class="fw-bold mb-5">Discover how we can fuel sales growth and win new clients with performance-focused Instagram Ad campaigns</p>
                    <p class="mb-4">Instagram presents marketers with an opportunity to pick and choose from over 800 million monthly users. That’s just a glimpse of what Instagram has in store for your business if you know how to get the best out of Instagram ads. While Facebook’s take over of the photo-centric platform has introduced powerful advertising features, the new changes have further complicated the life of marketers on Instagram.</p>
                    <div class="clearfix pt-2 mb-5">
                        <a href="#" class="btn btn-primary rounded">LEARN MORE <span class="icon-right"></span></a>
                        <a href="#" class="btn btn-outline-primary rounded">BOOK A FREE 15-MIN STRATEGY CALL <span class="icon-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>125+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>99+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100%</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="float-end">
                        <div class="item">
                            <img src="images/Facebook-Blue-Print.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- Instagram -->

    <section class="grey overflow-hidden facebook">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6 order-md-2">
                    <div class="request-loader">
                        <span>
                            <img src="images/facebook.png" alt="" />
                        </span>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <h3 class="section-title">Generate ROI quickly by partnering with our Certified <span>Facebook Ads experts</span></h3>
                    <p class="fw-bold mb-5">Discover how we can fuel sales growth and win new clients with performance-focused Facebook Ad campaigns</p>
                    <p class="mb-4">Every business with a Facebook page of its own has usually had some experience creating and managing Facebook Ad campaigns at some point in their life. Although Facebook generates billions of revenue from ads every year, users all over the globe fail to tap into the infinite potential of the advertising platform.</p>
                    <div class="clearfix pt-2 mb-5">
                        <a href="#" class="btn btn-primary rounded">LEARN MORE <span class="icon-right"></span></a>
                        <a href="#" class="btn btn-outline-primary rounded">BOOK A FREE 15-MIN STRATEGY CALL <span class="icon-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>125+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>99+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100%</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="float-start">
                        <div class="item">
                            <img src="images/Facebook-Blue-Print.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- facebook -->

    <section class="overflow-hidden pt-6 pb-7 linkedin border-bottom border-2">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-6">
                    <div class="request-loader float-start">
                        <span>
                            <img src="images/linkedin.png" alt="" />
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="section-title">Generate ROI quickly by partnering with our Certified <span>Linkedin Ads experts</span></h3>
                    <p class="fw-bold mb-5">Discover how we can fuel sales growth and win new clients with performance-focused LinkedIn Ad campaigns</p>
                    <p class="mb-4">LinkedIn is without a doubt the most credible social media platform that lets you target a large professional audience. You could run highly targeted ads, which, if conducted effectively, could directly reach the people at the helm of businesses including top executives and decision-makers.</p>
                    <div class="clearfix pt-2 mb-5">
                        <a href="#" class="btn btn-primary rounded">LEARN MORE <span class="icon-right"></span></a>
                        <a href="#" class="btn btn-outline-primary rounded">BOOK A FREE 15-MIN STRATEGY CALL <span class="icon-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>125+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>99+</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="achievement mb-4">
                                <h3>100%</h3>
                                <p class="mb-0">consetetur sadipscing</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    
                </div>
            </div>
        </div>
    </section><!-- Linkedin -->

<?php endif;?>
<?php get_footer(); ?>