<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title> The Social Network: Login </title>
		<link rel ="stylesheet" href="css/bootW.css">
</head>


<body style="padding:20px;">
<h1 align=center> Boston College Log In </h1>
<br>

<ul class="nav nav-tabs" style>
<li><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html" data-toggle="tab"><font color="F5DEB3">Home</font></a></li>
<li><a href="http://cscilab.bc.edu/~concham/Project/news960.php?" data-toggle="tab"><font color="F5DEB3">Get BC News!</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~concham/Project/EmailList.php?" data-toggle="tab"><font color="F5DEB3">Send Email</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~concham/Project/messageboard960.html" data-toggle="tab"><font color="F5DEB3">Comment</font></a></li>
<li class="active"><a href="http://cscilab.bc.edu/~concham/Project/newlogin960.php" data-toggle="tab"><font color="F5DEB3">Log In</font></a></li>
<li><a href="http://cscilab.bc.edu/~concham/Project/registrationform960.html" data-toggle="tab"><font color="F5DEB3">Create Account</font></a></li>
<li class="disabled"><a href="http://cscilab.bc.edu/~concham/Project/passwordreset960.html" data-toggle="tab"><font color="F5DEB3">Reset Password</font></a></li>

</ul>

<style>
body {
	background-color: #92000a;
	color: #ff7755; 
	}
h1 {
	color: #DAA520;
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
	background-color: #92000a;
}
label {
	color: #DAA520; 
	font-size: 115%;
}
legend {
	color: #DAA520; 
	font-size: 140%;
}
.fieldset1 {
	border: 3px solid #ff9977;
	height: 300px;
	width: 1175px;
}
.fieldset2 {
	border: 3px solid #ff9977;

	width: 1175px;
}
.button1 {
	background-color: white;
	border: 2px color: black;
	font-size: 14px;
	margin-left: 7px;
}
.style3 {
	display: none;
}	
	</style>



<br><br>

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
	<form action="logincookie960.php" method="post" class="form-horizontal">
		<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email:</label>
            <div class="col-lg-10">
      <input type="text" name="email" type="text" size="20" class="form-control" value="<?php echo $email; ?>"/>
         </div>
    </div>
        <div class="form-group">
<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
      <div class="col-lg-10">
<input name="password" type="password" size="20" class="form-control" value="<?php echo $password; ?>"/>

      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
		<input name="submitted" type="hidden" size="20" value="true" /><br>
		<input type="submit" name="Login" class="btn btn-primary" value="Login" />
      </div>
    </div>
		<br>
				<br>
		
	<p><font color="DAA520">Don't have an account? </font><a href="http://cscilab.bc.edu/~barthch/csciproject960/registrationform960.html"> Register Here! </a> </p>
	<p><font color="DAA520">Forgot Your Password? </font><a href="http://cscilab.bc.edu/~barthch/csciproject960/passwordreset960.html"> Click Here! </a> </p>
	</form>
	</fieldset>
<?php }




