<div class="step-line"></div>

<div class="step-wrapper clearfix">
	<div class="step-icon <?php if($current_step == '1') { ?>step-icon-current<?php } ?>"><?php esc_html_e('1', 'sohohotel_booking'); ?></div>
	<div class="step-title"><?php esc_html_e('Select Date', 'sohohotel_booking'); ?></div>
</div>

<div class="step-wrapper clearfix">
	<div class="step-icon <?php if($current_step == '2') { ?>step-icon-current<?php } ?>"><?php esc_html_e('2', 'sohohotel_booking'); ?></div>
	<div class="step-title"><?php esc_html_e('Select Room', 'sohohotel_booking'); ?></div>
</div>

<div class="step-wrapper clearfix">
	<div class="step-icon <?php if($current_step == '3') { ?>step-icon-current<?php } ?>"><?php esc_html_e('3', 'sohohotel_booking'); ?></div>
	<div class="step-title"><?php esc_html_e('Enter Payment Details', 'sohohotel_booking'); ?></div>
</div>

<div class="step-wrapper last-col clearfix">
	<div class="step-icon <?php if($current_step == '4') { ?>step-icon-current<?php } ?>"><?php esc_html_e('4', 'sohohotel_booking'); ?></div>
	<div class="step-title"><?php esc_html_e('Confirmation', 'sohohotel_booking'); ?></div>
</div>