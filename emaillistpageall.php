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
		<label> Subject</label>
		<input type="text" id="subject"><br>
		<p id="subjecterror"></p>
		
		<br>
		<br>
		<label> Your Message</label>
		<input type="textarea" id="message" cols="20" rows="5"><br>
		<p id="messageerror"></p>
		
	<br>
	<br>
		<p> Choose Schools </p>
		
		<input type="checkbox" name="school" value="A&S"> Morrissey College of Arts & Sciences <br>
		<input type="checkbox" name="school" value="Law"> Law School <br>
		<input type="checkbox" name="school" value="Woods"> Woods College of Advancing Studies <br>
		<input type="checkbox" name="school" value="Social"> School of Social Work <br>
		<input type="checkbox" name="school" value="CSOM"> Carroll School of Management <br>
		<input type="checkbox" name="school" value="Nursing"> Connell School of Nursing <br>
		<input type="checkbox" name="school" value="Lynch"> Lynch School of Education <br>
		<input type="checkbox" name="school" value="Theology"> School of Theology & Ministry <br>
		<p id="checkboxerror"> </p>
		
		 
		<br>
		
	<p> Mailing Password </p>
	<input type= "text" id="mailingpassword">
		<input type="button" onclick="return validation();" id="myBtn" value="Send Mail"> </input>
		<?php
function sendemailtoclass(){
include(dbconn.php)
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
   $selection = 'WHERE '.join('AND ',$temparray);   // assigns a WHERE-clause with the non-empty values in the $temparray
} else {
   $selection = ''; 
}
$sql = "SELECT email FROM community $selection"; // selects from the database based on which criteria is set - some, all or none
	$to= $sql
	$subject= isset($_GET["subject"]) ? $_GET["subject"] : "";
	$body=isset($_GET["message"]) ? $_GET["message"] : "";
	$headers = 'From: The-Social-Network@bc.edu';
	mail( $to, $subject, $body, $headers );
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
