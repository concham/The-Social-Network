function validateFirstName(){
			var firstname= document.getElementById("FirstName").value ;
			
			if (firstname.length < 1) {
				var errorfirstname=document.getElementById("firstnameerror");
				errorfirstname.innerHTML = "Please enter a first name";
				return false;
			} 
<<<<<<< HEAD
			var erroremail=document.getElementById("firstnameerror");
			errorfirstname.innerHTML = "";
	
			return true;
			}
=======
			var errorfirstname=document.getElementById("firstnameerror");
			errorfirstname.innerHTML = "";
	
			return true;
			}
>>>>>>> origin/master
