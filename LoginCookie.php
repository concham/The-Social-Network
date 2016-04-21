<?php
include('dbconn.php')
$debug = 1;

if ( ! isset( $_POST['username'] ) or  
	 ! isset( $_POST['password'] ) or 
	( 0 == checklogin( $_POST['username'], $_POST['password'] ) ) ) {
  header("Location: NewLogin.php");
 } else { 
	
	// Store the login information in cookies	
	setcookie('loginCookieUser', $_POST['username']);
  	header("Location: HW14.php");
}
// checklogin sees if an entry exists with the name password pair passed.
// returns true if so, false otherwise.
function checklogin($username, $password){
	$dbc = connectToDB("kernanc");
	$encodepassword = sha1($password);
	$result = performQuery($dbc, 
		"select * FROM community where username='$username' and password='$encodepassword'");
	$matches = mysqli_num_rows($result);
	mysqli_free_result($result);
	disconnectFromDB($dbc);
	return($matches == 1);
}

