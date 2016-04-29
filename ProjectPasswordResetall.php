<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
	<meta charset="utf-8"/>
	<title>HW Reset Password</title>

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
	background-color: #ffccbb;
}
label {
	color: #ff7755; 
	font-size: 115%;
}
legend {
	color: #ff7755; 
	font-size: 140%;
}
fieldset {
	border: 3px solid #ff9977;	
	}
button{
	background-color: white;
	border: 2px color: black;
	font-size: 15px;
}
	
	</style>
</head>

<h1> The Social Network</h1>

<hr class="style1"><hr class="style2">
<br>
	<fieldset>
		<form id="ajaxRequestForm" method="post">
		<legend> Did You Forget Your Password? </legend>
		<br>
		<label for="email">BC E-Mail Address: </label>
		<input type="text" name="email" id="username" size="30" />
		<br><br>
		<button id="GRButton"> Submit</button>
		</form>
		</fieldset> 
		
<?php 
include('dbconn.php');
function create_new_password(){
	if($_SERVER["REQUEST_METHOD"] == "POST") {
     		$email = isset($_POST["email"]) ? $_POST["email"] : ""; //check if email is entered, get email
      		$query = "SELECT * FROM Member WHERE email = '$email'"; //query to check database for email
      		$dbc = connect_to_db("kernanc"); //connect to database
			if (true == perform_query( $dbc, $query ) ) { //run the query
				$count = mysqli_num_rows($query); //count the rows returned
				if($count != 0) { //if count is not 0,
         				random_password(); //run function random_password
         				$encryptnewpassword = sha1($newpassword); //encrypt new password from function random_password()
         				$query = "UPDATE Member SET password='$encryptnewpassword' WHERE email='$email'"; //query to replace password in database
				 	$dbc = connect_to_db("kernanc"); //connect to database
				 		if (true == perform_query( $dbc, $query ) ) { //run the query
							$returnstatus = array( 'status'=> "success", 'data'=> "You have successfully changed your password");
							echo $returnstatus;
						} else {
							$returnstatus = array( 'status'=> "failure", 'data'=> "Error: " . $sql . "<br>" . mysqli_error($connect));
							echo $returnstatus;
						}
				 } else { //if count is 0, return error message
				 	$error = "Your email is invalid";
				 	echo $error;
				 }
			}
	}
}

// Generate a random password and email to user
function random_password() {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$newpassword = array();
$charsLength = strlen($chars) - 1;
    for ($i = 0; $i < 8; $i++) {
	$n = rand(0, $charsLength);
	$newpassword[] = $chars[$n];
    }
$to = isset($_POST["email"]) ? $_POST["email"] : "";
$subject = "Forgot Your Password";
$body = "Here is your new password: $newpassword";
$header = "From: The-Social-Network@bc.edu";
	mail($to, $subject, $body, $headers);
}
?>

	</body>
</html>
