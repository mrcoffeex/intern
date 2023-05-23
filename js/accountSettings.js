
//validate password

$(document).ready(function() {
    
    var emailInput = $('#userEmail');
    var emailHelpText = $('#emailHelp');

    var currentPassword = $('#currentPassword');
    var currentPasswordHelp = $('#currentPasswordHelp');
    var toggleCurrentPassword = $('#toggleCurrentPassword');
    var currentEyeIcon = $('#currentEyeIcon');

    var newPassword = $('#newPassword');
    var newPasswordHelp = $('#newPasswordHelp');
    var toggleNewPassword = $('#toggleNewPassword');
    var newEyeIcon = $('#newEyeIcon');

    var updateAccountBtn = $('#updateAccountBtn');

    emailInput.on('input', function() {
        var email = emailInput.val();

        // Regex pattern for email validation
        var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (pattern.test(email)) {
            emailHelpText.text("Email is valid.");
            emailHelpText.css("color", "green");
        } else {
            updateAccountBtn.prop("disabled", true);
            emailHelpText.text("Please enter a valid email address.");
            emailHelpText.css("color", "red");
        }
    });

    currentPassword.on('input', function() {
        var password = currentPassword.val();

        // Regex pattern for password validation
        var pattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[$@#!%^&*_])[A-Za-z\d$@#!%^&*_]{6,20}$/;

        if (password == "") {
            updateAccountBtn.prop("disabled", false);
            currentPasswordHelp.text("");
        } else {
            if (pattern.test(password)) {
                updateAccountBtn.prop("disabled", false);
                currentPasswordHelp.text("Password is valid.");
                currentPasswordHelp.css("color", "green");
            } else {
                updateAccountBtn.prop("disabled", true);
                currentPasswordHelp.text("Password must contain be 6-20 characters with at least one letter, one number, and one special character.");
                currentPasswordHelp.css("color", "red");
            }
        }
    });

    toggleCurrentPassword.on('click', function() {
        var currentPasswordType = currentPassword.attr('type');

        if (currentPasswordType === 'password') {
            currentPassword.attr('type', 'text');
            currentEyeIcon.removeClass('icon-eye').addClass('icon-eye-slash');
        } else {
            currentPassword.attr('type', 'password');
            currentEyeIcon.removeClass('icon-eye-slash').addClass('icon-eye');
        }
    });

    newPassword.on('input', function() {
        var password = newPassword.val();

        // Regex pattern for password validation
        var pattern = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[$@#!%^&*_])[A-Za-z\d$@#!%^&*_]{6,20}$/;

        if (password == "") {
            updateAccountBtn.prop("disabled", false);
            newPasswordHelp.text("");
        } else {
            if (pattern.test(password)) {
                updateAccountBtn.prop("disabled", false);
                newPasswordHelp.text("Password is valid.");
                newPasswordHelp.css("color", "green");
            } else {
                updateAccountBtn.prop("disabled", true);
                newPasswordHelp.text("Password must contain be 6-20 characters with at least one letter, one number, and one special character.");
                newPasswordHelp.css("color", "red");
            }
        }

    });

    toggleNewPassword.on('click', function() {
        var newPasswordType = newPassword.attr('type');

        if (newPasswordType === 'password') {
            newPassword.attr('type', 'text');
            newEyeIcon.removeClass('icon-eye').addClass('icon-eye-slash');
        } else {
            newPassword.attr('type', 'password');
            newEyeIcon.removeClass('icon-eye-slash').addClass('icon-eye');
        }
    });
});