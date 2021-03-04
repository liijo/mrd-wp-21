<?php /**
 * The template for displaying 404 pages (not found)
 *
 */
?>
<?php get_header(); ?>

    <section class="section-404">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 mx-auto">
                    <h1>404</h1>
                    <h3>PAGE NOT FOUND</h3>
                    <p>We're sorry, the page you were looking for isn't found here. The link you followed may either be broken or no longer exists. Please try again, or take a look at our site.</p>
                    <a href="<?php bloginfo('home') ?>" class="btn btn-primary rounded">Visit Mr Digital<span class="icon-right ps-2"></span></a>
                </div>
            </div>
        </div>
    </section>
    <div class="banner-footer d-flex align-items-stretch justify-content-center">
                <div class="section-image align-items-center d-flex">
                    <img src="<?php bloginfo('template_directory'); ?>/images/inspire-logo.png" alt="winner" width="250" />
                </div>
            </div>


<?php get_footer(); ?>