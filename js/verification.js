// otp verification

$(document).ready(function(){

    function OTPInput() {

        const inputs = document.querySelectorAll('#otp > *[id]');
        
        $('#submitOTP').prop('disabled', true);

        for (let i = 0; i < inputs.length; i++) { 

            inputs[i].addEventListener('keydown', function(event) { 

                if (event.key === "Backspace" ) { 

                    inputs[i].value=''; 
                    if (i !==0) 
                    inputs[i - 1].focus(); 

                } else { 

                    if (i === inputs.length - 1 && inputs[i].value !== '' ) {

                        return true; 

                    } else if (event.keyCode > 47 && event.keyCode < 58) {

                        inputs[i].value = event.key; 
                        if (i !== inputs.length - 1) 
                        inputs[i + 1].focus(); 
                        event.preventDefault(); 

                    } else if (event.keyCode > 64 && event.keyCode < 91) { 

                        inputs[i].value = String.fromCharCode(event.keyCode); 

                        if (i !== inputs.length - 1) 
                        inputs[i + 1].focus(); 
                        event.preventDefault(); 
                    } 

                }

                if (
                    inputs[0].value != "" 
                    && 
                    inputs[1].value != "" 
                    && 
                    inputs[2].value != "" 
                    && 
                    inputs[3].value != "" 
                    && 
                    inputs[4].value != "" 
                    && 
                    inputs[5].value != "") {

                    $('#submitOTP').prop('disabled', false);
                    
                } else {
                    $('#submitOTP').prop('disabled', true);
                }

            }); 

        }
    } 
    
    OTPInput(); 
    

});