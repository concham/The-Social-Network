<?php

function connect_to_db($connect){
	$connect = mysqli_connect("cscilab.bc.edu/phpmyadmin", "kernanc", "Y5NevHgP", "community");
	if (! $connect) {
		die("Connect failed: ". mysqli_connect_error());
	}

function perform_query($connect, $query){
	$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
	$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$password = isset($_POST["password"]) ? $_POST["password"] : "";
	$encryptpassword = sha1($password);
	$school = isset($_POST["school"]) ? $_POST["school"] : "";
	
	$query = "INSERT INTO community(firstname, lastname, email, password, school)
		VALUES('$firstname','$lastname','$email','$encryptpassword','$school');"
	
	if (mysqli_query($connect, $query)) {
		echo "You have successfully joined The Social Network";
	} else {
		 echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	}
	
mysqli_close($connect);

?>
