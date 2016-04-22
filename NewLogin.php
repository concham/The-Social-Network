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
	<form action="loginCookie.php" method="post">
		Email:<input type="text" name="email" type="text" size="20" value="<?php echo $email; ?>"/>
		Password:<input name="password" type="password" size="20" value="<?php echo $password; ?>"/><br />
		<input name="submitted" type="hidden" size="20" value="true" /><br>
		<input type="submit" name="Login" value="Login" />
		
	<p>Don't have an account? <a href="http://cscilab.bc.edu/~kernanc/project/TheSocialNetwork/PreRegistration.html"> Register Here! </a> </p>
	<p>Forgot Your Password? <a href="http://cscilab.bc.edu/~concham/Project/ProjectPasswordReset.html"> Click Here! </a> </p>
	</form>
	</fieldset>
<?php }

/* <?php
   include("dbconn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT ID FROM community WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

        
   </head>
		<form action="" method= "post" class="form-horizontal">
		  <fieldset>
			<legend>Log In</legend>
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">Username</label>
			  <div class="col-lg-10">
				<input type="text" class="form-control" id="inputEmail" placeholder="Username" name="username">
			  </div>
			</div>

						<br>
			<div class="form-group">
			  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
			  <div class="col-lg-10">
				<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
			  </div>
			</div>
			  <div class="col-lg-10 col-lg-offset-2">

	<br>
				<button type="submit" value="Submit" class="btn btn-primary">Submit</button>

<br>
			  </div>
	  <br><br>

				<p>Don't have an account? <a href="http://cscilab.bc.edu/~kernanc/project/TheSocialNetwork/PreRegistration.html"> Register Here! </a> </p>

				<p>Forgot Your Password? <a href="http://cscilab.bc.edu/~concham/Project/ProjectPasswordReset.html"> Click Here! </a> </p>
		  </fieldset>
		</form>
		
</body>
</html>*/



