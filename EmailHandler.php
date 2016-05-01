<?php

include("dbconn.php");

$school = array(); //sets the schools as an array
$school[] = (isset($_POST['a&s']) && $_POST['as'] == 1) ? 'school_name = Morrissey College of Arts & Sciences ' : '';
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

$query = "SELECT email FROM Member $selection"; // selects from the database based on which criteria is set - some, all or none

$dbc = connect_to_db("kernanc");
if (true == perform_query( $dbc, $query ) ) {
	$result = mysqli_query($dbc, $query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$email = $row['email'];
		$emaillist = "";
		$emaillist += "$email, ";
	}
}

$to = $emaillist;
$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
$message = isset($_POST["message"]) ? $_POST["message"] : "";
$header = 'From: The-Social-Network@bc.edu';
	mail( $to, $subject, $message, $header );

?>
