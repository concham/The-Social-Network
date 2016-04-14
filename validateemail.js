function validateEmail(){
			var email= document.getElementById("email").value ;
			
			if (email.length < 1) {
				var erroremail=document.getElementById("emailerror");
				erroremail.innerHTML = "Please enter an Email";
				return false;
			} 
			var erroremail=document.getElementById("emailerror");
			erroremail.innerHTML = "";
	
			return true;
}
			
