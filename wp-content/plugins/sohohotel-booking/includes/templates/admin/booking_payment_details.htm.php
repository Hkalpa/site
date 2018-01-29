<?php global $sohohotel_data; ?>

<!-- BEGIN .sohohotel_booking-field-wrapper -->	
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<label><?php esc_html_e('Booking Status', 'sohohotel_booking'); ?></label>
	</div>
	
	<div class="sohohotel_booking-one-third">
		
		<select name="_booking_meta[booking_status]">
			<option value="1" <?php if(!empty($booking_meta['booking_status'])) {if ($booking_meta['booking_status'] == '1') {echo 'selected';}} ?>><?php esc_html_e('Pending', 'sohohotel_booking'); ?></option>
			<option value="2" <?php if(!empty($booking_meta['booking_status'])) {if ($booking_meta['booking_status'] == '2') {echo 'selected';}} ?>><?php esc_html_e('Confirmed', 'sohohotel_booking'); ?></option>
			<option value="3" <?php if(!empty($booking_meta['booking_status'])) {if ($booking_meta['booking_status'] == '3') {echo 'selected';}} ?>><?php esc_html_e('Cancelled', 'sohohotel_booking'); ?></option>
		</select>

	</div>
	
	<div class="sohohotel_booking-one-third"></div>
			
<!-- END .sohohotel_booking-field-wrapper -->	
</div>

<hr class="space1" />

<!-- BEGIN .sohohotel_booking-field-wrapper -->	
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<label><?php esc_html_e('Payment Method', 'sohohotel_booking'); ?></label>
	</div>
	
	<div class="sohohotel_booking-one-third">
		<input type="text" value="<?php if(!empty($booking_meta['payment_method'])) echo $booking_meta['payment_method']; ?>" name="_booking_meta[payment_method]" />
	</div>
	
	<div class="sohohotel_booking-one-third">
		<span class="description"><?php esc_html_e('The payment method used at the checkout','sohohotel_booking'); ?></span>
	</div>
			
<!-- END .sohohotel_booking-field-wrapper -->	
</div>

<hr class="space1" />

<!-- BEGIN .sohohotel_booking-field-wrapper -->	
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<label><?php esc_html_e('Amount Paid', 'sohohotel_booking'); ?> (<?php echo $sohohotel_data['currency_unit']; ?>)</label>
	</div>
	
	<div class="sohohotel_booking-one-third">
		<input type="text" value="<?php if(!empty($booking_meta['amount_paid'])) echo $booking_meta['amount_paid']; ?>" name="_booking_meta[amount_paid]" />
	</div>
	
	<div class="sohohotel_booking-one-third">
		<span class="description"><?php esc_html_e('The amount already paid by the guest via online payment','sohohotel_booking'); ?></span>
	</div>
			
<!-- END .sohohotel_booking-field-wrapper -->	
</div>

<hr class="space1" />

<!-- BEGIN .sohohotel_booking-field-wrapper -->	
<div class="sohohotel_booking-field-wrapper clearfix">
	
	<div class="sohohotel_booking-one-third">
		<label><?php esc_html_e('Amount Due', 'sohohotel_booking'); ?> (<?php echo $sohohotel_data['currency_unit']; ?>)</label>
	</div>
	
	<div class="sohohotel_booking-one-third">
		<input type="text" value="<?php if(!empty($booking_meta['outstanding_amount'])) echo $booking_meta['outstanding_amount']; ?>" name="_booking_meta[outstanding_amount]" />
	</div>
	
	<div class="sohohotel_booking-one-third">
		<span class="description"><?php esc_html_e('The outstanding amount owed by the guest to be paid upon arrival','sohohotel_booking'); ?></span>
	</div>
			
<!-- END .sohohotel_booking-field-wrapper -->	
</div>