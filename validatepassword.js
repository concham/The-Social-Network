function validatepassword(){
			var password= document.getElementById("password").value ;
			
			if (password.length < 1) {
				var errorpassword=document.getElementById("passworderror");
				errorpassword.innerHTML = "Please enter a password";
				return false;
			} 
			var errorpassword=document.getElementById("passworderror");
			errorpassword.innerHTML = "";
	
			return true;
			}