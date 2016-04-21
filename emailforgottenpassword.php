<?php 
// NOT COMPLETE FUNCTION, does not change the password
function emailpassword(){
	include('dbconn.php')
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      
	$sql= "SELECT ID FROM community WHERE $email = 'email'";
	$count = mysqli_num_rows($result);
	 if($count == 1) {
         $to= isset($_GET["email"]) ? $_GET["email"] : "";
      }else {
         $error = "Your Login Name is invalid";
      }
	
	$subject='forgot your password';
	$body='Here is your password: ';
	
	$headers = 'From: The-Social-Network@bc.edu;
	if ( mail( $to, $subject, $body, $headers ) )
		echo " Password was sent to $to";
	else
		echo "$error";
		}
		}
?>
