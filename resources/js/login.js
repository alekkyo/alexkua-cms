$(document).ready(function(){
	
	verticalCenterLogin();
	$(window).resize(verticalCenterLogin);
});

// center the login
function verticalCenterLogin() {
	var windowHeight = $(window).height();
	var loginHeight = $("#login").height();
	var footerHeight = $("#footer").height();
	var diffHeight = windowHeight - loginHeight - footerHeight;
	
	if(diffHeight > 0) {
		$("#login").css("margin-top", (diffHeight/2) + "px");
	}
}

// validate mail regex
function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

// login
function login() {
	var email = $("#email").val();
	var password = $("#password").val();
	var isOk = true;
	
	// reset
	$("#email").css("border","1px solid #ccc");
	$("#password").css("border","1px solid #ccc");
	
	// verify email
	if(!validateEmail(email)) {
		$("#email").css("border","1px solid #ff0000");
		isOk = false;
	}
		
	// verify password
	if(password == "") {
		$("#password").css("border","1px solid #ff0000");
		isOk = false;
	}
	
	if(isOk) {
		$.ajax({
			type: "POST",
			url: "scripts/login.php",
			data: { email: email, password: password }
		})
		.done(function( msg ) {
			if(msg == "0") {
				$("#error_text").fadeIn(500);
				$("#error_text").html("Login failed, please retry.");
			} else {
				window.location.href = "manage.php";
			}
		});
	} else {
		$("#error_text").fadeIn(500);
		$("#error_text").html("Error with the login, please retry.");
	}
}