		
<?php 

include("dbconn.php");

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
