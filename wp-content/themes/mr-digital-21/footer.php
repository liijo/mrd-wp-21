<!-- Footer -->
	<?php if ( is_active_sidebar( 'mrd-footer-logo-widgets' ) ) { ?>
	    <section class="bottom-logos text-center">
			<div class="container">
				<div class="row align-items-center">
			        <?php dynamic_sidebar('mrd-footer-logo-widgets'); ?>
			    </div>
			</div>
		</section>
	<?php } ?>

	<!-- ===== FOOTER ===== -->
	<?php if ( is_active_sidebar( 'mrd-footer-widgets' ) ) { ?>
	<footer class="site-footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('mrd-footer-widgets'); ?>
				</div>
			</div>
		</div>
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
	
    <?php wp_footer(); ?>
    </body>
</html>