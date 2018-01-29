jQuery(document).ready(function($) {
	
	"use strict";
	
	// Hide booking form until JS loads
	$(".header-booking-form-wrapper").fadeIn().css("display","block");
	
	// Disable datepicker user input
	$('.datepicker').keydown(function(e) {
	   e.preventDefault();
	   return false;
	});
	
	// Do not submit forms when enter is pressed
	/*$(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	  });*/
	
	$(document).on("click",'.bookingbutton2', function() {
	
		// Validate form 2
		var form2 = $(this).closest('.booking-form-2');
	    if(form2.length === 0) {
			return;
		} 
		
		// Validate address fields
	    if ( form2.find(".pickup-address").val() == '' || form2.find(".dropoff-address").val() == '') {        
	        alert(sohohotel_pickup_dropoff_error);
	        return false;
	    }
	
	});
	
	$(document).on("click",'.bookingbutton3', function() {
	
		// Validate form 2
		var form2 = $(this).closest('.booking-form-3');
	    if(form2.length === 0) {
			return;
		} 
		
		// Validate address fields
	    if ( form2.find(".pickup-address").val() == '' || form2.find(".dropoff-address").val() == '') {        
	        alert(sohohotel_pickup_dropoff_error);
	        return false;
	    }
	
	});
	
	// Add selected vehicle data in hidden fields
	$(".select-vehicle-wrapper").on('click', '.vehicle-section', function () {
	
		$('.vehicle-section').removeClass("selected-vehicle");
		$(this).toggleClass("selected-vehicle");	
		$('.selected-vehicle-price').val( $(this).attr('data-price') );
		$('.selected-vehicle-name').val( $(this).attr('data-title') );
		
	});

	$(document).on("click",'.bookingbutton1', function() {
		
		/*// Validate form 1
		var form1 = $(this).closest('.booking-form-1');
	    if(form1.length === 0) return;
		
		// Validate address fields
	    if ( form1.find(".pickup-address").val() == '' || form1.find(".dropoff-address").val() == '') {        
	        alert(sohohotel_pickup_dropoff_error);
	        return false;
	    }*/
	
		// Validate form 1
		var form1 = $(this).closest('.booking-form-1');
	    if(form1.length === 0) {
			return;
		} 
		
		// Validate address fields
	    if ( form1.find(".pickup-address").val() == '' || form1.find(".dropoff-address").val() == '') {        
	        alert(sohohotel_pickup_dropoff_error);
	        return false;
	    }
		
		// Validate vehicle selection
		if ( form1.find(".selected-vehicle-name").val() == '') {        
	        alert(sohohotel_select_vehicle);
	        return false;
	    }
	
		// Validate form fields
		if ( form1.find(".required-form-field").val() == '') {        
	        alert(sohohotel_complete_required);
	        return false;
	    }
		
		// Add form data into array
		var $form1 = $(this).closest('.booking-form-1');
		var formData1 = $form1.serializeArray();
		formData1.push({
		    name: this.name,
		    value: this.value
		});
		
		// Post form via AJAX
		$.ajax({
			type: 'POST',
			url: AJAX_URL,
			data: formData1,
			dataType: 'json',
			success: function(response) {
				
				// AJAX success response
				if (response.status == 'success') {
					$('.booking-form-1')[0].reset();
				}
				
				// Display outside in divs
				$('.booking-step-wrapper').html(response.booking_step_wrapper);
				$('.booking-form-content').html(response.booking_form_content);
				
				// Load prettyPhoto in response
				$("a[data-gal^='prettyPhoto']").prettyPhoto();  
				
				// Scroll to top for each booking step
				$('html,body').animate({
				   scrollTop: $(".booking-step-wrapper").offset().top
				});
				
				// Add selected vehicle data in hidden fields
				$(".select-vehicle-wrapper").on('click', '.vehicle-section', function () {
				
					$('.vehicle-section').removeClass("selected-vehicle");
					$(this).toggleClass("selected-vehicle");	
					$('.selected-vehicle-price').val( $(this).attr('data-price') );
					$('.selected-vehicle-name').val( $(this).attr('data-title') );
					
				});
				
			}
			
		});	
		
	});
	
	if (document.getElementById('pickup-address1') !=null) {
		
		// Tabs
		$(function() {
			$( "#booking-tabs, #booking-tabs-2" ).tabs();

			var selectedTab=1, isAutoComplete1Valid=false, isAutoComplete2Valid=false, isAutoComplete3Valid=false, isAutoComplete4Valid=false;

			 $(document).on('click','#tab1', function(e) {
			  selectedTab=1;
			  resetTab1();
			});

			 $(document).on('click','#tab2', function(e) {
			   selectedTab=2;
			   resetTab2();
			});
			
			$(document).on('click','#tab3', function(e) {
			   selectedTab=3
			});

			function initialize() {
				
				if ( Google_AutoComplete_Country != 'ALL_COUNTRIES' ) {
					var options = {
					  componentRestrictions: {country: Google_AutoComplete_Country}
					 };
				} else {
					var options = '';
				}
				
				var input1 = document.getElementById('pickup-address1');
				var autocomplete1 = new google.maps.places.Autocomplete(input1,options);

				var input2 = document.getElementById('dropoff-address1');
				var autocomplete2 = new google.maps.places.Autocomplete(input2,options);

				var input3 = document.getElementById('pickup-address2');
				var autocomplete3 = new google.maps.places.Autocomplete(input3,options);

				var input4 = document.getElementById('dropoff-address2');
				var autocomplete4 = new google.maps.places.Autocomplete(input4,options);

				google.maps.event.addListener(autocomplete1, 'place_changed', function() {
					var place = autocomplete1.getPlace();
					if(typeof place.adr_address==='undefined'){
							alert(sohohotel_autocomplete);
							event.preventDefault();
					}
					else{
						isAutoComplete1Valid = true; 
					}
				 });

				google.maps.event.addListener(autocomplete2, 'place_changed', function() {
					var place = autocomplete2.getPlace();
					if(typeof place.adr_address==='undefined'){
							alert(sohohotel_autocomplete);
							event.preventDefault();
					}
					else{
							isAutoComplete2Valid = true;
					}
				});

				google.maps.event.addListener(autocomplete3, 'place_changed', function() {
					var place = autocomplete3.getPlace();
					if(typeof place.adr_address==='undefined'){
							alert(sohohotel_autocomplete);
							event.preventDefault();
					}
					else{
						isAutoComplete3Valid = true;
						}
				});

				google.maps.event.addListener(autocomplete4, 'place_changed', function() {
					var place = autocomplete4.getPlace();
					if(typeof place.adr_address==='undefined'){
							alert(sohohotel_autocomplete);
							event.preventDefault();
					}
					else{
						isAutoComplete4Valid = true;
					}
					});
				}


			google.maps.event.addDomListener(window, 'load', initialize);

			$( ".bookingbutton1, .bookingbutton2, .bookingbutton3" ).click(function(){
			
				if(selectedTab===1){
					if(isAutoComplete1Valid && isAutoComplete2Valid){

						$("#formOneWay").trigger('submit');

						// Fade divs and add loading image between booking steps
						$('.widget-booking-form-wrapper, .booking-step-intro, .full-booking-wrapper-3, .select-vehicle-wrapper, .trip-details-wrapper').css('opacity','0.3');
						$('.widget-booking-form-wrapper, .booking-step-intro, .full-booking-wrapper-3, .select-vehicle-wrapper, .trip-details-wrapper').css('background-image','url(' + LOADING_IMAGE + ')');

					}
					else{
						alert(sohohotel_autocomplete);
						resetTab1();
					}
				}
				
				if(selectedTab===2){
					if(isAutoComplete3Valid && isAutoComplete4Valid){

						$("#formHourly").trigger('submit');

						// Fade divs and add loading image between booking steps
						$('.widget-booking-form-wrapper, .booking-step-intro, .full-booking-wrapper-3, .select-vehicle-wrapper, .trip-details-wrapper').css('opacity','0.3');
						$('.widget-booking-form-wrapper, .booking-step-intro, .full-booking-wrapper-3, .select-vehicle-wrapper, .trip-details-wrapper').css('background-image','url(' + LOADING_IMAGE + ')');

					}
					else{
						alert(sohohotel_autocomplete);
						resetTab2();
					}
				}
				
				if(selectedTab===3){
	
						$("#formFlat").trigger('submit');

						// Fade divs and add loading image between booking steps
						$('.widget-booking-form-wrapper, .booking-step-intro, .full-booking-wrapper-3, .select-vehicle-wrapper, .trip-details-wrapper').css('opacity','0.3');
						$('.widget-booking-form-wrapper, .booking-step-intro, .full-booking-wrapper-3, .select-vehicle-wrapper, .trip-details-wrapper').css('background-image','url(' + LOADING_IMAGE + ')');
						
				}
				
			});

			function resetTab1(){
				$( "#pickup-address1" ).val("");
				$( "#dropoff-address1" ).val("");
				isAutoComplete1Valid = false; 
				isAutoComplete2Valid = false;
			}

			function resetTab2(){
				$( "#pickup-address2" ).val("");
				$( "#dropoff-address2" ).val("");
				isAutoComplete3Valid = false; 
				isAutoComplete4Valid = false;
			}

		});
		
	}
	
	

});