//This file to validate the create user and signin page
function validate() {
    var errorRed = "rgb(229, 84, 81)";
    var goodGreen = "rgb(74, 160, 44)";
    var errors = "";

    var uname = document.getElementById("username").value;

    if (uname == "") {
	errors += "<li> Username is required.</li>";
	    document.getElementById("username").style.background = errorRed;
    }
    else {
	document.getElementById("username").style.background = goodGreen;
    }

    var fname  = document.getElementById("firstName").value;
    var lname  = document.getElementById("lastName").value;
    if (fname == "" || lname == "") {
	errors += "<li> First and last names are required.</li>";
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
	errors += "<li> Invalid email address. Example: xxxxx@xxxxx.xxx </li>";
	document.getElementById("email").style.background = errorRed;
    }
    else {
	document.getElementById("email").style.background = goodGreen;
    }

    if ($("#address").val() == "")
    {
      errors += "<li> Address is required. </li>";
      $("#address").css("background-color",errorRed);
    }

    if ($("#zip").val() == "")
    {
      errors += "<li> Zip Code is required. </li>";
      $("#zip").css("background-color",errorRed);
    }

    var pass = document.getElementById("password").value;
    var passCheck = document.getElementById("passwordCheck").value;
    if (pass == "") {
	errors += "<li> Password is required. </li>";
	document.getElementById("password").style.background = errorRed;
    }
    else {
	document.getElementById("password").style.background = goodGreen;
	if (pass !== passCheck) {
	    errors += "<li> Passwords do not match. </li>";
	    document.getElementById("passwordCheck").style.background = errorRed;
	}
	else {
	    document.getElementById("passwordCheck").style.background = goodGreen;
	}
    }

    if (errors) {
	     $(".errors").fadeIn();
      $("#errorMessage").html("<ul>" + errors + "</ul>");
	    return false;
    }
    else {
        var userName = $("#username").val();
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var email = $("#email").val();
        var pass = $("#password").val();
        var address = $("#address").val();
        var zip = $("#zip").val();
        $.ajax({
       url: 'register.php', //This is the current doc
       type: "POST",
       data: ({'username': userName,
          'firstName': firstName,
          'lastName': lastName,
          'email': email,
          'password': pass,
          'zip' : zip,
          'address': address
        }),
       success: function(data){
           $(".result").html(data);
         },
        error: function(req, status, error) {
            window.alert( req + "\n" + status + "\n" + error );
        }
        });
    }
}
