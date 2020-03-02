function validate(){
    const errorElement = document.getElementById('error');
    var product_name = document.getElementById('product_name');
    var product_image = document.getElementById('product_image');
    var product_type = document.getElementById('product_type');

    form.addEventListener('submit', (event) => {
        let messages = [] 
		if(product_name.value === '' || product_name.value == null){
            messages.push('Product Name is required')
        }
        if(product_image.value == ''){
            messages.push('Product Image is required');
        }
        if(product_type.value == 0){
            messages.push('Product Type is required');
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