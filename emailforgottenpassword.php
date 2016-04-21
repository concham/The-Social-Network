<?php 
// NOT COMPLETE FUNCTION
function emailpassword(){
	$to= isset($_GET["email"]) ? $_GET["email"] : "";
	$subject='forgot your password';
	$body='Here is your password: ';
	
	$headers = 'From: The-Social-Network@bc.edu;
	if ( mail( $to, $subject, $body, $headers ) )
		echo " Password was sent to $to";
	else
		echo " Password was NOT sent ";
		}
?>