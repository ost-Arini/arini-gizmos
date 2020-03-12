function validate(){
    const errorElement = document.getElementById('error');
    var errormsg = []
    var address = document.getElementById('address');
    var qty = document.getElementById('qty');
    form.addEventListener('submit', (event) => {
        if(address.value === ''){
            errormsg.push('Address is required')
        }
        if(qty.value < 1 ){
            errormsg.push('Quantity is required')
        }
        if(errormsg.length > 0){
            event.preventDefault();
            temp = [];
            for (var i = 0; i < errormsg.length; i++){
                temp.push('<p>'+errormsg[i]+'</p>');
            }
            $("#errormsg").html(temp);
            return false;
        }
        
    });
}