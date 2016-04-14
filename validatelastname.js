function validateLastName(){
			var lastname= document.getElementById("LastName").value ;
			
			if (lastname.length < 1) {
				var errorlastname=document.getElementById("lastnameerror");
				errorlastname.innerHTML = "Please enter a last name";
				return false;
			} 
			var errorlastname=document.getElementById("lastnameerror");
			errorlastname.innerHTML = "";
	
			return true;
			}