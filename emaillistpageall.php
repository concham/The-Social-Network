<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Email List</title>
</head>
<<<<<<< HEAD
<body>
<h1> Email List </h1>
=======

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

</head>

<h1> The Social Network - Email List Page</h1>

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
<body>
>>>>>>> origin/master
	<div id= "studenttabble">
	<br>
	<form method = "post">
	<fieldset>
		<legend>Create School Mail</legend>
		<label> Subject:</label> <br>
		<textarea rows= "2" cols= "60" id="subject" placeholder="Subject of your Email"></textarea>
		<p id="subjecterror"></p>
		
		<br>
		<br>
		<label> Your Message:</label> <br>
		<textarea rows= "10" cols= "100" id="message" name= "Additional Information"  placeholder="Write the Message of your Email Here!"></textarea>
		<p id="messageerror"></p>
		
	<br>
		<p> Choose Your School: </p>
		
<<<<<<< HEAD
		<input type="checkbox" name="school" value="Morrissey College of Arts & Sciences"> Morrissey College of Arts & Sciences <br>
		<input type="checkbox" name="school" value="Law School"> Law School <br>
		<input type="checkbox" name="school" value="Woods College of Advancing Studies"> Woods College of Advancing Studies <br>
		<input type="checkbox" name="school" value="School of Social Work"> School of Social Work <br>
		<input type="checkbox" name="school" value="Carroll School of Management"> Carroll School of Management <br>
		<input type="checkbox" name="school" value="Connell School of Nursing"> Connell School of Nursing <br>
		<input type="checkbox" name="school" value="Lynch School of Education"> Lynch School of Education <br>
		<input type="checkbox" name="school" value="School of Theology & Ministry"> School of Theology & Ministry <br>
=======
		<input type="checkbox" name="school" value="A&S"> Morrissey College of Arts & Sciences <br>
		<input type="checkbox" name="school" value="Law"> Law School <br>
		<input type="checkbox" name="school" value="Woods"> Woods College of Advancing Studies <br>
		<input type="checkbox" name="school" value="Social"> School of Social Work <br>
		<input type="checkbox" name="school" value="CSOM"> Carroll School of Management <br>
		<input type="checkbox" name="school" value="Nursing"> Connell School of Nursing <br>
		<input type="checkbox" name="school" value="Lynch"> Lynch School of Education <br>
		<input type="checkbox" name="school" value="Theology"> School of Theology & Ministry <br>
>>>>>>> origin/master
		<p id="checkboxerror"> </p>
		
		 
		<br>
		
	<label> Email Password: </label>
	<input type= "text" id="mailingpassword">
	<br><br>
		<input type="button" onclick="return validation();" id="myBtn" value="Send Email!"> </input>
		
		
		<?php
<<<<<<< HEAD
if (isset($_GET['myBtn'])) {

function sendemailtoclass(){
include("dbconn.php");
connect_to_db();
=======
function sendemailtoclass(){
include(dbconn.php);
>>>>>>> origin/master
$school = array(); //sets the schools as an array
$school[] = (isset($_GET['a&s']) && $_GET['a&s'] == 1) ? 'school_name = Morrissey College of Arts & Sciences ' : '';
$school[] = (isset($_GET['law']) && $_GET['law'] == 1) ? 'school_name = Law School' : '';
$school[] = (isset($_GET['woods']) && $_GET['woods'] == 1) ? 'school_name = Woods College of Advancing Studies ' : '';
$school[] = (isset($_GET['social']) && $_GET['social'] == 1) ? 'school_name = School of Social Work ' : '';
$school[] = (isset($_GET['csom']) && $_GET['csom'] == 1) ? 'school_name = Carroll School of Management ' : '';
$school[] = (isset($_GET['nursing']) && $_GET['nursing'] == 1) ? 'school_name = Connell School of Nursing ' : '';
$school[] = (isset($_GET['lynch']) && $_GET['lynch'] == 1) ? 'school_name = Lynch School of Education ' : '';
$school[] = (isset($_GET['theology']) && $_GET['theology'] == 1) ? 'school_name = School of Theology & Ministry ' : '';
$temparray = array_filter($school); //filters the array for empty values
if (!empty($temparray)) {
<<<<<<< HEAD
   $selection = 'WHERE '.join('OR',$temparray);   // assigns a WHERE-clause with the non-empty values in the $temparray
} else {
   $selection = ''; 
}
$query = "SELECT email FROM community $selection"; // selects from the database based on which criteria is set - some, all or none
echo "Query: $query (br />";

$result =mysqli_query ($dbc, $query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
	$email = $row['email'];
	$emaillist+= "$email, ";
	}

	$to= $emaillist
=======
   $selection = 'WHERE '.join('AND ',$temparray);   // assigns a WHERE-clause with the non-empty values in the $temparray
} else {
   $selection = ''; 
}

$sql = "SELECT email FROM community $selection"; // selects from the database based on which criteria is set - some, all or none
	
	
	$to= 
>>>>>>> origin/master
	$subject= isset($_GET["subject"]) ? $_GET["subject"] : "";
	$body=isset($_GET["message"]) ? $_GET["message"] : "";
	$headers = 'From: The-Social-Network@bc.edu';
	mail( $to, $subject, $body, $headers );
	}
<<<<<<< HEAD
	}
=======
>>>>>>> origin/master
?>


	</fieldset>
	
	</body>
	</html>
	
<script>
	function validation() {
	
	var subject = document.getElementById("subject").value;
	var message = document.getElementById("message").value;
	var errorsubject=document.getElementById("subjecterror");
	var errormessage = document.getElementById("messageerror");
	var errorcheckbox= document.getElementById("checkboxerror");
	//subject validation
	if (subject==""){
				errorsubject.innerHTML = "Please enter an Email";
				}
	//message validation
	if (message=="") {
		errormessage.innerHTML= "Please enter a message to send";
		}
					
	//checkbox validation
    var checkboxs=document.getElementsByName("school");
    var okay=false;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=true;
            break;
        }
    }
    if(okay) {}
    else { 
    	
    	errorcheckbox.innerHTML = "Please check a major"}
}
<<<<<<< HEAD
</script>
=======
</script>
>>>>>>> origin/master
