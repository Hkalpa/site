<?php global $sohohotel_data; ?>

<!-- BEGIN .footer -->
<footer class="footer">

	<!-- BEGIN .footer-inner -->
	<div class="footer-inner clearfix">

		<?php if ( is_active_sidebar('footer-widget-area') ) { ?>
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
		<?php } ?>
		
	<!-- END .footer-inner -->
	</div>

	<!-- BEGIN .footer-bottom -->
	<div class="footer-bottom">
		
		<!-- BEGIN .footer-bottom-inner -->
		<div class="footer-bottom-inner">
		
			<?php echo sohohotel_footer_social_icons(); ?>
			
			<?php if( $sohohotel_data['footer-message'] ) { ?>
				<p class="footer-message"><?php echo esc_attr($sohohotel_data['footer-message']); ?></p>
			<?php } ?>
		
		<!-- END .footer-bottom-inner -->
		</div>
		
	<!-- END .footer-bottom -->
	</div>

<!-- END .footer -->	
</footer>

<!-- END .boxed-wrapper -->
</div>

<!-- END .outer-wrapper -->
</div>

<?php wp_footer(); ?>

<!-- END body -->
</body>
</html>