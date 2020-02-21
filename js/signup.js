function validate() {
	const errorElement = document.getElementById('error');
	var name = document.getElementById('name');
	var username = document.getElementById('username');
	var password = document.getElementById('password');
	var gender = $("input[name='gender']:checked");
	// var gender = document.getElementById('gender');
	var alphanumeric = /^[0-9a-zA-Z]+$/;
	var alphabets = /^[a-zA-Z]+$/;
	var pass =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	
	form.addEventListener('submit', (event) => {
		let messages = [] 
		if(name.value === '' || name.value == null){
			messages.push('Name is required')
		}if(!name.value.match(alphabets)) {
			messages.push('Please input alphabet characters only for Full Name');
		}

		if(email.value === '' || email.value == null){
			messages.push('Email is required')
		}
		if(username.value === '' || username.value == null){
			messages.push('Username is required')
		}
		if(!username.value.match(alphanumeric)) {
			messages.push('Please input alphanumeric characters only for Username');
		}
		if(password.value === '' || password.value == null){
			messages.push('Password is required')
		}
		if(!password.value.match(pass)) {
			messages.push('Please use correct format for Password: at least 1 number,1 uppercase and minimum 6 character');
		}
		if(gender.length === 0){
			messages.push('Select gender');
		}

		if(messages.length > 0){
			event.preventDefault();
			temp = [];
			for (var i = 0; i < messages.length; i++){
				temp.push('<p>'+messages[i]+'</p>');
			}
			$("#messages").html(temp);
			return false;
		}

	});


}
