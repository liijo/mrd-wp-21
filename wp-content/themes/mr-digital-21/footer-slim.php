	<?php $wrapper = get_field('enable_wrapper'); 
    if(!empty($wrapper) && $wrapper[0] == 'Yes'):
    ?>	</section>
    <?php endif;?>
<!-- Footer -->
	<?php if ( is_active_sidebar( 'mrd-footer-logo-widgets' ) && ! is_404() ) { ?>
	    <section class="bottom-logos text-center grey">
			<div class="container">
				<div class="row align-items-center">
		            <div class="col-lg-2 col-md-3"><span><?php echo __('CERITIFIED EXPERTS'); ?></span></div>
		            <div class="col-lg-10 col-md-9">
		                <div class="row justify-content-between align-items-center">
		                    <?php dynamic_sidebar('mrd-footer-logo-widgets'); ?>
		                </div>
		            </div>
		        </div>
			</div>
		</section>
	<?php } ?>

	<!-- ===== FOOTER ===== -->
	<?php if ( is_active_sidebar( 'mrd-footer-widgets' ) ) { ?>
	<footer class="site-footer">

		<div class="bottom-footer">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-8">
						<?php echo get_theme_mod('footer_left'); ?>
					</div>
					<div class="col-lg-4">
						<div class="footer-social text-center text-lg-end my-1">
							<?php echo get_theme_mod('footer_right'); ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php } ?>
	<!-- Case study Modal -->
    <div class="modal fade" id="csModal" tabindex="-1" aria-labelledby="csModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <div>
                        <a href="#" id="download-file" class="btn btn-primary btn-print rounded ps-4 pe-4 pt-1 pb-1 text-uppercase" download><span class=""></span> Download</a>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body text-center">
                    <span class="loader-2 text-danger"></span>
                    <div id="modal-body"></div>
                </div>
            </div>
        </div>
        <!-- <div class="modal-nav">
            <button class="btn btn-prev" id="prevpost"><span class="icon-left-arrow"></span></button>
            <button class="btn btn-next" id="nextpost"><span class="icon-next-arrow"></span></button>
        </div> -->
    </div>
    <?php wp_footer(); ?>
    </body>
</html>