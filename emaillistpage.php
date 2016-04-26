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