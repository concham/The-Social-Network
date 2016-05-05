<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title> The Social Network: Login </title>
		<link rel ="stylesheet" href="css/bootW.css">
</head>


<body style="padding:20px;">
		<div class="nav grid_7" align="right">
					<font color="DAA520"><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html"><font color="F5DEB3">Home</font></a> / <a href="http://www.bc.edu/"><font color="F5DEB3">Stay Connected</font></a> / <a href="https://mail.google.com/"> <font color="F5DEB3">Contact Us</font></a> / <a href="LogoutCookie.php"><font color="F5DEB3">Logout</font></a></font>
				</div>
<h1 align=center> Boston College Log In </h1>
<br>

<ul class="nav nav-tabs">
	<li><a href="http://cscilab.bc.edu/~concham/Project/homepage960.html" >Home</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/news960.php" >Get BC News!</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/EmailList.php" >Send Email</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/messageboard960.php" >Message Board</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/newlogin960.php" >Log In</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/registrationform960.html">Create Account</a></li>
	<li><a href="http://cscilab.bc.edu/~concham/Project/passwordreset960.html">Reset Password</a></li>
</ul>


<br><br>

<?php 
	$email = isset( $_POST['email'] ) ? $_POST['email'] : "";
	$password = isset( $_POST['password'] ) ? $_POST['password'] : "";
	displayLoginForm( $email, $password );
?>

        		<div class="nav grid_7" align="left">
<hr>
            <div class="col-md-6 col-xs-12">
                <nav class="">
                    <ul>
<font color="F5DEB3">
							<a href="http://www.bc.edu/sites/accessibility.html">Accessibility       </a>|
                            <a href="http://www.bc.edu/emergency">       Emergency       </a>| 
                            <a href="http://www.bc.edu/bc-web/about/maps-and-directions.html">       Maps       </a>|
                            <a href="https://portal.bc.edu/portal/page/portal/Public/PublicDirectorySearch">       Directories       </a>|
                            <a href="http://www.bc.edu/a-z/directories/contact.html">       Contact       </a></font>
 
                    </ul>
                </nav>
            </div>

                <div class="copyright text-right">
                  <font color="F5DEB3">  Copyright &copy; 2016 Trustees of Boston College </font>


<br><br><b><u><center>    <a href="#"><font color="DAA520">Back To Top</font></a></center></u></b>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>

<?php
function displayLoginForm($email, $password)
{?>
	<fieldset>
	<form action="logincookie960.php" method="post" class="form-horizontal">
		<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label" >Email:</label>
            <div class="col-lg-10">
      <input type="text" name="email" type="text"  style="background-color:#faedd6"  size="20" class="form-control" value="<?php echo $email; ?>"/>
         </div>
    </div>
        <div class="form-group">
<label for="inputPassword" class="col-lg-2 control-label">Password:</label>
      <div class="col-lg-10">
<input name="password" type="password" size="20"  style="background-color:#faedd6"  class="form-control" value="<?php echo $password; ?>"/>

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




