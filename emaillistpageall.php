<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Email List</title>
</head>
<body>
<h1> Email List </h1>
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
		
		<input type="checkbox" name="school" value="Morrissey College of Arts & Sciences"> Morrissey College of Arts & Sciences <br>
		<input type="checkbox" name="school" value="Law School"> Law School <br>
		<input type="checkbox" name="school" value="Woods College of Advancing Studies"> Woods College of Advancing Studies <br>
		<input type="checkbox" name="school" value="School of Social Work"> School of Social Work <br>
		<input type="checkbox" name="school" value="Carroll School of Management"> Carroll School of Management <br>
		<input type="checkbox" name="school" value="Connell School of Nursing"> Connell School of Nursing <br>
		<input type="checkbox" name="school" value="Lynch School of Education"> Lynch School of Education <br>
		<input type="checkbox" name="school" value="School of Theology & Ministry"> School of Theology & Ministry <br>
		<p id="checkboxerror"> </p>
		
		 
		<br>
		
	<label> Email Password: </label>
	<input type= "text" id="mailingpassword">
	<br><br>
		<input type="button" onclick="return validation();" id="myBtn" value="Send Email!"> </input>
		
		
		<?php
if (isset($_GET['myBtn'])) {

function sendemailtoclass(){
include("dbconn.php");
connect_to_db();
$school = array(); //sets the schools as an array
$school[] = (isset($_POST['a&s']) && $_POST['a&s'] == 1) ? 'school_name = Morrissey College of Arts & Sciences ' : '';
$school[] = (isset($_POST['law']) && $_POST['law'] == 1) ? 'school_name = Law School' : '';
$school[] = (isset($_POST['woods']) && $_POST['woods'] == 1) ? 'school_name = Woods College of Advancing Studies ' : '';
$school[] = (isset($_POST['social']) && $_POST['social'] == 1) ? 'school_name = School of Social Work ' : '';
$school[] = (isset($_POST['csom']) && $_POST['csom'] == 1) ? 'school_name = Carroll School of Management ' : '';
$school[] = (isset($_POST['nursing']) && $_POST['nursing'] == 1) ? 'school_name = Connell School of Nursing ' : '';
$school[] = (isset($_POST['lynch']) && $_POST['lynch'] == 1) ? 'school_name = Lynch School of Education ' : '';
$school[] = (isset($_POST['theology']) && $_POST['theology'] == 1) ? 'school_name = School of Theology & Ministry ' : '';
$temparray = array_filter($school); //filters the array for empty values
if (!empty($temparray)) {
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

	$to= $emaillist;
	$subject= isset($_GET["subject"]) ? $_GET["subject"] : "";
	$body=isset($_GET["message"]) ? $_GET["message"] : "";
	$headers = 'From: The-Social-Network@bc.edu';
	mail( $to, $subject, $body, $headers );
	}
	}
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
</script>
