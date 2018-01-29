<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="not-found-search">
	<div class="input-wrapper">
		<input type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('Search...', 'sohohotel'); ?>';" onfocus="if(this.value=='<?php esc_html_e('Search...', 'sohohotel'); ?>')this.value='';" value="<?php esc_html_e('Search...', 'sohohotel'); ?>" name="s" />
		<i class="fa fa-search"></i>
	</div>
</form>