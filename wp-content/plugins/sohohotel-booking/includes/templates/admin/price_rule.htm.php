<?php global $sohohotel_data; ?>

<!-- BEGIN .price-rule-wrapper-inner -->
<div class="price-rule-wrapper-inner">

	<div class="price-rule-number">
		<?php esc_html_e('Price rule #','sohohotel_booking'); ?><span><?php if( strlen($keyPrice) != 0 ) {echo $keyPrice;} else {echo $key;} ?></span>
	</div>
	
	<div class="sohohotel_booking-field-wrapper clearfix">
		<div class="sohohotel_booking-one-third"></div>
		<div class="sohohotel_booking-one-third"><label><?php esc_html_e('Weekdays (Mon - Thu)','sohohotel_booking'); ?></label></div>
		<div class="sohohotel_booking-one-third"><label><?php esc_html_e('Weekends (Fri - Sun)','sohohotel_booking'); ?></label></div>
	</div>

	<div class="sohohotel_booking-field-wrapper clearfix">
		<div class="sohohotel_booking-one-third"><?php esc_html_e('Per Adult','sohohotel_booking'); ?> (<?php echo $sohohotel_data['currency_unit']; ?>)</div>
		<div class="sohohotel_booking-one-third"><input type="text" name="<?php echo 'standard-adult-weekday' . '-'; ?><?php if( strlen($keyPrice) != 0 ) {echo $keyPrice;} else {echo $key;} ?>" <?php if( strlen($season["price_adult_weekdays"]) != 0 ) { echo 'value="'.$season["price_adult_weekdays"] . '"'; } ?><?php if( strlen($seasonPrice["price_adult_weekdays"]) != 0 ) { echo 'value="'.$seasonPrice["price_adult_weekdays"] . '"'; } ?> class="standard-adult-weekday price-validation" /></div>
		<div class="sohohotel_booking-one-third">
			
			<input type="text" name="<?php echo 'standard-adult-weekend' . '-'; ?><?php if( strlen($keyPrice) != 0 ) {echo $keyPrice;} else {echo $key;} ?>" <?php if( strlen($season["price_adult_weekends"]) != 0 ) { echo 'value="'.$season["price_adult_weekends"] . '"'; } ?><?php if( strlen($seasonPrice["price_adult_weekends"]) != 0 ) { echo 'value="'.$seasonPrice["price_adult_weekends"] . '"'; } ?> class="standard-adult-weekend price-validation" />
			</div>
	</div>
	
	<div class="sohohotel_booking-field-wrapper clearfix">
		<div class="sohohotel_booking-one-third"><?php esc_html_e('Per Child','sohohotel_booking'); ?> (<?php echo $sohohotel_data['currency_unit']; ?>)</div>
		<div class="sohohotel_booking-one-third">
			
			<input type="text" name="<?php echo 'standard-child-weekday' . '-'; ?><?php if( strlen($keyPrice) != 0 ) {echo $keyPrice;} else {echo $key;} ?>" <?php if( strlen($season["price_child_weekdays"]) != 0 ) { echo 'value="'.$season["price_child_weekdays"] . '"'; } ?><?php if( strlen($seasonPrice["price_child_weekdays"]) != 0 ) { echo 'value="'.$seasonPrice["price_child_weekdays"] . '"'; } ?> class="standard-child-weekday price-validation" />
			
			
			</div>
		<div class="sohohotel_booking-one-third"><input type="text" name="<?php echo 'standard-child-weekend' . '-'; ?><?php if( strlen($keyPrice) != 0 ) {echo $keyPrice;} else {echo $key;} ?>" <?php if( strlen($season["price_child_weekends"]) != 0 ) { echo 'value="'.$season["price_child_weekends"] . '"'; } ?><?php if( strlen($seasonPrice["price_child_weekends"]) != 0 ) { echo 'value="'.$seasonPrice["price_child_weekends"] . '"'; } ?> class="standard-child-weekend price-validation" /></div>
	</div>
		
	<button class="button remove-price-rule" type="button"><?php esc_html_e('Remove price filter','sohohotel_booking'); ?></button>

<!-- END .price-rule-wrapper-inner -->
</div>