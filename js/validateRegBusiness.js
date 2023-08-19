
//validate password

$(document).ready(function() {
    var businessName = $('#businessName');
    var businessNameHelp = $('#businessNameHelp');

    var businessEmail = $('#businessEmail');
    var businessEmailHelp = $('#businessEmailHelp');

    var businessPassword = $('#businessPassword');
    var businessPasswordHelp = $('#businessPasswordHelp');
    var togglePasswordButton = $('#togglePasswordButton');
    var eyeIcon = $('#eyeIcon');

    var regBusinessBtn = $('#regBusinessBtn');
    
    regBusinessBtn.prop("disabled", true);

    businessName.on('input', function() {
        
        var minLength = 2;
        var maxLength = 100;

        // check business name duplicate

        $.ajax({
            url: 'checkBusiness.php',
            method: 'POST',
            data: { businessName: businessName.val() },
            success: function(response) {

                if (businessName.val() == "") {
                    businessNameHelp.text('');
                    
                    regBusinessBtn.prop("disabled", true);
                } else {

                    if (businessName.val().length < minLength) {
                        regBusinessBtn.prop("disabled", true);
                        businessNameHelp.text("Business name must be at least " + minLength + " characters long.");
                        businessNameHelp.css("color", "red");
                    } else if (businessName.val().length > maxLength) {
                        regBusinessBtn.prop("disabled", true);
                        businessNameHelp.text("Business name cannot exceed " + maxLength + " characters.");
                        businessNameHelp.css("color", "red");
                    } else {

                        if (response == "duplicate") {
                            businessNameHelp.text('Business name has been taken');
                            businessNameHelp.css("color", "red");
                            
                            regBusinessBtn.prop("disabled", true);
                        } else {
                            businessNameHelp.text('Business name available');
                            businessNameHelp.css("color", "green");
                            
                            regBusinessBtn.prop("disabled", false);
                        }

                    }

                }
                
            },
            error: function(xhr, status, error) {

                console.log(error);
            }
        });
    });

    businessEmail.on('input', function() {
        var email = businessEmail.val();

        // Regex pattern for email validation
        var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (pattern.test(email)) {
            businessEmailHelp.text("Email is valid.");
            businessEmailHelp.css("color", "green");
        } else {
            regBusinessBtn.prop("disabled", true);
            businessEmailHelp.text("Please enter a valid email address.");
            businessEmailHelp.css("color", "red");
        }
    });

    businessPassword.on('input', function() {
        var password = businessPassword.val();

        // Regex pattern for password validation
        var pattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[$@#!%^&*_])[A-Za-z\d$@#!%^&*_]{6,20}$/;

        if (pattern.test(password)) {
            regBusinessBtn.prop("disabled", false);
            businessPasswordHelp.text("Password is valid.");
            businessPasswordHelp.css("color", "green");
        } else {
            regBusinessBtn.prop("disabled", true);
            businessPasswordHelp.text("Password must contain be 6-20 characters with at least one letter, one number, and one special character.");
            businessPasswordHelp.css("color", "red");
        }
    });

    togglePasswordButton.on('click', function() {
        var passwordFieldType = businessPassword.attr('type');

        if (passwordFieldType === 'password') {
            businessPassword.attr('type', 'text');
            eyeIcon.removeClass('icon-eye').addClass('icon-eye-slash');
        } else {
            businessPassword.attr('type', 'password');
            eyeIcon.removeClass('icon-eye-slash').addClass('icon-eye');
        }
    });
});