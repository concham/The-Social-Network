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

		<legend> Did You Forget Your Password? </legend>

<br>
		<label for="email">BC E-Mail Address: </label>

		<input type="text" name="email" id="username" size="30" />
		<br><br>
		<button id="GRButton"> Submit</button> 
		
		<?php 
function createnewpassword(){
	include('dbconn.php')
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = isset($_GET["email"]) ? $_GET["email"] : "";
      
	$sql= "SELECT ID FROM community WHERE $email = 'email'";
	$count = mysqli_num_rows($sql);
	
//count the number of rows that results from the query, if there is one then set $to email variable to the email the user entered,
//generate a random password, replace the original password with the new one
	 if($count == 1) {
         random_password();
         $encryptpassword= sha1($newpassword);
         $query = "UPDATE community SET password='$newpassword' WHERE email='$email'";
	
	$dbc = connect_to_db("kernanc");
	if (true == perform_query( $dbc, $query ) ) {
			$returnstatus = array( 'status'=> "success", 'data'=> "You have successfully changed your password");
			sendpasswordinemail();
			echo $returnstatus;
	} else {
			$returnstatus = array( 'status'=> "failure", 'data'=> "Error: " . $sql . "<br>" . mysqli_error($connect));
	}
      		}else {
         	$error = "Your Login Name is invalid";
         	echo error;
		 }
	   }
}
	// Actually email the new password
	function sendpasswordinemail(){
	$to= isset($_GET["email"]) ? $_GET["email"] : "";
	$subject='forgot your password';
	$body='Here is your password: $newpassword';
	$headers = 'From: The-Social-Network@bc.edu';
	mail( $to, $subject, $body, $headers );
	}
	// Generate a random password
	function random_password( $length = 8 ) {
	 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	 $newpassword = substr( str_shuffle( $chars ), 0, $length );
    	return $newpassword;
	}
?>
	</fieldset> 
	 </body>
</html>
