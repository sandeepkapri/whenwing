$(document).ready(function () {
	$('#hamburger-icon').click(function () {
		$(this).toggleClass('open');
		$('#nav-menu').toggle();
		$('#hamburger-icon span').toggleClass('black-bg');
	});

	function isEmail(email) {
		let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
	function isEmpty(str) {
		if (str == '' || str == ' ' || str == null)
			return true;
	}
	function isPassword(password) {
		let regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,20}$/;
		return regex.test(password);
	}

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}

	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function forceDigitOnly(e, errorSelector) {
		//if the letter is not digit then display error and don't display anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			$(errorSelector).html("Digits Only").show();
			return false;
		}
		else {
			$(errorSelector).html("");
		}
		return true;
	}
	function validateImage(imageSelector, errorSelector, msg = "No image Selected.") {
		let selectorVal = $(imageSelector).val();
		let anImage;
		switch (selectorVal.substring(selectorVal.lastIndexOf('.') + 1).toLowerCase()) {
			case 'gif': case 'jpg': case 'png':
				anImage = true;
				break;
			default:
				anImage = false;
		}

		if (isEmpty(selectorVal)) {
			$(errorSelector).html(msg);
			return false;
		} else if (!anImage) {
			$(errorSelector).html('Not an Image File.');
			return false;
		} else {
			$(errorSelector).html('');
			return true;
		}
	}
	function validateInput(selectorName, errorSelector, msg = "can't be Empty") {
		let selectorVal = $(selectorName).val();
		if (isEmpty(selectorVal)) {
			$(errorSelector).html(msg);
			return false;
		} else {
			$(errorSelector).html('');
			return true;
		}
	}

	function validateInputAsEmail(selectorName, errorSelector, msg = "can't be Empty") {
		let selectorVal = $(selectorName).val();
		if (isEmpty(selectorVal)) {
			$(errorSelector).html(msg);
			return false;
		} else if (!isEmail(selectorVal)) {
			$(errorSelector).html('Not a Valid Email.');
			return false;

		} else {
			$(errorSelector).html('');
			return true;
		}
	}
	function validatePassword(pwdSelector, errorSelector, msg = "can't be Empty") {
		let pwdVal = $(pwdSelector).val();
		if (isEmpty(pwdVal)) {
			$(errorSelector).html(msg);
			return false;
		} else if (!isPassword(pwdVal)) {
			$(errorSelector).html('Not a Valid Password.');
			return false;

		} else {
			$(errorSelector).html('');
			return true;
		}
	}
	function validatePasswordMatch(pwdSelector, cnfPwdSelector, errorSelector, msg = "can't be Empty") {
		let pwdVal = $(pwdSelector).val();
		let cnfPwdVal = $(cnfPwdSelector).val();
		if (isEmpty(cnfPwdVal)) {
			$(errorSelector).html(msg);
			return false;
		}
		else if (cnfPwdVal != pwdVal) {
			$(errorSelector).html('Password doesn\'t match.');
			return false;
		} else {
			$(errorSelector).html('');
			return true;
		}

	}


	$("#nav-menu li").click(function () {
		if ($(window).width() < 990) {
			//Toggle the child but don't include them in the hide selector using .not()
			$(this).children('ul').toggle();
		}
		event.stopPropagation();
	});

	$('.oc-2').owlCarousel({
		loop: true,
		margin: 10,
		nav: true,
		navText: [
			"<span class='prev-slider-btn'>&lsaquo;&lsaquo;</span>",
			"<span class='next-slider-btn'>&rsaquo;&rsaquo;</span>"
		],
		autoplay: true,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1
			},
			800: {
				items: 2
			},
			1000: {
				items: 4
			}
		}
	})

	/************************ Provider  Form********************/

	var providerTab = $(".provider-tab");
	var loginTab = $(".login-tab");
	providerTab.click(function () {
		if (!providerTab.hasClass('active-f-tab')) {
			providerTab.addClass('active-f-tab');
			loginTab.removeClass('active-f-tab');
			$("#provider-login-form").hide();
			$("#provider-signup-form").show();
		}
	});
	loginTab.click(function () {
		if (!loginTab.hasClass('active-f-tab')) {
			loginTab.addClass('active-f-tab');
			providerTab.removeClass('active-f-tab');
			$("#provider-signup-form").hide();
			$("#provider-login-form").show();
		}
	});

	//Change Service select menu based on field select menu

	var serviceOptions = {
		"Home Services": [
			"Carpenter",
			"Painter",
			"Plumber",
			"Electrician",
			"Wood Polisher",
			"Glass and Mirror",
			"Architect",
			"Builder",
			"Interior Designer",
			"Internet Provider",
			"Laundry",
			"Pundit/Puja",
			"Photographer",
			"Web Designer and Developer",
			"Concrete Provider",
			"CCTV Camera and Installation"
		],
		"Appliance Repair": [
			"AC Service Repair and Installation",
			"Refrigerator Repair",
			"Washing Machine Repair",
			"RO/Water Purifier Repair",
			"Microwave Repair",
			"TV Repair and Installation",
			"Air Cooler Repair",
			"Geyser/Water Heater Repair",
			"Computer Repair",
			"Mobile Repair"
		],
		"Transport": [
			"Transport Services",
			"Travel"
		],
		"Personal Service": [
			"Cook",
			"Driver",
			"Yoga Trainer",
			"Dietician",
			"Naukar",
			"Security Guard",
			"Dancer",
			"Gardener"
		],
		"Showroom": [
			"Car Showroom",
			"Bike Showroom",
			"Scooty and Scooter Showroom",
			"Clothes",
			"Watch",
			"Mobile",
			"Electronics",
			"Ac and Cooler",
			"Furniture",
			"Laptop and Computer",
			"jewellery",
			"Bag and Suitcase",
			"Gifts",
			"Footwear"
		],
		"Education": [
			"IES",
			"IAS",
			"Gate",
			"CAT",
			"SSC",
			"JE",
			"CGL",
			"CHSL",
			"Army",
			"CDS",
			"XAT",
			"IIT JEE",
			"CLAT",
			"MAT",
			"CLAT PG",
			"AILET PG",
			"AILET",
			"NEET PG",
			"DU LLB",
			"AIIMS MBBS",
			"AIIMS PG",
			"JIPMER ME",
			"RBI Assistant",
			"IBS PO",
			"NDA",
			"SBI PO",
			"C/C++",
			"JAVA"
		],
		"Wedding/Party": [
			"DJ",
			"Wedding Planner",
			"Party Planner",
			"Event Photographer",
			"Bridal Makeup Artist",
			"Hair Style and Makeup",
			"Party Caterers",
			"Wedding Caterers",
			"Wedding Florist and Decoraters",
			"Farm House",
			"Halwai",
			"Tent and Decorators",
			"Mehandi Artist",
			"Band",
			"Ghori and Baggi",
			"Flower Jhumar",
			"Light set",
			"Palki Aatish Baazi and more",
			"Waiter Services",
			"Video Camereaman",
			"jewellery"
		]
	}
	var providerField = $("select[name=prov-field]");
	var providerService = $("select[name=prov-service]");
	providerField.change(function () {
		providerService.html('')  // remove all options bar first
		if (this.selectedIndex < 1)
			return; // done
		var fieldVal = $(this).val();
		$('.transport').addClass('hidden');
		$('.education').addClass('hidden');
		if (fieldVal == 'Transport') {
			$('.transport').removeClass('hidden');
		} else if (fieldVal == 'Education') {
			$('.education').removeClass('hidden');
		}
		$.each(serviceOptions, function (ind, val) {
			if (ind == fieldVal) {
				$.each(val, function (ind1, val1) {
					var optionObj = new Option(val1, val1);
					providerService.append(optionObj);
				});
			}
		});
	});
	//only digits
	$("input[name=prov-contact]").keypress(function (e) {
		return forceDigitOnly(e, ".error-prov-contact");
	});
	$(".otp").click(function () {
		var mobnumber = $("input[name=prov-contact]").val();
		var mobNumLen = mobnumber.toString().length;
		if (mobNumLen >= 10 && mobNumLen < 15) {
			var request = $.ajax({
				url: "/send-otp",
				method: "POST",
				data: { mobNum: mobnumber },
				dataType: "html"
			});
			request.done(function (msg) {
				var msgobj = $.parseJSON(msg);
				if (msgobj['status'] == 'success') {
					$(".error-prov-contact").html("OTP Sent.");

				} else {
					$(".error-prov-contact").html("Something Went Wrong." + msgobj.errors[0]['message']);
				}

			});
		} else {
			$(".error-prov-contact").html("Not a valid Mobile Number.");
		}

	});
	$('.signup-next-btn').click(function () {

		let f1, f2, f3, otpFlag;
		f1 = validateInput("input[name=prov-name]", ".error-prov-name");
		f2 = validateInput("input[name=prov-contact]", ".error-prov-contact");
		f3 = validateInput("input[name=prov-otp]", ".error-prov-otp");

		var mOtp = $("input[name=prov-otp]").val();
		if (mOtp.toString().length >= 2) {
			var request = $.ajax({
				url: "/verify-otp",
				method: "POST",
				data: { mobOtp: mOtp },
				dataType: "html"
			});
			request.done(function (msg) {
				if (msg == 1) {
					otpFlag = true;

					if (f1 && f2 && f3 && otpFlag) {
						$('.signup-1').hide();
						$('.signup-2').show();
					} else {
						$(".error-prov-cnext").html("Kindly check all fields.");
					}

				} else {
					$(".error-prov-otp").html("Incorrect OTP.");
				}
			});
		}


	});

	$('.signup-prev-btn').click(function () {
		$('.signup-2').hide();
		$('.signup-1').show();
	});

	//only Digit
	$("input[name=prov-pin]").keypress(function (e) {
		return forceDigitOnly(e, ".error-prov-pin");
	});
	$('.signup-prov-btn').click(function () {
		$('.provider-submit-error').html('');
		let f1, f2, f3, f4, f5, f6, f7, f8, f9, f10, f11, f12, f13, f14, f15, f16, fh1, fh2, fh3;
		let fh = okFlag = false;
		f1 = validateInputAsEmail("input[name=prov-email]", ".error-prov-email");
		f2 = validatePassword("input[name=prov-password]", ".error-password");
		f3 = validatePasswordMatch("input[name=prov-password]", "input[name=prov-cnf-password]", ".error-cnf-password");
		f4 = validateInput("input[name=prov-dob]", ".error-prov-dob");
		f5 = validateInput("select[name=prov-gender]", ".error-prov-gender");
		f6 = validateInput("input[name=prov-addr]", ".error-prov-addr");
		f7 = validateInput("input[name=prov-pin]", ".error-prov-pin");
		f8 = validateInput("select[name=prov-state]", ".error-prov-state");
		f9 = validateInput("select[name=prov-field]", ".error-prov-field");
		f10 = validateInput("select[name=prov-service]", ".error-prov-service");
		f11 = validateInput("input[name=prov-speciality]", ".error-speciality");
		f12 = validateInput("select[name=prov-workexp]", ".error-prov-workexp");
		f13 = validateInput("textarea[name=prov-record]", ".error-prov-record");
		f14 = validateInput("textarea[name=prov-about]", ".error-prov-about");
		f15 = validateImage("input[name=prov-front-id]", ".error-prov-front-id");
		f16 = validateImage("input[name=prov-back-id]", ".error-prov-back-id");

		if (!$('.transport').hasClass('hidden')) {
			fh = true;
			fh1 = validateInput("select[name=provh-vehicle]", ".error-provh-vehicle");
			fh2 = validateInput("input[name=provh-license]", ".error-provh-license");
			fh3 = validateImage("input[name=provh-lic-photo]", ".error-provh-lic-photo");

		} else if (!$('.education').hasClass('hidden')) {
			fh = true;
			fh1 = validateInput("input[name=provh-degree]", ".error-provh-degree");
			fh2 = validateInput("select[name=provh-method]", ".error-provh-method");
			fh3 = validateImage("input[name=provh-deg-img]", ".error-provh-deg-img");

		}

		if (f1 && f2 && f3 && f4 && f5 && f6 && f7 && f8 && f9 && f10 && f11 && f12 && f13 && f14 && f15 && f16) {
			okFlag = true;
		}
		if (fh) {
			if (okFlag && fh1 && fh2 && fh3) {
				$('#provider-signup-form').submit();
			} else {
				$('.provider-submit-error').append('Kindly Check All Fields.');
			}
		} else if (okFlag) {

			$('#provider-signup-form').submit();
		} else {
			$('.provider-submit-error').append('Kindly Check All Fields.');
		}

	});
	$('.provider-login-btn').click(function () {
		$('.provider-signin-error').html('');
		let f1, f2;

		f1 = validateInputAsEmail("input[name=cust-email]", ".error-email");
		f2 = validateInput("input[name=cust-password]", ".error-password");

		if (f1 && f2) {
			$('#provider-login-form').submit();
		} else {
			$('.provider-signin-error').append('Kindly Fill All Fields.');
		}

	});
	/****************************! End Provider  Form*************************/


	/************************Customer Reset Password  Form********************/
	$(".cust-forgot-pwd-btn").click(function () {

		let f1 = validateInputAsEmail("input[name=cust-email]", ".error-email");
		if (f1) {
			$('#cust-forgot-pwd-form').submit();
		}
	});

	/************************! End Customer Reset Password  Form********************/


	/*****************************Customer Sign-up  Form***************************/
	//only digits
	$("input[name=cust-mobile]").keypress(function (e) {
		return forceDigitOnly(e, ".error-mobile");
	});
	$(".cust-otp").click(function () {
		var mobnumber = $("input[name=cust-mobile]").val();
		var mobNumLen = mobnumber.toString().length;
		if (mobNumLen >= 10 && mobNumLen < 15) {
			var request = $.ajax({
				url: "/send-otp",
				method: "POST",
				data: { mobNum: mobnumber },
				dataType: "html"
			});
			request.done(function (msg) {
				var msgobj = $.parseJSON(msg);
				if (msgobj['status'] == 'success') {
					$(".error-mobile").html("OTP Sent.");

				} else {
					$(".error-mobile").html("Something Went Wrong." + msgobj.errors[0]['message']);
				}
			});
		} else {
			$(".error-mobile").html("Not a valid Mobile Number.");
		}

	});

	$('.cust-signup-btn').click(function () {
		$(".cust-signup-error").html("");
		let f1, f2, f3, f4, f5, otpFlag;
		f1 = validateInput("input[name=cust-name]", ".error-name");
		f2 = validateInputAsEmail("input[name=cust-email]", ".error-email");
		f3 = validateInput("input[name=cust-mobile]", ".error-mobile");
		f4 = validateInput("input[name=cust-password]", ".error-password");
		f5 = validateInput("input[name=cust-otp]", ".error-cust-otp");

		if (f1 && f2 && f3 && f4 && f5 && otpFlag) {
			$('#cust-signup-form').submit();
		}
		else {
			$(".cust-signup-error").append("Kindly Fill All Fields.");
		}

		var mOtp = $("input[name=cust-otp]").val();
		if (mOtp.toString().length >= 2) {
			var request = $.ajax({
				url: "/verify-otp",
				method: "POST",
				data: { mobOtp: mOtp },
				dataType: "html"
			});
			request.done(function (msg) {
				if (msg == 1) {
					otpFlag = true;

					if (f1 && f2 && f3 && f4 && f5 && otpFlag) {
						$('#cust-signup-form').submit();
					}
					else {
						$(".cust-signup-error").append("Kindly Fill All Fields.");
					}

				} else {
					$(".error-cust-otp").html("Incorrect OTP.");
				}
			});
		}












	});
	/************************!End Customer Sign-up  Form********************/


	/************************ Customer Login  Form********************/
	$('.cust-login-btn').click(function () {
		$(".cust-signin-error").html("");
		let f1, f2;

		f1 = validateInputAsEmail("input[name=cust-email]", ".error-email");
		f2 = validateInput("input[name=cust-password]", ".error-password");

		if (f1 && f2) {
			$('#cust-login-form').submit();
		} else {
			$(".cust-signin-error").append("Kindly Fill All Fields.");
		}

	});

	/************************! End Customer Login  Form********************/


	/************************Customer Verification Password  Form********************/
	$(".cust-reset-pwd-btn").click(function () {

		let f1, f2;
		f1 = validatePassword("input[name=cust-password]", ".error-pwd");
		f2 = validatePasswordMatch("input[name=cust-password]", "input[name=cust-cnf-password]", ".error-cnf-pwd");

		if (f1 && f2) {
			$('#cust-reset-pwd-form').submit();
		}
	});

	/************************! End Customer Verification Password  Form********************/


	$('.order-delete').click(function () {
		let orderId = $(this).closest("tr").find('td:first-child').text();
		var cnfrmCancellation = confirm("Do you really want to cancel order ?\n Click Ok to cancel Order.");
		if (cnfrmCancellation == true) {
			var posting = $.post("/handlers/formhandle/order/update-order/", { orderId: orderId });
			posting.done(function (data) {
			});
			$(this).closest("tr").hide();
		}
	});
	//order Form submission
	$('.order-btn').click(function () {
		$('#order-form').submit();
	});





	/*************************Cookies For Location************************ */

	var ww_location = getCookie("ww_location");
	if (!ww_location) {
		$("#location-popup").show();
	} else {
		$(".states-search").val(ww_location);
	}
	$(".hide-popup").click(function () {
		$("#location-popup").hide();
	});
	$(".states-options").change(function () {
		var ww_location = $(this).val();
		setCookie("ww_location", ww_location, 30);
		$(".states-search").val(ww_location);
		$("#location-popup").hide();

	});
	$(".states-search").change(function () {
		var ww_location = $(this).val();
		setCookie("ww_location", ww_location, 30);
	});
	$(".detect-btn").click(function () {
		var stateVal;
		if (window.navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var lat = position.coords.latitude,
					lng = position.coords.longitude,
					latlng = new google.maps.LatLng(lat, lng),
					geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'latLng': latlng }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						if (results[1]) {
							for (var i = 0; i < results.length; i++) {
								if (results[i].types[0] === "locality") {
									stateVal = results[i].address_components[0].short_name;
									if (stateVal.toLowerCase() == "delhi") {
										stateVal = "Delhi NCR";
									}
									setCookie("ww_location", stateVal, 30);
									$(".states-search").val(stateVal);
									$("#location-popup").hide();
								}
							}
						}
						else { console.log("No reverse geocode results.") }
					}
					else { console.log("Geocoder failed: " + status) }
				});
			}, function () { console.log("Geolocation not available.") });
		}

	});
	/*************************!End Cookies For Location************************ */

	/*************************Search Results************************ */
	$("#search-input").keyup(function () {
		var searchResult = $("#search-result");
		var searchStr = $("#search-input").val().toLowerCase();
		searchResult.html('');
		if (searchStr == '' || searchStr == ' ') {
			searchResult.html('');
		} else {
			$.each(serviceOptions, function (ind, val) {
				var url_param1 = ind.replace(/\s+/g, '-').toLowerCase();
				$.each(val, function (ind1, val1) {
					var arrTextVal = val1.toLowerCase();
					if (arrTextVal.indexOf(searchStr) != -1) {
						var nodeEle = document.createElement("a");
						var url_param2 = arrTextVal.replace(/\s+/g, '-').toLowerCase();
						var textnode = document.createTextNode(arrTextVal);
						nodeEle.appendChild(textnode);
						nodeEle.href = "/service-providers/" + url_param1 + '/' + url_param2;
						searchResult.append(nodeEle);
					}
				});

			});
		}
	});
	/*************************!End Search Results************************ */
	/*************************Services Form ************************ */
	$(".serv-get-list-btn").click(function () {
		$(".services-form").submit();
	});
	$(".firstoption").change(function () {
		$(".secondoption").removeAttr("disabled");
	});
	$(".secondoption").change(function () {
		$(".thirdoption").removeAttr("disabled");
	});
	$(".thirdoption").change(function () {
		$(".fourthoption").removeAttr("disabled");
		$(".fifthoption").removeAttr("disabled");
		$(".sixthoption").removeAttr("disabled");
	});
	/*************************!End Services Form ************************ */

});
