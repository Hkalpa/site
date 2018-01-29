jQuery(function($) {
	
	"use strict";
	
	$( ".ub-tabs" ).tabs();

});

jQuery( document ).ready(function($) {
	
	"use strict";
	
	function sohohotel_validate(){
		
		var validation_error = false;
	
	    $('#price-per-night').find(".price-validation").each(function() {
			
			if (this.value == "") {
				validation_error = true;
	        }
		
			if (!$.isNumeric($(this).val()) ) {
				validation_error = true;
			}
	
	    });
	
		$('#price-per-week').find(".price-validation").each(function() {
			
			if (this.value == "") {
				validation_error = true;
	        }
		
			if (!$.isNumeric($(this).val()) ) {
				validation_error = true;
			}
	
	    });
	
		$('#price-per-month').find(".price-validation").each(function() {
			
			if (this.value == "") {
				validation_error = true;
	        }
			
			if (!$.isNumeric($(this).val()) ) {
				validation_error = true;
			}
	
	    });
	
		return validation_error;
		
	}
	
	// Form Validation
	
	// Add error display box
	var ajax_test_booking_validation_errors = '<div id="validation_errors" class="error hidden"></div>';
	$('.post-type-accommodation .wrap #titlewrap').prepend( ajax_test_booking_validation_errors );
	
	// Admin field validation
	$('#publish').click(function (event) {
		
		/*var validation_error = false;
		
		$('#accommodation_pricing_meta input[type="text"]').each(function() {
			
			if ($.trim($(this).val()) == '') {
				validation_error = true;
			}
			
		});
		
		if ( validation_error == true ) {
			alert('nope');
			event.preventDefault();
		}*/
		
		// Remove all previous
		$('#validation_errors .ajax_test_booking_empty_fields').remove();
		$('#validation_errors .ajax_test_booking_invalid_price').remove();
		$('#validation_errors').css("display", "none"); 
		
		// Check if fields are empty
		$('#post .validate_price').each(function() {	
			if ($(this).val() == '') {
				$('#validation_errors .ajax_test_booking_empty_fields').remove();
				$('#validation_errors').css("display", "block"); 
				$('#validation_errors').append('<p class="ajax_test_booking_empty_fields"><strong>Please fill out all the required fields</strong></p>');
				event.preventDefault();
			}
		});
		
		// Check if price fields contain numbers
		$('#post .validate_price').each(function() {
			if (!$.isNumeric($(this).val()) ){
				$('#validation_errors').css("display", "block"); 
				$('#validation_errors .ajax_test_booking_invalid_price').remove();
				$('#validation_errors').append('<p class="ajax_test_booking_invalid_price"><strong>Please enter a valid price e.g. "10"</strong></p>');
				event.preventDefault();
			}
		});

	});

	// Add Room
	add_room();
	remove_room();
	
	function add_room() {
		$(".add-room").on( "click", function() {
	        $(this).parent().find(".ajax_test_booking-booking-rooms-wrapper").append($(".ajax_test_booking-booking-rooms-wrapper-hidden").html());
			remove_room();
			var myIndex = $(this).parent().prevAll().length + 1;
			add_room_count(myIndex);		
	    });
	}
	
	function remove_room() {
	    $(".remove-room").unbind("click").bind("click", function() {
	        $(this).parent().remove();
	    });
	}
	
	function add_room_count() {
		$(".ajax_test_booking-booking-rooms-wrapper .ajax_test_booking-booking-rooms-inner-wrapper").each(function() {
			$(this).find(".room-number span").html($(this).index() +1);
			$(this).find(".field_room_name").attr("name", "_booking_meta[room_" + ($(this).index() +1) + "_id]");
			$(this).find(".field_hotel_name").attr("name", "_booking_meta[room_" + ($(this).index() +1) + "_hotel_name]");
			$(this).find(".field_room_adults").attr("name", "_booking_meta[room_" + ($(this).index() +1) + "_adults]");
			$(this).find(".field_room_children").attr("name", "_booking_meta[room_" + ($(this).index() +1) + "_children]");
		});
	}
	
	$(function() {
		$( ".outer-tabs, .inner-tabs" ).tabs();
	});
	
	$(".datepicker").attr("readonly", true);
	
	$("body").on("focus",".datepicker", function(){
	    $(this).datepicker({dateFormat: "yy-mm-dd"});
	});
	
	function add_price_rule() {
		$(".add-price-rule").on( "click", function() {
	        $(this).parent().find(".price-rule-wrapper-outer").append($(".price-rule-wrapper").html());
			remove_price_rule();
			recacluclate();
	    });
	}
	
	function add_price_rule_season() {
		$(".add-price-rule-season").on( "click", function(e) {
	        $(this).parent().find(".price-rule-wrapper-outer").append($(".price-rule-wrapper").html());
			remove_price_rule();
			recacluclate();
			e.preventDefault();
	    });
	}
	
	function remove_price_rule() {
		$(".remove-price-rule").on( "click", function() {
	        $(this).parent().remove();
			recacluclate();
	    });
	}	
	
	function recacluclate() {
		
		$(".price-rule-wrapper-outer").each(function() {
		  $(this).children('div').each(function(index) {
		    $(this).find('.price-rule-number span').text(index + 1);
			$(this).find('.standard-adult-weekday').attr('name', 'standard-adult-weekday-' + (index + 1));
			$(this).find('.standard-adult-weekend').attr('name', 'standard-adult-weekend-' + (index + 1));
			$(this).find('.standard-child-weekday').attr('name', 'standard-child-weekday-' + (index + 1));
			$(this).find('.standard-child-weekend').attr('name', 'standard-child-weekend-' + (index + 1));
		  });
		})
		
		$(".seasonal-filter-wrapper-outer").each(function() {
		  $(this).children('div').each(function(index) {
		    $(this).find('.seasonal-filter-number span').text(index + 1);
			$(this).find('.seasonal-date-from').attr('name', 'seasonal-date-from-' + (index + 1));
			$(this).find('.seasonal-date-to').attr('name', 'seasonal-date-to-' + (index + 1));
			$(this).find('.seasonal-adult-weekday').attr('name', 'seasonal-adult-weekday-' + (index + 1));
			$(this).find('.seasonal-adult-weekend').attr('name', 'seasonal-adult-weekend-' + (index + 1));
			$(this).find('.seasonal-child-weekday').attr('name', 'seasonal-child-weekday-' + (index + 1));
			$(this).find('.seasonal-child-weekend').attr('name', 'seasonal-child-weekend-' + (index + 1));
		  });
		})
		
		$(".seasonal-filter-wrapper-outer .price-rule-wrapper-outer").each(function() {
		  $(this).children('div').each(function(index) {
		    $(this).find('.price-rule-number span').text(index + 1);
			$(this).find('.standard-adult-weekday').attr('name', 'standard-adult-weekday-' + (index + 1));
			$(this).find('.standard-adult-weekend').attr('name', 'standard-adult-weekend-' + (index + 1));
			$(this).find('.standard-child-weekday').attr('name', 'standard-child-weekday-' + (index + 1));
			$(this).find('.standard-child-weekend').attr('name', 'standard-child-weekend-' + (index + 1));
		  });
		})
		
    }

	function add_seasonal_filter() {
		$(".add-seasonal-filter").on( "click", function() {
	        $(this).parent().find(".seasonal-filter-wrapper-outer").append($(".price-templates .seasonal-filter-wrapper").html());
			remove_price_rule();
			recacluclate();
			add_price_rule_season();
	    });
	}
	
	add_price_rule();
	remove_price_rule();
	add_seasonal_filter();
	add_price_rule_season();
	
	function get_additional_price_rules(type) {

		var obj = {};
		
		$("#price-per-" + type + " #general-pricing .price-rule-wrapper-outer").each(function() {
			
			$(this).children('div').each(function(index) {
				
				obj[(index + 1)] = {
					price_adult_weekdays: $('#price-per-' + type + ' input[name=standard-adult-weekday-' + (index + 1) + ']').val(), 
					price_adult_weekends: $('#price-per-' + type + ' input[name=standard-adult-weekend-' + (index + 1) + ']').val(),
					price_child_weekdays: $('#price-per-' + type + ' input[name=standard-child-weekday-' + (index + 1) + ']').val(),
					price_child_weekends: $('#price-per-' + type + ' input[name=standard-child-weekend-' + (index + 1) + ']').val()
				};	
				
			});
		})
		
		return obj;
		
	}
	
	function get_seasonal_price_rules(type) {
		
        var obj1 = {};

        $("#price-per-" + type + " .seasonal-filter-wrapper-outer").each(function() {

            $(this).children('.seasonal-filter-wrapper-inner').each(function(index) {
	
                var obj2 = {};

                $(this).find('.price-rule-wrapper-inner').each(function(index2) {
					
                    obj2[(index2 + 1)] = {

                        price_adult_weekdays: $(this).find('input[name=standard-adult-weekday-' + (index2 + 1) + ']').val(),
                        price_adult_weekends: $(this).find('input[name=standard-adult-weekend-' + (index2 + 1) + ']').val(),
                        price_child_weekdays: $(this).find('input[name=standard-child-weekday-' + (index2 + 1) + ']').val(),
                        price_child_weekends: $(this).find('input[name=standard-child-weekend-' + (index2 + 1) + ']').val()

                    };

                });

                obj1[(index + 1)] = {

                    date_range_from: $(this).find('input[name=seasonal-date-from-' + (index + 1) + ']').val(),
                    date_range_to: $(this).find('input[name=seasonal-date-to-' + (index + 1) + ']').val(),
                    season_adult_weekdays: $(this).find('input[name=seasonal-adult-weekday-' + (index + 1) + ']').val(),
                    season_adult_weekends: $(this).find('input[name=seasonal-adult-weekend-' + (index + 1) + ']').val(),
                    season_child_weekdays: $(this).find('input[name=seasonal-child-weekday-' + (index + 1) + ']').val(),
                    season_child_weekends: $(this).find('input[name=seasonal-child-weekend-' + (index + 1) + ']').val(),
                    price:  Object.assign({}, obj2)

                };

            });
        })

        return obj1;

    }
	
	$("#publish").on( "click", function(e) {
		
		if ( sohohotel_validate() == true ) {
			alert('Please fill out all price fields, and make sure only numeric values are entered');
			e.preventDefault();
		}
		
		$(".price_filter_data_1").val( JSON.stringify( get_additional_price_rules('night') ) );
		$(".price_filter_data_3").val( JSON.stringify( get_additional_price_rules('week') ) );
		$(".price_filter_data_5").val( JSON.stringify( get_additional_price_rules('month') ) );
		
		$(".price_filter_data_2").val( JSON.stringify( get_seasonal_price_rules('night') ) );
		$(".price_filter_data_4").val( JSON.stringify( get_seasonal_price_rules('week') ) );
		$(".price_filter_data_6").val( JSON.stringify( get_seasonal_price_rules('month') ) );
		
    });
	
	// Booking Section
	$.recacluclate = function()
    	{
        	var cnt = 1;
        	$( ".booking-rooms-wrapper-outer").children('div').each(function(index) {
            		$(this).find('h3').text('Room ' + (index + 1));
					$(this).find('input[name=room_number]').val('Room ' + (index + 1));
			$(this).find('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});		
        	});
    	}

    	$.attachListeners = function()
    	{
		$( ".booking-rooms-wrapper-outer").children('div').each(function(index, item) {
			var el = $(item);
			el.find(".remove_room" ).click(function() {
        	        	$(this).parent('div').parent('div').remove();
        	        	$.recacluclate();
						alert('Please click "Update" or "Publish" to save booking before checking further availability');
        	    	});
	
        	    	el.find(".check_availability" ).click(function() {
        	        	var parent = $(this).parent('div').parent('div');
                        var obj = $.getRoomDetailsSerialize(parent);
						
						var msg_container = $(this).parent().find(".ajax_message");
						msg_container.html('<img src="http://mailgun.github.io/validator-demo/loading.gif" alt="Loading...">');

						var post_data = obj.serialize();
						post_data = post_data+'&action=sh_booking_process_backend_action_callback';

						$.ajax({
							type: 'POST',
							url: sohohotel_booking_AJAX_URL,
							data: post_data,
							dataType: 'json',
							success: function(response) {
								if (response.status == 'success') {
									$('.booking-wrapper')[0].reset();
								}
								msg_container.html(response.content);
							}
						});
						
                        alert(obj.serialize());

        	    	});
		});
    }
	
	$.recacluclate();
	$.attachListeners();
        $( "#add_room" ).click(function() {
            var el = $( ".booking-rooms-wrapper" ).clone();
            el.removeClass('booking-rooms-wrapper');
            el.appendTo(".booking-rooms-wrapper-outer");
            $.recacluclate();

            el.find(".remove_room" ).click(function() {
                $(this).parent('div').parent('div').remove();
                $.recacluclate();
				alert('Please click "Update" or "Publish" to save booking before checking further availability');
            });

            el.find(".check_availability" ).click(function() {
                var parent = $(this).parent('div').parent('div');
                var obj = $.getRoomDetailsSerialize(parent);

				var msg_container = $(this).parent().find(".ajax_message");
				msg_container.html('<img src="http://mailgun.github.io/validator-demo/loading.gif" alt="Loading...">');

				var post_data = obj.serialize();
				post_data = post_data+'&action=sh_booking_process_backend_action_callback';

				$.ajax({
					type: 'POST',
					url: sohohotel_booking_AJAX_URL,
					data: post_data,
					dataType: 'json',
					success: function(response) {
						if (response.status == 'success') {
							$('.booking-wrapper')[0].reset();
						}
						msg_container.html(response.content);
					}
				});

                //alert(obj.serialize());

            });
        });

        $( "#publish" ).click(function() {
            var data = {};
            $( ".booking-rooms-wrapper-outer").children('div').each(function(index) {
                var obj = $.getRoomDetails($(this));
                data['Room ' + (index + 1)] = obj;
            });
            $('.save_rooms').val(JSON.stringify(data));
        });

		/*submit_room_data();

		function submit_room_data() {
			$("#publish").on( "click", function() {	    
		    	
				var data = {};
	            $( ".booking-rooms-wrapper-outer").children('div').each(function(index) {
	                var obj = $.getRoomDetails($(this));
	                data['Room ' + (index + 1)] = obj;
	            });
	            $('.save_rooms').val(JSON.stringify(data));
		
		        //return false;
		
		    });
		}*/

        $.getRoomDetails = function(el) {
            var obj = {};
            obj.check_in = el.find('input[name=check_in]').val();
            obj.check_out = el.find('input[name=check_out]').val();
            obj.room_type = el.find('select[name=room_type] option:selected').val();
            obj.adults = el.find('select[name=adults] option:selected').val();
            obj.children = el.find('select[name=children] option:selected').val();
            return obj;
        }

        $.getRoomDetailsSerialize = function(el) {
            var form = $('<form><form>');
            form.append(el.find('input[name=room_number]').clone());
			form.append(el.find('input[name=check_in]').clone());
            form.append(el.find('input[name=check_out]').clone());

            var select1 = el.find('select[name=room_type]').clone();
            select1.html(el.find('select[name=room_type]').html());
            el.find('select[name=room_type]').each(function(i) {
                select1.eq(i).val($(this).val());
            });
            form.append(select1);

            var select2 = el.find('select[name=adults]').clone();
            select2.html(el.find('select[name=adults]').html());
            el.find('select[name=adults]').each(function(i) {
                select2.eq(i).val($(this).val());
            });
            form.append(select2);

            var select3 = el.find('select[name=children]').clone();
            select3.html(el.find('select[name=children]').html());
            el.find('select[name=children]').each(function(i) {
                select3.eq(i).val($(this).val());
            });
            form.append(select3);
            return form;
        }

	$.recacluclate();	
	
});