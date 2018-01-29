<?php

global $sohohotel_allowed_html_array_header;
$sohohotel_page_header_image = sohohotel_page_header('');

// Stripe library
require sohohotel_booking_BASE_DIR .'/includes/stripe/Stripe.php';

$stripe_result = sohohotel_stripe_payment($_POST);

if ( !empty($stripe_result) ) {
	
	global $sohohotel_data;
	
	if ( $stripe_result["payment_status"] == 'success' ) {
		
		echo '<div id="page-header"' . wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header) . '>';
		echo '<h1>' . get_the_title() . '</h1>';
		echo '<div class="title-block-5"></div>';
		echo dimox_breadcrumbs();
		echo '</div>';
		
		echo '<div class="content-wrapper-max-width content-wrapper clearfix booking-response-page">';
		echo '<div class="main-content main-content-full">';
		echo '<p>' . esc_html__('Your payment has been processed successfully, please check your email for details.', 'sohohotel_booking') . '</p>';
		echo '</div>';
		echo '</div>';
		
	}
	
} elseif ( !empty($_GET["paypal"]) ) {
	
	$get_paypal = $_GET["paypal"];
	
	if ( $get_paypal == 'thanks' ) {
		
		echo '<div id="page-header"' . wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header) . '>';
		echo '<h1>' . get_the_title() . '</h1>';
		echo '<div class="title-block-5"></div>';
		echo dimox_breadcrumbs();
		echo '</div>';
		
		echo '<div class="content-wrapper-max-width content-wrapper clearfix booking-response-page">';
		echo '<div class="main-content main-content-full">';
		echo '<p>' . esc_html__('Your PayPal payment has been processed successfully, please check your email for details.', 'sohohotel_booking') . '</p>';
		echo '</div>';
		echo '</div>';
	
	} elseif ( $get_paypal == 'notify' ) {
		
		// PayPal IPN
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		if (preg_match('/paypal\.com$/', $hostname)) {	
			$obj = New PayPal_IPN();
			$obj->ipn_response($_REQUEST);		
		}
		
	} elseif ( $get_paypal == 'cancel' ) {
		
		echo '<div id="page-header"' . wp_kses($sohohotel_page_header_image, $sohohotel_allowed_html_array_header) . '>';
		echo '<h1>' . get_the_title() . '</h1>';
		echo '<div class="title-block-5"></div>';
		echo dimox_breadcrumbs();
		echo '</div>';
		
		echo '<div class="content-wrapper-max-width content-wrapper clearfix booking-response-page">';
		echo '<div class="main-content main-content-full">';
		echo '<p>' . esc_html__('Your PayPal payment has been cancelled.', 'sohohotel_booking') . '</p>';
		echo '</div>';
		echo '</div>';
		
	}
	
} elseif ( isset($_POST["stripe_payment"]) ) {
	
	global $sohohotel_data;
	
	$params = array(
		"testmode"   => $sohohotel_data['stripe-testmode'],
		"private_live_key" => $sohohotel_data['stripe-live-secret-key'],
		"public_live_key"  => $sohohotel_data['stripe-live-publishable-key'],
		"private_test_key" => $sohohotel_data['stripe-test-secret-key'],
		"public_test_key"  => $sohohotel_data['stripe-test-publishable-key']
	);
	
	if ($params['testmode'] == "on") {
		Stripe::setApiKey($params['private_test_key']);
		$pubkey = $params['public_test_key'];
	} else {
		Stripe::setApiKey($params['private_live_key']);
		$pubkey = $params['public_live_key'];
	} ?>
	
<!-- BEGIN .booking-page-wrapper -->
<div class="booking-page-wrapper">

	<!-- BEGIN .booking-page -->
	<div class="booking-page clearfix">

		<div class="booking-step-wrapper clearfix">
		<?php echo sh_display_booking_steps('3'); ?>
		</div>

		<!-- BEGIN .booking-main-wrapper -->
		<div class="booking-main-wrapper">

			<!-- BEGIN .booking-main -->
			<div class="booking-main">

				<form action="" method="POST" id="payment-form">

					<span class="payment-errors"></span>

					<label><?php esc_html_e( 'Card Holder Name', 'sohohotel_booking' ); ?></label>
					<input size="20" data-stripe="name" type="text" />

					<label><?php esc_html_e( 'Card Number', 'sohohotel_booking' ); ?></label>
					<input type="text" size="20" data-stripe="number" />

					<div class="clearfix">

						<div class="qns-one-half">
							<label><?php esc_html_e( 'Expiration (MM)', 'sohohotel_booking' ); ?></label>
							<input type="text" size="2" data-stripe="exp_month" />
						</div>

						<div class="qns-one-half last-col">
							<label><?php esc_html_e( 'Expiration (YY)', 'sohohotel_booking' ); ?></label>
							<input type="text" size="2" data-stripe="exp_year" />
						</div>

					</div>

					<label><?php esc_html_e( 'CVC', 'sohohotel_booking' ); ?></label>
					<input type="text" size="4" data-stripe="cvc" />

					<input type="hidden" name="pay_now" value="true" />
					<input type="hidden" name="payment-method" value="stripe" />
					
					<input type="hidden" name="price" value="<?php echo $_POST["price"]; ?>" />
					<input type="hidden" name="booking_id" value="<?php echo $_POST["booking_id"]; ?>" />
					
					<button type="submit">
						<?php esc_html_e( 'Confirm & Pay', 'sohohotel_booking' ); ?>
						<i class="fa fa-angle-right"></i>
					</button>

				</form>

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
				<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
				<!-- TO DO : Place below JS code in js file and include that JS file -->
				<script type="text/javascript">
					Stripe.setPublishableKey('<?php echo $pubkey; ?>');

					$(function() {
					  var $form = $('#payment-form');
					  $form.submit(function(event) {
						// Disable the submit button to prevent repeated clicks:
						$form.find('.submit').prop('disabled', true);

						// Request a token from Stripe:
						Stripe.card.createToken($form, stripeResponseHandler);

						// Prevent the form from being submitted:
						return false;
					  });
					});

					function stripeResponseHandler(status, response) {
					  // Grab the form:
					  var $form = $('#payment-form');

					  if (response.error) { // Problem!

						// Show the errors on the form:
						$form.find('.payment-errors').css( "display", "block" );
						$form.find('.payment-errors').text(response.error.message);
						$form.find('.submit').prop('disabled', false); // Re-enable submission

					  } else { // Token was created!

						// Get the token ID:
						var token = response.id;

						// Insert the token ID into the form so it gets submitted to the server:
						$form.append($('<input type="hidden" name="stripeToken">').val(token));

						// Submit the form:
						$form.get(0).submit();
					  }
					};
				</script>
				
			<!-- END .booking-main -->
			</div>

		<!-- END .booking-main-wrapper -->
		</div>

		<!-- BEGIN .booking-side-wrapper -->
		<div class="booking-side-wrapper">

			<!-- BEGIN .booking-side -->
			<div class="booking-side">

				<?php include(sohohotel_booking_BASE_DIR . '/includes/templates/booking-step4-sidebar.htm.php'); ?>

			<!-- END .booking-side -->
			</div>

		<!-- END .booking-side-wrapper -->	
		</div>

	<!-- END .booking-page -->
	</div>

<!-- END .booking-page-wrapper -->
</div>

<?php } else {
	
	// Reset temp booking data
	//$_SESSION['sh_booking_data'] = '';

	?>
	
	<?php if ( !empty($_POST['external_form']) ) {
		
		echo '<script>
		jQuery(document).ready(function($) {	
			$(".bookingbutton").click();
		});	
		</script>';
		
	} ?>
	
	<!-- BEGIN .booking-page-wrapper -->
	<div class="booking-page-wrapper">

	<!-- BEGIN .booking-page -->
	<div class="booking-page clearfix">

		<div class="booking-step-wrapper clearfix">
		<?php echo sh_display_booking_steps('1'); ?>
		</div>

		<!-- BEGIN .booking-main-wrapper -->
		<div class="booking-main-wrapper">

			<!-- BEGIN .booking-main -->
			<div class="booking-main">

				<div id="open_datepicker"></div>
				<div class="clearboth"></div>

			<!-- END .booking-main -->
			</div>

		<!-- END .booking-main-wrapper -->
		</div>

		<!-- BEGIN .booking-side-wrapper -->
		<div class="booking-side-wrapper">

			<!-- BEGIN .booking-side -->
			<div class="booking-side">

				<h4><?php esc_html_e('Your Reservation', 'sohohotel_booking'); ?></h4>
				<div class="title-block-3"></div>

				<form name="bookroom" class="booking-form-data">

					<label for="open_date_from"><?php esc_html_e('Check In', 'sohohotel_booking'); ?></label>
					<div class="input-wrapper">
						<i class="fa fa-angle-down"></i>
						<input type="text" id="open_date_from" size="10" class="datepicker datepicker2" value="<?php if ( !empty($_POST['check_in_display']) ) { echo $_POST['check_in_display']; } ?>" />
						<input type="hidden" id="check_in_alt" name="check_in" value="<?php if ( !empty($_POST['check_in']) ) { echo $_POST['check_in']; } ?>" />
					</div>

					<label for="open_date_to"><?php esc_html_e('Check Out', 'sohohotel_booking'); ?></label>
					<div class="input-wrapper">
						<i class="fa fa-angle-down"></i>
						<input type="text" id="open_date_to" size="10" class="datepicker datepicker2" value="<?php if ( !empty($_POST['check_in_display']) ) { echo $_POST['check_out_display']; } ?>" />
						<input type="hidden" id="check_out_alt" name="check_out" value="<?php if ( !empty($_POST['check_in']) ) { echo $_POST['check_out']; } ?>" />
					</div>

					<label for="book_room"><?php esc_html_e('Rooms', 'sohohotel_booking'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="book_room" id="book_room">
							<?php foreach (range(1, $sh_get_booking_max_rooms) as $r) { ?>
								<option value="<?php echo $r; ?>" <?php if ( !empty($_POST['book_room']) ) { if ( $_POST["book_room"] == $r ) { echo 'selected'; }} ?>><?php echo $r; ?></option>
							<?php } ?>
						</select>
					</div>
					
					<!-- BEGIN .rooms-wrapper -->
					<div class="rooms-wrapper">

						<?php foreach (range(1, $sh_get_booking_max_rooms) as $i) { ?>

							<!-- BEGIN .room-<?php echo $i; ?> -->
							<div class="room-<?php echo $i; ?> clearfix">

								<p class="label"><?php esc_html_e('Room', 'sohohotel_booking'); ?> <?php echo $i; ?></p>

								<!-- BEGIN .adult-child-wrapper -->
								<div class="adult-child-wrapper clearfix">

									<div class="one-half">
										<label for="book_room_adults_<?php echo $i; ?>"><?php esc_html_e('Adults', 'sohohotel_booking'); ?></label>
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
											<select name="book_room_adults_<?php echo $i; ?>" id="book_room_adults_<?php echo $i; ?>">
												<?php foreach (range(1, $sh_get_booking_max_guests) as $r) { ?>
													<option value="<?php echo $r; ?>" <?php if ( !empty($_POST['book_room_adults_1']) ) { if ( $_POST["book_room_adults_1"] == $r ) { echo 'selected'; }} ?>><?php echo $r; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="one-half last-col">
										<label for="book_room_children_<?php echo $i; ?>"><?php esc_html_e('Children', 'sohohotel_booking'); ?></label>
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
											<select name="book_room_children_<?php echo $i; ?>" id="book_room_children_<?php echo $i; ?>">
												<?php foreach (range(0, $sh_get_booking_max_guests) as $r) { ?>
													<option value="<?php echo $r; ?>" <?php if ( !empty($_POST['book_room_children_1']) ) { if ( $_POST["book_room_children_1"] == $r ) { echo 'selected'; }} ?>><?php echo $r; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

								<!-- END .adult-child-wrapper -->
								</div>

							<!-- BEGIN .room-<?php echo $i; ?> -->
							</div>

						<?php } ?>

					<!-- BEGIN .rooms-wrapper -->
					</div>

					<input type="hidden" name="action" value="sh_booking_process_frontend_action_callback" />
					<?php echo wp_nonce_field('sh_booking_process_frontend', '_acf_nonce', true, false); ?>
					<button type="button" class="bookingbutton"><?php esc_html_e('Check Availability', 'sohohotel_booking'); ?> <i class="fa fa-calendar"></i></button>

				</form>

			<!-- END .booking-side -->
			</div>

		<!-- END .booking-side-wrapper -->	
		</div>

	<!-- END .booking-page -->
	</div>

	<!-- END .booking-page-wrapper -->
	</div>
	
<?php }