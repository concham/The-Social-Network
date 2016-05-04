<?php
	
	include("dbconn.php");
	$membertype = isset($_POST["membertype"]) ? $_POST["membertype"] : "";
	$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
	$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$password = isset($_POST["password"]) ? $_POST["password"] : "";
	$encryptpassword = sha1($password);
	$school = isset($_POST["school"]) ? $_POST["school"] : "";
	
	$query = "INSERT INTO Member(membertype, firstname, lastname, email, password, school)
		VALUES('$membertype','$firstname','$lastname','$email','$encryptpassword','$school');";
	
	$dbc = connect_to_db("kernanc");
	if (true == perform_query( $dbc, $query ) ) {
			$returnstatus = array( 'status'=> "success", 'data'=> "You have successfully joined The Social Network");
	} else {
			$returnstatus = array( 'status'=> "failure", 'data'=> "Error: " . $sql . "<br>" . mysqli_error($connect));
	}
		
	echo json_encode( $returnstatus );