<?php 

$sh_booking_data = $_SESSION['sh_booking_data']; ?>

<!-- BEGIN .room-sidebar-wrapper -->
<div class="room-sidebar-wrapper">

	<h4><?php echo esc_html__('Booking Details', 'sohohotel_booking'); ?></h4>
	<div class="title-block-3"></div>
	<ul>
		<li><span><?php esc_html_e('Check In', 'sohohotel_booking'); ?>:</span> <?php echo sh_display_formatted_date($sh_booking_data["check_in"]); ?></li>
		<li><span><?php esc_html_e('Check Out', 'sohohotel_booking'); ?>:</span> <?php echo sh_display_formatted_date($sh_booking_data["check_out"]); ?></li>
	</ul>

	<div class="clearboth"></div>

<!-- END .room-sidebar-wrapper -->
</div>

<?php foreach (range(1, $sh_booking_data["book_room"]) as $r) { ?>
	
	<?php if ( $sh_booking_data["room_" . $r] != '' or $r == '1' && sh_get_current_room() == '1') { ?>
		
		<?php if( $sh_booking_data["room_" . $r ]["room_id"] != '' ) { ?>
		
		<div class="room-sidebar-wrapper">
			
			<?php if( $sh_booking_data["room_" . $r ]["room_name"] == '' ) {
				$room_title = esc_html__('Select room ', 'sohohotel_booking') . $r;
			} else {
				$room_title = esc_html__('Room', 'sohohotel_booking') . ' ' . $r . ' ' . esc_html__('of', 'sohohotel_booking') . ' ' . $sh_booking_data["book_room"];
			} ?>

			<h4><?php echo $room_title; ?></h4>
			<div class="title-block-3"></div>
			<ul>
				<li><span><?php esc_html_e('Room', 'sohohotel_booking'); ?>:</span> <?php echo $sh_booking_data["room_" . $r ]["room_name"]; ?></li>
				<li><span><?php esc_html_e('Guests', 'sohohotel_booking'); ?>:</span> <?php echo $sh_booking_data["room_" . $r ]["adults"]; ?> <?php esc_html_e('Adult(s)', 'sohohotel_booking'); ?>, <?php echo $sh_booking_data["room_" . $r ]["children"]; ?> <?php esc_html_e('Children', 'sohohotel_booking'); ?></li>
			</ul>
			
			<?php if ( $sh_booking_data["room_" . $r ]["room_name"] != '' ) { ?>
				<button class="edit-room-button" name="edit-room" type="submit" value="<?php echo $r; ?>"><?php esc_html_e('Edit Room', 'sohohotel_booking'); ?></button>
			<?php } ?>
			
			<div class="clearboth"></div>
		</div>
		
	<?php } ?>
	
	<?php } ?>
	
<?php } ?>

<?php if ( $_SESSION['sh_booking_data']["room_1"]["room_id"] == '' ) { ?>

	<div class="room-sidebar-wrapper">

		<h4><?php esc_html_e('Select Room', 'sohohotel_booking'); ?></h4>
		<div class="title-block-3"></div>
		<ul>
			<li><span><?php esc_html_e('Room', 'sohohotel_booking'); ?>:</span> </li>
			<li><span><?php esc_html_e('Guests', 'sohohotel_booking'); ?>:</span> <?php echo $sh_booking_data["room_1"]["adults"]; ?> <?php esc_html_e('Adult(s)', 'sohohotel_booking'); ?>, <?php echo $sh_booking_data["room_1"]["children"]; ?> <?php esc_html_e('Children', 'sohohotel_booking'); ?></li>
		</ul>

	</div>
	
<?php } ?>