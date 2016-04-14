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
			
			function validateconfirmation(){
			var confirmation= document.getElementById("confirmation").value ;
			
			if (confirmation.length < 1) {
				var errorconfirmation=document.getElementById("confirmationerror");
				errorconfirmation.innerHTML = "Please enter your password confirmation";
				return false;
			} 
			
			if(confirmation !== password) {
			errorconfirmation= document.getElementByID("confirmationerror");
			errorconfirmation.innerHTML= "Password must match with confirmed password";
			return false;
			}
			
			var errorconfirmation=document.getElementById("confirmationerror");
			errorconfirmation.innerHTML = "";
	
			return true;
			}
