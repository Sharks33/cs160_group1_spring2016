//This file to validate the create user and signin page
function validate() {
    var errorRed = "rgb(229, 84, 81)";
    var goodGreen = "rgb(74, 160, 44)";
    var errors = "";

    var uname = document.getElementById("username").value;

    if (uname == "") {
	errors += "Username is required.\n"
	    document.getElementById("username").style.background = errorRed;
    }
    else {
	document.getElementById("username").style.background = goodGreen;
    }

    var fname  = document.getElementById("firstName").value;
    var lname  = document.getElementById("lastName").value;
    if (fname == "" || lname == "") {
	errors += "First and last names are required.\n";
	document.getElementById("firstName").style.background = errorRed;
	document.getElementById("lastName").style.background = errorRed;
    }
    else {
	document.getElementById("firstName").style.background = goodGreen;
	document.getElementById("lastName").style.background = goodGreen;
    }

    var email = document.getElementById("email").value;
    var emailRE = /^.+@.+\..{2,4}$/;
    if (!emailRE.test(email)) {
	errors += "Invalid email address. Example: xxxxx@xxxxx.xxx\n";
	document.getElementById("email").style.background = errorRed;
    }
    else {
	document.getElementById("email").style.background = goodGreen;
    }

    var pass = document.getElementById("password").value;
    var passCheck = document.getElementById("passwordCheck").value;
    if (pass == "") {
	errors += "Password is required.\n";
	document.getElementById("password").style.background = errorRed;
    }
    else {
	document.getElementById("password").style.background = goodGreen;
	if (pass !== passCheck) {
	    errors += "Passwords do not match.\n";
	    document.getElementById("passwordCheck").style.background = errorRed;
	}
	else {
	    document.getElementById("passwordCheck").style.background = goodGreen;
	}
    }

    if (errors) {
	alert(errors);
	return false;
    }
}

