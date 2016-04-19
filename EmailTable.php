
 <!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<meta charset="utf-8"/>
	<title>HW Admin</title>

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
	background-color: #ffddcc;
}
label {
	color: #ff7755; 
	font-size: 115%;
}
legend {
	color: #ff7755; 
	font-size: 140%;
}
.fieldset1 {
	border: 3px solid #ff9977;
	height: 300px;
	width: 1175px;
}
.fieldset2 {
	border: 3px solid #ff9977;

	width: 1175px;
}
.button1 {
	background-color: white;
	border: 2px color: black;
	font-size: 14px;
	margin-left: 7px;
}
.style3 {
	display: none;
}
table{
	border-collapse: collapse;
}
table, th, td {
	border: 1px solid black;
	width: 100%;
}
th{
	height: 10px;
	text-align: center;
}
th, td{
	resize: both;
	width: 200px;
	}
tr:nth-child(even){background-color: #ffcc99;}
tr:nth-child(odd){background-color: #ff9977;}
tr:hover{background-color: #ff7755;}

	
	</style>
<!-- <script type="text/javascript" src="JS/HWForm.js"></script> -->
</head>

<h1> The Social Network - Admin Page</h1>

<hr class="style1"><hr class="style2">
<br>
		<fieldset class="fieldset1">	
			<legend> Club Members</legend>
<br>
		<form method="post">
</form>

 <table border=\"1\" style=\"width:100%\">
<tr><th>First Name</th><th>Last Name</th><th>School</th><th>Email</th><th>Registration Date</th></tr>

</table>
		</fieldset>	
		<br>

<fieldset class="fieldset2">	
			<legend> Create Group Mail</legend>
<br>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
</form>
										<?php
										// define variables and set to empty values
										$subjectErr = $messageErr = $schoolErr = $passwordErr = "";
										$subject = $message = $school = $password  = "";

										if ($_SERVER["REQUEST_METHOD"] == "POST") {
										   if (empty($_POST["subject"])) {
											 $subjectErr = "Subject is required";
										   } else {
											 $subject = test_input($_POST["subject"]);
										   }
   
										   if (empty($_POST["message"])) {
											 $messageErr = "Message is required";
										   } else {
											 $message = test_input($_POST["message"]);
										   }
	 
										   if (empty($_POST["school"])) {
											 $schoolErr = "School is required";
										   } else {
											 $school = test_input($_POST["school"]);
										   }

										   if (empty($_POST["password"])) {
											 $passwordErr = "Password is required";
										   } else {
											 $password = test_input($_POST["password"]);
										   }
										}

										function test_input($data) {
										   $data = trim($data);
										   $data = stripslashes($data);
										   $data = htmlspecialchars($data);
										   return $data;
										}
										?>

<!-- 
										<h2>PHP Form Validation Example</h2>
										<p><span class="error">* required field.</span></p>
										<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
										   Name: <input type="text" name="name">
										   <span class="error">* <?php echo $nameErr;?></span>
										   <br><br>
										   E-mail: <input type="text" name="email">
										   <span class="error">* <?php echo $emailErr;?></span>
										   <br><br>
										   Website: <input type="text" name="website">
										   <span class="error"><?php echo $websiteErr;?></span>
										   <br><br>
										   Comment: <textarea name="comment" rows="5" cols="40"></textarea>
										   <br><br>
										   Gender:
										   <input type="radio" name="gender" value="female">Female
										   <input type="radio" name="gender" value="male">Male
										   <span class="error">* <?php echo $genderErr;?></span>
										   <br><br>
										   <input type="submit" name="submit" value="Submit"> 
										</form>
 -->

<!-- 
										<?php
										echo "<h2>Your Input:</h2>";
										echo $name;
										echo "<br>";
										echo $email;
										echo "<br>";
										echo $website;
										echo "<br>";
										echo $comment;
										echo "<br>";
										echo $gender;
										?>
 -->



		<label for="email">Subject </label>
		<input type="text" name="subject" id="subject" size="30" /><span class="error">* <?php echo $subjectErr;?></span>		
		<br><br>


		<label for="message">Your Message: </label>
		<br><br><textarea rows= "6" cols= "100" name= "message"></textarea><span class="error">* <?php echo $messageErr;?></span>
		

		<br><br>
		<label>Name of your school: </label>		<span class="error">* <?php echo $schoolErr;?></span>
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
		<label for="email">Mail Password: </label>
		<input type="text" name="password" id="password" size="30" /><span class="error">* <?php echo $passwordErr;?></span>		
		<br><br>
		<button id="GRButton">Send Your Message!</button> 
		</fieldset>	



 </body>
</html>

	