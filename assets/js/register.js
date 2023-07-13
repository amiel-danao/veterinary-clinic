$('#registerForm').submit(function(event){
	event.preventDefault();
	let password = $("input[name='customerDetailsPassword']")[0].value;
	let retypePassword = $("input[name='customerDetailsRetypePassword']")[0].value;
    let num1 = $("input[name='customerDetailsCustomerMobile']")[0].value;
    let num2 = $("input[name='customerDetailsCustomerPhone2']")[0].value;
    if(password.length >= 8 && /\d/.test(password)){
        if(password == retypePassword){
		    $("#registerForm")[0].submit();
	    } else {
	        alert("Password does not match!");
	    }
    } else {
        if (password.length < 8 && /\d/.test(password) == false){
            alert("Password did not meet specific requirements!");
        } else if (/\d/.test(password) == false){
            alert("Password don't have numbers!");
        } else if (password.length < 8){
            alert("Required password length insufficient!");
        }
    }
});