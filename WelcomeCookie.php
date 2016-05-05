<?php
	if (isset($_COOKIE['loginCookieUser']))
	{
		$outstr = "<h2 align=center>";
		$outstr .= "Welcome ".$_COOKIE['loginCookieUser'];
		header("Location: homepage960.html");
	} else {
		$outstr = "<h2 align=center> User not logged in";
		header("Location: WelcomeCookie.php");
	}			
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Welcome</title>
	<style type = "text/css">		  
			body {font-family: Verdana, sans-serif;}
	</style>
</head>
<body>

<?php echo $outstr; ?></h2>
<a href="newlogin960.php">Return to Login</a>
</body>
</html>
