
//validate password

$(document).ready(function() {
    var fnameInput = $('#schoolFname');
    var fnameHelpText = $('#fnameHelpText');
    var lnameInput = $('#schoolLname');
    var lnameHelpText = $('#lnameHelpText');
    var emailInput = $('#schoolEmail');
    var emailHelpText = $('#emailHelp');
    var passwordInput = $('#schoolPassword');
    var passwordHelpText = $('#passwordHelp');
    var regSchoolBtn = $('#regSchoolBtn');
    var togglePasswordButton = $('#togglePasswordButton');
    var eyeIcon = $('#eyeIcon');
    
    regSchoolBtn.prop("disabled", true);

    fnameInput.on('input', function() {
        var minLength = 2;
        var maxLength = 40;

        if (fnameInput.val().length < minLength) {
            regSchoolBtn.prop("disabled", true);
            fnameHelpText.text("Firstname must be at least " + minLength + " characters long.");
            fnameHelpText.css("color", "red");
        } else if (fnameInput.val().length > maxLength) {
            regSchoolBtn.prop("disabled", true);
            fnameHelpText.text("Firstname cannot exceed " + maxLength + " characters.");
            fnameHelpText.css("color", "red");
        } else {
            regSchoolBtn.prop("disabled", true);
            fnameHelpText.text("");
        }
    });

    lnameInput.on('input', function() {
        var minLength = 2;
        var maxLength = 30;

        if (lnameInput.val().length < minLength) {
            regSchoolBtn.prop("disabled", true);
            lnameHelpText.text("Lastname must be at least " + minLength + " characters long.");
            lnameHelpText.css("color", "red");
        } else if (lnameInput.val().length > maxLength) {
            regSchoolBtn.prop("disabled", true);
            lnameHelpText.text("Lastname cannot exceed " + maxLength + " characters.");
            lnameHelpText.css("color", "red");
        } else {
            regSchoolBtn.prop("disabled", true);
            lnameHelpText.text("");
        }
    });

    emailInput.on('input', function() {
        var email = emailInput.val();

        // Regex pattern for email validation
        var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (pattern.test(email)) {
            emailHelpText.text("Email is valid.");
            emailHelpText.css("color", "green");
        } else {
            regSchoolBtn.prop("disabled", true);
            emailHelpText.text("Please enter a valid email address.");
            emailHelpText.css("color", "red");
        }
    });

    passwordInput.on('input', function() {
        var password = passwordInput.val();

        // Regex pattern for password validation
        var pattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[$@#!%^&*_])[A-Za-z\d$@#!%^&*_]{6,20}$/;

        if (pattern.test(password)) {
            regSchoolBtn.prop("disabled", false);
            passwordHelpText.text("Password is valid.");
            passwordHelpText.css("color", "green");
        } else {
            regSchoolBtn.prop("disabled", true);
            passwordHelpText.text("Password must contain be 6-20 characters with at least one letter, one number, and one special character.");
            passwordHelpText.css("color", "red");
        }
    });

    togglePasswordButton.on('click', function() {
        var passwordFieldType = passwordInput.attr('type');

        if (passwordFieldType === 'password') {
            passwordInput.attr('type', 'text');
            eyeIcon.removeClass('icon-eye').addClass('icon-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            eyeIcon.removeClass('icon-eye-slash').addClass('icon-eye');
        }
    });
});