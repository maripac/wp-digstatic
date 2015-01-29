<?php 
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>

		</div> <!-- end row -->
	</div> <!-- end container -->

	<!-- FOOTER -->
	<footer class="site-footer">
		<div class="container-frame">
			<div class="row">
				<?php get_sidebar( 'footer' ); ?>

				<div class="copyright">
					<p>
						&copy; <?php echo date( 'Y' ); ?>
						<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php _e( 'All rights reserved.', 'alpha' ); ?>
					</p>
				</div> <!-- end copyright -->
			</div>
		</div> <!-- end container -->
	</footer> <!-- end site-footer -->

	<?php wp_footer(); ?>
</body>

</html>