<?php

<script type="text/javascript">
document.getElementById("GRButton").addEventListener("click", registerNewUswer);
function registerNewUser() {

var FirstName = document.getElementById("FirstName");
var LastName = document.getElementById("LastName");
var UserName = document.getElementById("UserName");
var Password = document.getElementById("Password");
var School = document.getElementsByName("School");
	for (var i = 0; i < School.length; i++) {
		if (School[i].checked) {
			School = School[i].value;
			}
		}	
var sql = "INSERT INTO community(FirstName, LastName, UserName, Password, School) VALUES('"FirstName"','"LastName"','"UserName"','"Password"','"School"');";
}
</script>

$connect = mysqli_connect("localhost","my_user","my_password","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
mysqli_query($connect sql);
mysqli_close($connect);
?>
