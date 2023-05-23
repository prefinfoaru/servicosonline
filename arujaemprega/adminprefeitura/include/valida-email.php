

<script>

	var email = document.getElementById("email")
	, confirm_email = document.getElementById("confirm_email");

	function validateEmail(){
	if(email.value != confirm_email.value) {
	confirm_email.setCustomValidity("Emails diferentes!");
	} else {
	confirm_email.setCustomValidity('');
	}
	}

	email.onchange = validatePassword;
	confirm_email.onkeyup = validatePassword;
	
</script>