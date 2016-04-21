<?php
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

<html>
   
   <head>
      <title>The Social Network: Login</title>
         <link rel="stylesheet" type="text/css" href="CSSNewLogin.css">
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

				<p>Forgot Your Password? <a href="http://cscilab.bc.edu/~concham/Project/ProjectPasswordReset.php"> Click Here! </a> </p>
		  </fieldset>
		</form>
		
</body>
</html>



