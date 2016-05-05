<?php
include('dbconn.php');
$debug = 1;
if ( ! isset( $_POST['email'] ) or  
	 ! isset( $_POST['password'] ) or 
	( 0 == checklogin( $_POST['email'], $_POST['password'] ) ) ) {
  header("Location: newlogin960.php");
 } else { 
	// Store the login information in cookies	
	setcookie('loginCookieUser', $_POST['email']);
  	header("Location: homepage960.html");
}
// checklogin sees if an entry exists with the name password pair passed.
// returns true if so, false otherwise.
function checklogin($email, $password){
	$encodepassword = sha1($password);
	$query = "SELECT * FROM Member WHERE email='$email' and password='$encodepassword'";
	$dbc = connect_to_db("kernanc");
	$result = perform_query($dbc, $query);
	$matches = mysqli_num_rows($result);
	mysqli_free_result($result);
	return($matches != 0);
}
