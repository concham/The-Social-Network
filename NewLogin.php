<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title> The Social Network: Login </title>
	<link rel="stylesheet" type="text/css" href="CSSNewLogin.css">
</head>

<body>
<h1 align=center> Please Log In </h1>

<?php 
	$email = isset( $_POST['email'] ) ? $_POST['email'] : "";
	$password = isset( $_POST['password'] ) ? $_POST['password'] : "";
	displayLoginForm( $email, $password );
?>

</body>
</html>

<?php
function displayLoginForm($email, $password)
{?>
	<fieldset>
	<form action="LoginCookie.php" method="post">
		Email:<input type="text" name="email" type="text" size="20" value="<?php echo $email; ?>"/>
		Password:<input name="password" type="password" size="20" value="<?php echo $password; ?>"/><br />
		<input name="submitted" type="hidden" size="20" value="true" /><br>
		<input type="submit" name="Login" value="Login" />
		
	<p>Don't have an account? <a href="http://cscilab.bc.edu/~kernanc/project/TheSocialNetwork/PreRegistration.html"> Register Here! </a> </p>
	<p>Forgot Your Password? <a href="http://cscilab.bc.edu/~concham/Project/ProjectPasswordReset.html"> Click Here! </a> </p>
	</form>
	</fieldset>
<?php }


