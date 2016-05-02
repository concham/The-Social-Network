<?php

include("dbconn.php");

$query = "SELECT email FROM Member WHERE";
if(!empty($_POST['school[]'])) {
	foreach($_POST['school[]'] as $schools) {
		$splitarray = join("OR", $schools);
		$query += "school='$splitarray'";

		$dbc = connect_to_db("kernanc");
		if (true == perform_query( $dbc, $query ) ) {
			$result = mysqli_query($dbc, $query);
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$email = $row['email'];
				$emaillist = "";
				$emaillist += "$email, ";
				
					$to = $emaillist;
					$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
					$message = isset($_POST["message"]) ? $_POST["message"] : "";
					$header = 'From: The-Social-Network@bc.edu';
						mail( $to, $subject, $message, $header );
			}
		}
	}
}

?>
