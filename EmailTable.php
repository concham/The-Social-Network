
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
<tr><th>Name</th><th>School</th><th>Email</th><th>Registration Date</th></tr>
<!-- 
			<?php
			 date_default_timezone_set('America/New_York');
			$y = 2016;

			while ($y < 2026){
			$y++;
			$x = date("M-d-Y", easter_date($y)-(45*24*60*60));
			echo "<tr><td>", $y, "</td>";
			echo "<td>", $x, "</td>";
			echo "<td>", date("M-d-Y", easter_date($y)), "</td>";
			}
?>
 -->
</table>
		</fieldset>	
		<br>
<fieldset class="fieldset2">	
			<legend> Create Group Mail</legend>
<br>
		<form method="post">
</form>

		<label for="email">Subject </label>
		<input type="text" name="subject" id="subject" size="30" />		
		<br><br>


		<label for="message">Your Message: </label>
		<br><br><textarea rows= "6" cols= "100" name= "Additional Information"></textarea>
		

		<br><br>
		<label>Name of your school: </label>
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
		<label for="email">Mail Password: </label>
		<input type="text" name="Password" id="Password" size="30" />		
		<br><br>
		<button id="GRButton">Send Your Message!</button> 



		</fieldset>	

 </body>
</html>

	