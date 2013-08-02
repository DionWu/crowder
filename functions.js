/* Authentication form display */

$("#registerForm").hide();

$("#loginForm a").click(function(){
	var showRegisterForm = $(this).attr("href");
	$(showRegisterForm).show();
	$("#registerUser").show();
	$("#registerCompany, #loginForm").hide();
	$("input[name='companyButton']").prop('checked', false);
	$("input[name='userButton']").prop('checked', true);
	$("#loginForm form :input:not(#loginSubmit)").val('');
	$(".authenticateMsg").empty();
	return false;
})

$("input[name='userButton']").click(function(){
	$("#registerUser").show();
	$("#registerCompany").hide();
	$("input[name='companyButton']").prop('checked', false);
	$("#registerCompany :input:not(.registerSubmit)").val('');
	$("form span, .authenticateMsg").empty();
	$(".retypePassword2").removeClass("passwordError");
	return false;
});

$("input[name='companyButton']").click(function(){
	$("#registerCompany").show();
	$("#registerUser").hide();
	$("input[name='userButton']").prop('checked', false);
	$("#registerUser :input:not(.registerSubmit)").val('');
	$("form span, .authenticateMsg").empty();
	$(".retypePassword").removeClass("passwordError");
	return false;
});

$("#registerForm a").click(function(){
	var showLoginForm = $(this).attr("href");
	$(showLoginForm).show();
	$("#registerForm").hide();
	$("#registerForm form :input:not(.registerSubmit)").val('');
	//.empty() removes contents in a tag, .remove() removes tag and contents!
	$("form span, .authenticateMsg").empty();
	$(".retypePassword, .retypePassword2").removeClass("passwordError");
	return false;
});




/* Retype password on the fly! adding/removing class doesn't work with input[x='x'] for some reason!*/
// Check for matching passwords
$(".retypePassword, .password").change(function(){
	if ( $(".retypePassword").val() != $(".password").val() ){
		/* You can automatically display error texts by inserting in an emtpy span! */
		$(".retypePassword").addClass("passwordError").next().text("Passwords don't match.");
	} else {
		$(".retypePassword").removeClass("passwordError").next().text("Passwords Match!");
	}
});
// I am really dumb. 1am can't think straight. The span text/css is not working properly on registerCompany form. Don't know why
$(".retypePassword2, .password2").change(function(){
	if ( $(".retypePassword2").val() != $(".password2").val() ){
		/* You can automatically display error texts by inserting in an emtpy span! */
		$(".retypePassword2").addClass("passwordError").next().text("Passwords don't match.");
	} else {
		$(".retypePassword2").removeClass("passwordError").next().text("Passwords Match!");
	}
});



// AUTHENTICATION
$("#loginForm form").submit(function(){
	if( !$("#loginForm input").val() ) {
		$(".authenticateMsg").html("Enter both username and password!");
	} else {
		$.ajax({
			type: "POST",
			url: "login.php",
			data: $(this).serialize(),
			success: function(response) {

				if(response === "Authentication Verified") {
					window.location = 'home.php';
				} else {
					$(".authenticateMsg").html(response);
				}
			},
		})
	}
	return false;
});

$("#registerUser form").submit(function(){
	if(!$("#registerUser input").val()) {
		$(".authenticateMsg").html("Please fill in all the fields.");
	} else {
		$.ajax ({
			type:"POST",
			url:"register.php",
			data:$(this).serialize(),
			success: function(response) {
				if(response === "Authentication Verified") {
					window.location = 'home.php';
				} else {
					$(".authenticateMsg").html(response);
				}
			},
		})
	}
	return false;
})

$("#registerCompany form").submit(function(){
	if(!$("#registerCompany input").val()) {
		$(".authenticateMsg").html("Please fill in all the fields.");
	} else {
		$.ajax ({
			type:"POST",
			url:"register.php",
			data:$(this).serialize(),
			success: function(response) {
				if(response === "Authentication Verified") {
					window.location = 'home.php';
				} else {
					$(".authenticateMsg").html(response);
				}
			},
		})
	}
	return false;
});




/* HOME PAGE */
$(".settingsPopup").hide();

$(".settings").click(function(){

	$(".settingsPopup").toggle();
})


/* Profile Pages */

	/* edit About */
$("#editAboutButton").fadeOut(0);
$("#editAboutForm").hide();

$("#About").hover(function(){
	$("#editAboutButton").fadeIn(0);	
}, function() {
	$("#editAboutButton").fadeOut(2000);
});

$("#editAboutButton").click(function(){
	$("#editAboutButton").fadeOut(0);
	$("#About").hide();
	$("#editAboutForm").show();
})

$("#editAboutForm").submit(function(){
	$.ajax ({
		type: "POST",
		url: "editAbout.php",
		data: $(this).serialize(),
	}).done(function(response) {
		$("#editAboutForm").hide();
		$("#About").html(response);
		$("#About").show();
	});
	return false;
})

	/* edit Social */
$("#editSocialButton").fadeOut(0);
$("#editSocialForm").hide();

$("#customerSocial").hover(function(){
	$("#editSocialButton").fadeIn(0);
})

$("#editSocialButton").click(function(){
	$("#editSocialButton").fadeOut(0);
	$("#customerSocial").hide();
	$("#editSocialForm").show();
	$("#editAdditionalSocial").hide();
})
$("#showMoreSocialLink").click(function(){
	$(this).hide();
	$("#editAdditionalSocial").show();
})
$("#showLessSocialLink").click(function(){
	$("#editAdditionalSocial").hide();
	$("#showMoreSocialLink").show();
})
$("#editSocialForm").submit(function(){
	$.ajax ({
		type: "POST",
		url: "createCustomerSocial.php",
		data: $(this).serialize()
	}).done(function(response){
		if (response === "true") {
			$("#editSocialForm").hide();
			$("#customerSocial").show();
		} else {
			$("#editSocialForm").hide();
		}
	});
	return false;
})

	/*Company Page Only */
		/*Current Campaign*/
$("#editCurrCampButton").fadeOut(0);
$("#editCurrCampForm").hide();

$("#companyCurrCamp").hover(function(){
	$("#editCurrCampButton").fadeIn(0);
}, function() {
	$("#editCurrCampButton").fadeOut(2000);
})

$("#editCurrCampButton").click(function(){
	$(this).fadeOut(0);
	$("#editCurrCampForm").show();
	$("#companyCurrCamp").hide();
})


$("#editCurrCampForm").submit(function(){
	$.ajax ({
		type: "POST",
		url: "editCurrCamp.php",
		data: $(this).serialize(),
		dataType: "json"
	}).done(function(response) {
		$("#editCurrCampForm").hide();
		$("#companyCurrCampName").html(response.editCampName);
		if (response.editCampVideoURL) {
			$("#companyCurrCampVideo iframe").attr("src", response.editCampVideoURL);
		} else {
			$("#companyCurrCampVideo").hide();
		};
		$("#companyCurrCampAbout").html(response.editCampAbout);
		$("#companyCurrCampPricing").html(response.editCampPricing);
		$("#companyCurrCamp").show();
	});
	return false;
})


/* create new Campaign Page */
$("#createCurrCampForm").submit(function(){
	$.ajax ({
		type: "POST",
		url: "createCurrCamp.php",
		data: $(this).serialize(),
		dataType: "json"
	}).done(function(response) {
		window.location = 'companyProfile.php';
	});
	return false;
})

