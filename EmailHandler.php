<?php

include("dbconn.php");

$schools = explode( ",", $_POST["schools"] );
//print_r($_POST);
//print_r($schools);

$wherestr = "";
foreach ($schools as $val) {
	if ($wherestr == "") {
		$wherestr = "school=$val";
	} else {
		$wherestr  .= " OR school=$val";
	}
}

$query = "SELECT email FROM Member WHERE $wherestr";
		$emaillist = "";
		$dbc = connect_to_db("kernanc");
		$result = perform_query( $dbc, $query );
 
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$email = $row['email'];
			$emaillist .= "$email, ";
		}
		
		$to = $emaillist;
		$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
		$message = isset($_POST["message"]) ? $_POST["message"] : "";
		$header = 'From: The-Social-Network@bc.edu';
				mail( $to, $subject, $message, $header );

?>
