	
<?php 
include("dbconn.php");
$email = isset($_POST["email"]) ? $_POST["email"] : ""; //check if email is entered, get email
$query = "SELECT * FROM Member WHERE email = '$email'"; //query to check database for email
      	
$dbc = connect_to_db("kernanc"); //connect to database
if (true == perform_query( $dbc, $query ) ) { //run the query
	$result = mysqli_query($dbc, $query);
  	$count=mysqli_num_rows($result); //count the rows returned
		if($count != 0) { //if count is not 0,
         		random_password(); //run function random_password
		} else { //if count is 0, return error message
			$error = "Your email is invalid";
			echo $error;	
		}
}
// Generate a random password
function random_password() {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$length = 8;
	$newpassword = substr(str_shuffle($chars), 0, $length);
	
//email new password to user
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$subject = "Forgot Your Password";
	$body = "Here is your new password: $newpassword";
	$header = "From: The-Social-Network@bc.edu";
		mail($email, $subject, $body, $header);
		
//encrypt new password and update database		
	$encryptnewpassword = sha1($newpassword); //encrypt new password
        $query = "UPDATE Member SET password='$encryptnewpassword' WHERE email='$email'"; //query to replace password in database
		
	$dbc = connect_to_db("kernanc"); //connect to database
		if (true == perform_query( $dbc, $query ) ) { //run the query
			$returnstatus = array( 'status'=> "success", 'data'=> "You have successfully changed your password");
		} else {
			$returnstatus = array( 'status'=> "failure", 'data'=> "Error: " . $sql . "<br>" . mysqli_error($connect));
		}
}
?>