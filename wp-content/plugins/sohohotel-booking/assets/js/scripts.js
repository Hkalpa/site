jQuery(document).ready(function($) {

	"use strict";
	
	$(document).on("click",'.external_bookingbutton', function(e) {
		
		var sh_validation_error = false;
		var sh_booking_length_error = false;
		
		if ( !$('#check_in').val() ) {
			sh_validation_error = true;
		}
		
		if ( !$('#check_out').val() ) {
			sh_validation_error = true;
		}
		
		if ( $('#check_in').val() == sohohotel_check_in_txt ) {
			sh_validation_error = true;
		}
		
		if ( $('#check_out').val() == sohohotel_check_out_txt ) {
			sh_validation_error = true;
		}
		
		if ( sohohotel_date_validation($('#check_in_alt').val(), $('#check_out_alt').val()) == true ) {
			sh_validation_error = true;
		}
		
		var sh_booking_length =  Math.floor(( Date.parse($('#check_out_alt').val()) - Date.parse($('#check_in_alt').val()) ) / 86400000); 
		
		if ( sh_booking_length < sohohotel_bookingMinBookPeriod ) {
			sh_booking_length_error = true;
		}

		if ( sh_validation_error == true ) {
			alert(sohohotel_date_msg);
			return false;
		}
		
		if ( sh_booking_length_error == true ) {
			alert(sohohotel_booking_length_error_msg);
			return false;
		}
		
	});
	
	// Format the date
	function sohohotel_format_date(dateInput) {
		
		var date_array = new Array();
		date_array = dateInput.split('-');

		if ( datepickerDateFormat == 'dd/mm/yy' ) {			
			var newDate = (date_array[2] + "/" + date_array[1] + "/" + date_array[0]);
		}
		
		if ( datepickerDateFormat == 'mm/dd/yy' ) {
			var newDate = (date_array[1] + "/" + date_array[2] + "/" + date_array[0]);
		}
		
		if ( datepickerDateFormat == 'yy/mm/dd' ) {
			var newDate = (date_array[0] + "/" + date_array[1] + "/" + date_array[2]);
		}
		
		return newDate;
		
	}
	
	// Load Datepicker Function
	function sohohotel_load_datepicker() {

		jQuery("#check_in").datepicker({
			minDate: new Date(),
			dateFormat: datepickerDateFormat,
			dayNamesMin: sohohotel_datepicker_days,
			monthNames: sohohotel_datepicker_months,
			firstDay: 1,
			dateFormat: datepickerDateFormat,
			altFormat: "yy-mm-dd",
			altField: "#check_in_alt",
			onSelect: function (date) {
	            var date2 = $("#check_in").datepicker('getDate');
	            date2.setDate(date2.getDate() +1 );
	            $("#check_out").datepicker('option', 'minDate', date2);
	        }
		});

		jQuery("#check_out").datepicker({
			minDate: new Date(),
			dateFormat: datepickerDateFormat,
			dayNamesMin: sohohotel_datepicker_days,
			monthNames: sohohotel_datepicker_months,
			firstDay: 1,
			dateFormat: datepickerDateFormat,
			altFormat: "yy-mm-dd",
			altField: "#check_out_alt",
			onClose: function () {
	            var dt1 = $("#check_in").datepicker('getDate');
	            var dt2 = $("#check_out").datepicker('getDate');
	            if (dt2 <= dt1) {
	                var minDate = $("#check_out").datepicker('option', 'minDate');
	                $("#check_out").datepicker('setDate', minDate);
	            }
	        }
		});

	}
	
	// Payment Method Accordion
	function sohohotel_load_accordion() {
		
		$('div.payment_method').accordion({event: 'mouseup', heightStyle: 'content'});
		$('div.payment_method h3').on('click', function() {
			$('input', this).prop('checked', true);
		});
		$('div.payment_method h3 input').on('click', function() {
			$(this).prop('checked', true);
		});
		$('div.payment_method h3 input').first().prop('checked', true);
		
	}
	
	// Check the check in date is before the check out date
	function sohohotel_date_validation(date1, date2) {
	    return new Date(date1) > new Date(date2);
	}
	
	// Valid booking form fields
	function sohohotel_field_validation() {
		
		var sh_validation_error = false;
		
		if ( !$('#open_date_from').val() ) {
			sh_validation_error = true;
		}
		
		if ( !$('#open_date_to').val() ) {
			sh_validation_error = true;
		}

		if ( sohohotel_date_validation($('#open_date_from').val(), $('#open_date_to').val()) == true ) {
			sh_validation_error = true;
		} 
		
		if ( sh_validation_error == true ) {
			return true;
		} else {
			return false;
		}

	}
	
	function sohohotel_required_field() {
		
		var sh_validation_error = false;
		
		$('.sh-required-field').each(function() {
			if ($.trim($(this).val()) == '') {
				sh_validation_error = true;
			}
		});
		
		if ( sh_validation_error == true ) {
			return true;
		} else {
			return false;
		}
		
	}
	
	function sohohotel_email_validation(email) {
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
	
	function sohohotel_email_field_validation() {
		
		var sh_validation_error = false;
		
		$('.email_validation').each(function() {
			
			if ( sohohotel_email_validation( $(this).val() ) == false ) {
				sh_validation_error = true;
			}
		
		});
		
		if ( sh_validation_error == true ) {
			return true;
		} else {
			return false;
		}
		
	}
	
	function sohohotel_number_field_validation() {
		
		var sh_validation_error = false;
		
		$('.number_validation').each(function() {
	
			if( !$.isNumeric($(this).val()) ) {
				sh_validation_error = true;
			} 
			
		});
		
		if ( sh_validation_error == true ) {
			return true;
		} else {
			return false;
		}
		
	}
	
	// Add/Remove Rooms For Booking Form Function
	function sohohotel_add_remove_rooms() {
		
		var i = '';

		var selectedVal = jQuery('#book_room').val();
		jQuery('.rooms-wrapper div[class^="room-"]:not(div.room-1)').hide();

		for(i = 1; i <= selectedVal; i++ ) {
			jQuery('div[class^=room-'+ i +']').show();
		}

		jQuery('#book_room').change(function(e) {
			jQuery('.rooms-wrapper div[class^="room-"]').hide();
			e.preventDefault();
			var selectedVal = jQuery(this).val();

			if(selectedVal > 1) {
				for(i = 1; i <= selectedVal; i++ ) {
					jQuery('div[class^=room-'+ i +']').show();
				}
			}
			else {
				jQuery('div.room-1').show();
			}		
		});
		
	}
	
	// Load prettyPhoto
	function sohohotel_load_prettyphoto() {
		
		// PrettyPhoto
		$("a[data-gal^='prettyPhoto']").prettyPhoto({
			hook: 'data-gal',
			animation_speed: 'fast',
			slideshow: 5000,
			autoplay_slideshow: false,
			opacity: 0.80, 
			show_title: true, 
			allow_resize: true, 
			default_width: 500,
			default_height: 344,
			counter_separator_label: '/', 
			theme: 'pp_default', 
			horizontal_padding: 20, 
			hideflash: false, 
			wmode: 'opaque', 
			autoplay: true, 
			modal: false, 
			deeplinking: true, 
			overlay_gallery: true, 
			keyboard_shortcuts: true,
			changepicturecallback: function(){}, 
			callback: function(){}, 
			ie6_fallback: true,
			markup: '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
								<div class="pp_right"> \
									<div class="pp_content"> \
										<div class="pp_loaderIcon"></div> \
										<div class="pp_fade"> \
											<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
											<div class="pp_hoverContainer"> \
												<a class="pp_next" href="#">next</a> \
												<a class="pp_previous" href="#">previous</a> \
											</div> \
											<div id="pp_full_res"></div> \
											<div class="pp_details"> \
												<div class="pp_nav"> \
													<a href="#" class="pp_arrow_previous">Previous</a> \
													<p class="currentTextHolder">0/0</p> \
													<a href="#" class="pp_arrow_next">Next</a> \
												</div> \
												<p class="pp_description"></p> \
												{pp_social} \
												<a class="pp_close" href="#"><i class="fa fa-close"></i></a> \
											</div> \
										</div> \
									</div> \
								</div> \
								</div> \
							</div> \
							<div class="pp_bottom"> \
								<div class="pp_left"></div> \
								<div class="pp_middle"></div> \
								<div class="pp_right"></div> \
							</div> \
						</div> \
						<div class="pp_overlay"></div>',
				gallery_markup: '<div class="pp_gallery"> \
									<a href="#" class="pp_arrow_previous">Previous</a> \
									<div> \
										<ul> \
											{gallery} \
										</ul> \
									</div> \
									<a href="#" class="pp_arrow_next">Next</a> \
								</div>',
				image_markup: '<img id="fullResImage" src="{path}" />',
				flash_markup: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
				quicktime_markup: '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
				iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
				inline_markup: '<div class="pp_inline">{content}</div>',
				custom_markup: '',
				social_tools: '<div class="pp_social"><div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href='+location.href+'&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div></div>' 
		});
		
	}
	
	// Load Datepicker
	sohohotel_load_datepicker();
	
	// Make Datepicker Fields Read Only
	jQuery(".datepicker").attr('readonly', true);
	
	// Booking page open datepicker
    jQuery("#open_datepicker").datepicker({
		dayNamesMin: sohohotel_datepicker_days,
		monthNames: sohohotel_datepicker_months,
		firstDay: 1,
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 2,
        minDate: 0,
        beforeShowDay: function(date) {
	
            var date1 = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#check_in_alt").val());
            var date2 = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#check_out_alt").val());



            return [true, date1 && ((date.getTime() == date1.getTime()) || (date2 && date >= date1 && date <= date2)) ? "dp-highlight" : ""];
        },
        onSelect: function(dateText, inst) {
            var dateTextForParse = (inst.currentMonth + 1) + '/' + inst.currentDay + '/' + inst.currentYear;

            var date1 = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#check_in_alt").val());
            var date2 = jQuery.datepicker.parseDate('yy-mm-dd', jQuery("#check_out_alt").val());
			
            if (!date1 || date2) {
	
                jQuery("#open_date_from").val( sohohotel_format_date(dateText) );
                jQuery("#open_date_to").val("");

				jQuery("#check_in_alt").val(dateText);
                jQuery("#check_out_alt").val("");

            } else {
                if(Date.parse(dateTextForParse) < Date.parse(date1))
                {
	
                    jQuery("#open_date_from").val( sohohotel_format_date(dateText) );
                    jQuery("#open_date_to").val("");

					jQuery("#check_in_alt").val(dateText);
                    jQuery("#check_out_alt").val("");

                }
                else
                {
	
                    jQuery("#open_date_to").val( sohohotel_format_date(dateText) );
					jQuery("#check_out_alt").val(dateText);
					
                }
            }
        }
    });
	
	sohohotel_add_remove_rooms();
	
	$(".bookingbutton").submit(function() { return false; });
	$(".select-room-button").submit(function() { return false; });
	
	$(document).on("click",'.bookingbutton, .select-room-button, .edit-room-button, .select-services, .edit-booking-button, .apply-coupon-button, .booking_payment', function(e) {
		
		// Booking step 1 button
		if( $(this).attr("class") == 'bookingbutton' ) {
			
			var sh_booking_length_error = false;
			var sh_booking_length =  Math.floor(( Date.parse($('#check_out_alt').val()) - Date.parse($('#check_in_alt').val()) ) / 86400000); 

			if ( sh_booking_length < sohohotel_bookingMinBookPeriod ) {
				sh_booking_length_error = true;
			}
			
			if ( sohohotel_field_validation() == true ) {
				alert(sohohotel_date_msg);
				return false;
			}
			
			if ( sh_booking_length_error == true ) {
				alert(sohohotel_booking_length_error_msg);
				return false;
			}
			
		}
		
		// Coupon button
		if( $(this).attr("class") == 'apply-coupon-button' ) {
			
			var fired_button = $(this).val();
			$(".apply_coupon_hidden").val("true");	
			
		}
		
		// Booking payment button
		if( $(this).attr("class") == 'booking_payment' ) {
			
			$(".booking-payment-data").val("true");	
			
			if( sohohotel_terms_set == 'true' ) {
				
				if( $('.terms_and_conditions').is(':checked') == false ) {
		            alert(sohohotel_terms_msg);
					return false;
		        }
				
			}
			
			if ( sohohotel_required_field() == true ) {
				alert(sohohotel_required_msg);
				return false;
			}
			
			if ( sohohotel_email_field_validation() == true ) {
				alert(sohohotel_invalid_email_msg);
				return false;
			}
			
			if ( sohohotel_number_field_validation() == true ) {
				alert(sohohotel_invalid_phone_msg);
				return false;
			}
					
		}
		
		// Booking Step 2, get the selected room button value and add it to an input field for submission
		if( $(this).attr("class") == 'select-room-button' ) {
			
			var fired_button = $(this).val();
			$(".selected-room").val(fired_button);	
			
		}
		
		// Booking Step 2, get the selected room button value and add it to an input field for submission
		if( $(this).attr("class") == 'edit-room-button' ) {
			
			var fired_button = $(this).val();
			$(".edit-room-field").val(fired_button);	
			
		}
		
		// AJAX
		$.ajax({
			type: 'POST',
			url: sohohotel_booking_AJAX_URL,
			data: $('.booking-form-data').serialize(),
			dataType: 'json',
			success: function(response) {
				
				if (response.status == 'success') {
					$('.booking-form-data')[0].reset();
				}
				
				$('.booking-step-wrapper').html(response.booking_step_wrapper);
				$('.booking-main').html(response.booking_main);
				$('.booking-side').html(response.booking_side);
				
				sohohotel_load_datepicker();
				sohohotel_add_remove_rooms();
				sohohotel_load_prettyphoto();
				sohohotel_load_accordion();
				
				// Scroll to top for each booking step
				$('html,body').animate({
				   scrollTop: $(".booking-step-wrapper").offset().top
				});
				
				$('.booking-main').css('opacity','1');
				$('.booking-side').css('opacity','1');
				
				$(".remaining-rooms").fadeIn(800).fadeOut(800).fadeIn(800).fadeOut(800).fadeIn(800).fadeOut(800).fadeIn(800);

			}
		});
		
		$('.booking-main').css('opacity','0.3');
		$('.booking-side').css('opacity','0.3');
		
		return false;
		
	});
	
	$(document).on("click",'.calendar_button_prev, .calendar_button_next, .calendar_button_current, .calendar_button_custom', function(e) {
		
		if( $(this).attr("class") == 'calendar_button_prev' ) {
			$('.sh_calendar_navigation').val('prev');
		}
		
		if( $(this).attr("class") == 'calendar_button_next' ) {
			$('.sh_calendar_navigation').val('next');
		}
		
		if( $(this).attr("class") == 'calendar_button_current' ) {
			$('.sh_calendar_navigation').val('current');
		}
		
		if( $(this).attr("class") == 'calendar_button_custom' ) {
			$('.sh_calendar_navigation').val('custom');
		}
		
		var message = $('#message').val();
		var name = $('#name').val();
		var email = $('#email').val();
			
		$.ajax({
			type: 'POST',
			url: sohohotel_booking_AJAX_URL,
			data: $('.availability_checker_form').serialize(),
			dataType: 'json',
			success: function(response) {
				
				if (response.status == 'success') {
					$('.availability_checker_form')[0].reset();
				}
				
				$('.sh-availability-calendar-wrapper').html(response.content);
				$('.sh-availability-calendar-wrapper').css('opacity','1');
				
			}
		});
		
		$('.sh-availability-calendar-wrapper').css('opacity','0.3');
		
		return false;
		
		
	});
	
	
});