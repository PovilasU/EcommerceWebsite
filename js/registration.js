function validateEmail() {
	var x = document.forms["myRegistrationForm"]["email"].value;
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		alert("Not a valid e-mail address");
		return false;
	}
}


function checkPassword(str)
{
	var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
	return re.test(str);
}
// This part of code was taken and modified from

function checkRegistrationForm(form)
{
	if(form.username.value == "") {
		alert("Error: Username cannot be blank!");
		form.username.focus();
		return false;
	}
	re = /^\w+$/;
	if(!re.test(form.username.value)) {
		alert("Error: Username must contain only letters, numbers and underscores!");
		form.username.focus();
		return false;
	}
	if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
		if(!checkPassword(form.pwd1.value)) {
			alert("The password you have entered is not valid! Use only letters and numbers (no spaces or other characters)" +
				"The password should contain at least one capital letter and number for example Aa123456 ");

			form.pwd1.focus();
			return false;
		}
	} else {
		alert("Error: Please check that you've entered and confirmed your password!");
		form.pwd1.focus();
		return false;
	}
	//checking if email address is valid
	var x = document.forms["myRegistrationForm"]["email"].value;
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		alert("Not a valid e-mail address");
		return false;
	}

	//checking if phone number is valid
	var phoneNumber = document.forms["myRegistrationForm"]["phoneNumber"].value;
	var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
	if(form.phoneNumber.value.match(phoneno))
	{
		//Check if post code input not empty
		if (form.postCode.value.length == 0)
		{
			alert("Post code field can not be empty");
			return false;
		}
		// adding new user to Local storage
		addNewUser();

	}
	else
	{
		 alert("Not a valid Phone Number. "+
		"Please Input an Phone No.[+xx-xxxx-xxxx, +xx.xxxx.xxxx, +xx xxxx xxxx]");
		return false;
	}



}


// Store Registration info
function addNewUser(){
		var usernameInput = document.getElementById("usernameInput").value;
		var passwordInput = document.getElementById("passwordInput").value;
		var emailInput = document.getElementById("emailInput").value;
		var phoneNumberIput = document.getElementById("phone_numberInput").value; 
		var postCodeInput = document.getElementById("post_codeInput").value;    
	   localStorage.setItem(emailInput, passwordInput); //store email and password
	   alert("Registration succesfull , please login");
	   localStorage.setItem("currentScore", 0); 
	   localStorage.setItem("currentUser", usernameInput);
	   localStorage.setItem("currentPassword", passwordInput);
	   localStorage.setItem("currentScore", 0);
	   localStorage.setItem("currentEmail", emailInput);
	   localStorage.setItem("currentPostCode", postCodeInput);
	   localStorage.setItem("currentPhoneNumber", phoneNumberIput);
	   var newUsername = localStorage.getItem("currentUser");
	   var newPassword = localStorage.getItem("currentPassword");
	   var newScore = localStorage.getItem("currentScore");
	   var newEmail = localStorage.getItem("currentEmail");
	   var newPostCode = localStorage.getItem("currentPostCode");
	   var newPhoneNumber = localStorage.getItem("currentPhoneNumber");
		// create new user
		var newUser = {username: newUsername, password: newPassword, 
			score: newScore, email: newEmail, phoneNumber: newPhoneNumber,
			postCode: newPostCode};   
			var storedUsers = localStorage.getItem("users");
		// create JS object (array)
		var storedUsersArray = JSON.parse(storedUsers);
		// add new user
		storedUsersArray.push(newUser);
			// create JSON object
			var jsonObj = JSON.stringify(storedUsersArray);
		 // store LS
		 localStorage.setItem("users", jsonObj);
		 var myUsers = localStorage.getItem("users");
		 var myUsersJSArray = JSON.parse(myUsers);
		localStorage.setItem("currentUser", "Guest");
	
	}

