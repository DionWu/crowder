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
	return false;
})

$("input[name='userButton']").click(function(){
	$("#registerUser").show();
	$("#registerCompany").hide();
	$("input[name='companyButton']").prop('checked', false);
	$("#registerCompany :input:not(.registerSubmit)").val('');
	$("form span").empty();
	return false;
});

$("input[name='companyButton']").click(function(){
	$("#registerCompany").show();
	$("#registerUser").hide();
	$("input[name='userButton']").prop('checked', false);
	$("#registerUser :input:not(.registerSubmit)").val('');
	$("form span").empty();
	return false;
});

$("#registerForm a").click(function(){
	var showLoginForm = $(this).attr("href");
	$(showLoginForm).show();
	$("#registerForm").hide();
	$("#registerForm form :input:not(.registerSubmit)").val('');
	//.empty() removes contents in a tag, .remove() removes tag and contents!
	$("form span").empty();
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



/* Authentication */
$("#loginForm form").submit(function(){
	if( !$("#loginForm input").val() ) {
		$(".authenticateMsg").html("Enter both username and password!");
	} else {
		$.ajax({
			type: "POST",
			url: "login.php",
			data: $(this).serialize(),
			success: function(response) {
				$(".authenticateMsg").html(response);
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
				$(".authenticateMsg").html(response);
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
				$(".authenticateMsg").html(response);
			},
		})
	}
	return false;
})