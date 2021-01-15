<?php
/*
Template Name: Contact Page
*/
get_header('inner');
?>
<?php if (have_posts()) : the_post(); ?>
    <!-- ===== SECTION ===== -->
    <section class="section-contact-form">
        <div class="container">

            <div class="row">
                <?php echo get_field('content'); ?>
            </div>

            <?php if(get_field('contact_form_shortcode')) {?>
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="contact-form-panel">
                            <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>

<div class="container pb-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <hr>
        </div>
    </div>
</div>

<!-- ===== SECTION ===== -->
<section class="section-contact-map">
    <div class="container">
        <div class="row">
            <div class="col-12 position-relative d-flex align-items-center py-5">

                <div class="contact-address-panel">
                    <?php if( have_rows('address') ): ?>
                        <?php while( have_rows('address') ) : the_row(); ?>
                            <address class="contact-address">
                                <h4><?php echo get_sub_field('title'); ?></h4>
                                <div class="position-relative ps-5">
                                    <p><?php echo get_sub_field('line_1'); ?></p> 
                                    <p><a href="tel:<?php echo get_sub_field('phone'); ?>"><?php echo get_sub_field('phone'); ?></a></p>
                                    <p><a href="tel:<?php echo get_sub_field('whatsapp'); ?>"><?php echo get_sub_field('whatsapp'); ?></a></p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                </div>
                            </address>
                        <?php endwhile;?>
                    <?php endif;?>
                </div>
                <div class="map-frame">
                    <span class="map-marker uk"></span>
                    <span class="map-marker india"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="strategy-session mt-5 grey border-bottom border-2">
    <?php get_template_part( 'parts/template-strategy', 'session' ); ?> 
</section>

<?php endif; ?>
<?php get_footer(); ?>
