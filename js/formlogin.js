function validation(){
    const errorElement = document.getElementById('error');
    var username = document.getElementById('username');
    var password = document.getElementById('password');

    form.addEventListener('submit', (event) =>{
        let messages = [] 

        if(username.value === '' || username.value == null){
			messages.push('Username is required')
        }

        if(password.value === '' || password.value == null){
			messages.push('Password is required')
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
        // else {
		// 	document.location.href = 'home.php'
        // }
        
        // $("#messages").hide();
    });
}