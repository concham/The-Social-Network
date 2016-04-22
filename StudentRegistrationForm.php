<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Student Registration</title>

<style>
body {
	background-color: #ffddcc;
	color: #ff7755;
	}
h1 {
	color: #ff7755;
	text-align: center;
	}
.style1 {
	width: 50%;
	border-color: #ff7755;
	background-color: #ff7755;
	height: 1px;
}
.style2 {
	width: 90%;
	border-color: #ff7755;
	background-color: #ff7755;
	height: 1px;
}
form {
	background-color: #ffccbb;
}
label {
	color: #ff7755; 
	font-size: 115%;
}
legend {
	color: #ff7755; 
	font-size: 140%;
}
fieldset {
	border: 3px solid #ff9977;	
	}
.input1 {
  margin-right: 300px;
}
button{
	background-color: white;
	border: 2px color: black;
	font-size: 15px;
	margin-left: 20px;
}
	
	</style>

</head>

<h1> The Social Network</h1>

<hr class="style1"><hr class="style2">
<br>

	<fieldset>
	<form id="ajaxRequestForm" method="post">
		<legend> Fill Out The Form To Join!</legend>
		<br>
		<label for="firstname">First Name: </label>
		<input type="text" name="firstname" id="firstname" size="30" hspace="5" class="input1"/>
		<br>
		<p id="firstnameerror"></p>
		<br>
		
		<label for="lastname">Last Name: </label>
		<input type="text" name="lastname" id="lastname" size="30" hspace="5" class="input1"/>
		<br>
		<p id="lastnameerror"></p>
		<br>

		<label for="email">BC E-Mail Address: </label>
		<input type="text" name="email" id="email" size="30" hspace="5" class="input1"/>
		<br>
		<p id="emailerror"></p>
		<br>
		
		<label for="password">Password: </label>
		<input type="password" name="password" id="password" size="30" hspace="5" class="input1"/>
		<br>
		<p id="passworderror"></p>
		<br>
		<label for="confirmation">Confirm Password: </label>
		<input type="password" name="confirmation" id="confirmation" size="30" hspace="5" class="input1"/>				
		<br>
		<br><br>
		<label>Select the name of your school: </label>
		<br><br>
		<input type="radio" name="school" value="A&S" checked class="input2"> Morrissey College of Arts & Sciences 
		<br><br>
		<input type="radio" name="school" value="Law" class="input2"> Law School
		<br><br>
		<input type="radio" name="school" value="Woods"> Woods College of Advancing Studies
		<br><br>
		<input type="radio" name="school" value="Social"> School of Social Work
		<br><br>
		<input type="radio" name="school" value="CSOM"> Carroll School of Management
		<br><br>
		<input type="radio" name="school" value="Nursing"> Connell School of Nursing
		<br><br>
		<input type="radio" name="school" value="Lynch"> Lynch School of Education
		<br><br>
		<input type="radio" name="school" value="Theology"> School of Theology & Ministry
		<br><br>
		<button id="registerbutton"> Join Now!</button> 
	</form>
	</fieldset> 
	<div id="results"></div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    	<script type="text/javascript">
		$(document).ready(function(){
			$("#registerbutton").click(function( event ){
				event.preventDefault();
			
				//get the form data and then serialize that
            	//var dataString = $("#ajaxRequestForm").serialize();
            	
                //start ajax request
                var request = $.post("RegistrationHandler.php",
                    { 
                    	firstname: $("#firstname").val(),
                    	lastname: $("#lastname").val(),
                    	email: $("#email").val(),
                    	password: $("#password").val(),
                    	confirmation: $("#confirmation").val(),
                    	school: $("input[name='school']:checked").val()
                    },
                    function(data,status) {      		
                		$("#results").html("data" + data + " status", status);
                	}
                );
            });
		});
    </script>
</body>
</html>

<?php
	function displayForm() {

		 $name= isset($_GET["email"]) ? $_GET["email"] : "";
		 $pass= isset($_GET["password"]) ? $_GET["password"] : "";
		 $school = isset($_GET[""]) ? $_GET["email"] : "";
	}

?>

<script>
$('#registerbutton').click(function(){
    validateEmail();
    validateFirstName();
    validateLastName();
    validatepassword();
});	
</script>
<script type="text/javascript" src="validateemail.js"></script>
<script type="text/javascript" src="validatefirstname.js"></script>
<script type="text/javascript" src="validatelastname.js"></script>
<script type="text/javascript" src="validatepassword.js"></script>
