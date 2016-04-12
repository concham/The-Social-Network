
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
<!-- <script type="text/javascript" src="JS/HWForm.js"></script> -->
</head>

<h1> The Social Network</h1>

<hr class="style1"><hr class="style2">
<br>

	<fieldset>

		<legend> Fill Out The Form To Join!</legend>
		<br>
		<label for="mynumber">Name: </label>
		<input type="text" name="mynumber" id="mynumber" size="30" hspace="5" class="input1"/>
		<br>
		<br>

		<label for="email">BC E-Mail Address: </label>
		<input type="text" name="email" id="username" size="10" hspace="5"/>


		<br>
		<br>
		<label for="password">Password: </label>
		<input type="text" name="password" id="password" size="30" hspace="5" class="input1"/>
		<br>
		<br>
		<label for="confirmation">Confirm Password: </label>
		<input type="text" name="confirmation" id="confirmation" size="30" hspace="5" class="input1"/>				
		<br>
		<br><br>
		<label>Select the name of your school: </label>
		<br><br>
		<input type="radio" name="School" value="A&S" checked class="input2"> Morrissey College of Arts & Sciences 
		<br><br>
		<input type="radio" name="School" value="Law" class="input2"> Law School
		<br><br>
		<input type="radio" name="School" value="Woods"> Woods College of Advancing Studies
		<br><br>
		<input type="radio" name="School" value="Social"> School of Social Work
		<br><br>
		<input type="radio" name="School" value="CSOM"> Carroll School of Management
		<br><br>
		<input type="radio" name="School" value="CSON"> Connell School of Nursing
		<br><br>
		<input type="radio" name="School" value="Lynch"> Lynch School of Education
		<br><br>
		<input type="radio" name="School" value="Theo"> School of Theology & Ministry
		<br><br>
		<button id="GRButton"> Join Now!</button> 
	</fieldset> 
	
	<?php
	//need on submit to run this function
	
	//"CREATE TABLE IF NOT EXISTS `registration` (
	//`name` varchar(50) DEFAULT NULL,
  //	`pass` char(40) DEFAULT NULL"
//	) ENGINE=MyISAM DEFAULT CHARSET=latin1;
//
//--
//-- Dumping data for table `registration`
//--
 $name= isset($_GET["email"]) ? $_GET["email"] : '';
 $pass= isset($_GET["password"]) ? $_GET["password"] : '';
 $school = isset($_GET[""]) ? $_GET["email"] : '';
//INSERT INTO `registration` ($name, $pass,$school) VALUES
//('Hi', '94dd9e08c129c785f7f256e82fbe0a30e6d1ae40'),
//('asdf', '92429d82a41e930486c6de5ebda9602d55c39986'),
//('jamie', '99996b911567c83cce17cdf194f314975c57ddf1'),
//('billy', '9d989e8d27dc9e0ec3389fc855f142c3d40f0c50');
?>


