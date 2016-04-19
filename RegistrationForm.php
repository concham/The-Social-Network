<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<meta charset="utf-8"/>
	<title>HW Form</title>

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
	<form method="POST">
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
		<input type="text" name="email" id="username" size="30" hspace="5"/>
		<br>
		<p id="emailerror"></p>
		<br>
		
		<label for="password">Password: </label>
		<input type="text" name="password" id="password" size="30" hspace="5" class="input1"/>
		<br>
		<p id="passworderror"></p>
		<br>
		<label for="confirmation">Confirm Password: </label>
		<input type="text" name="confirmation" id="confirmation" size="30" hspace="5" class="input1"/>				
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
		<input type="radio" name="school" value="CSON"> Connell School of Nursing
		<br><br>
		<input type="radio" name="school" value="Lynch"> Lynch School of Education
		<br><br>
		<input type="radio" name="school" value="Theo"> School of Theology & Ministry
		<br><br>
		<button id="GRButton"> Join Now!</button> 
	</form>
	</fieldset> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
	  	$("#joinbutton").click(function() {
	  		$.getJSON("project/TheSocialNetwork/RegistrationHandler.php", function (data) {
	  			$.each (data, function)
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

