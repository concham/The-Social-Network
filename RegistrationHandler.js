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