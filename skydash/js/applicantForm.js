// beforeunload


(function($) {

    'use strict';

    const jDate = new Date();

    // onkeyup event listener

    var formSubmitting = false;
    var setFormSubmitting = function() { formSubmitting = true; };

    window.onload = function() {

        window.addEventListener("beforeunload", function (e) {

            if ($('#applicantCreate').onsubmit()) {
                return undefined;
            }

            var confirmationMessage = 'It looks like you have been editing something. '
                                    + 'If you leave before saving, your changes will be lost.';
            
            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        });

    };

    // applicantType

    $(document).ready(function() {

        $('#applicantType li').on('click', function(){

            if (!$('#applicantType li').html()) {

                $('#hiddenApplicantType').val(""); 
                $('#applicantTypeSelected').html("Select");
                $('#applicantTypeRes').html(""); 

            } else {

                $('#hiddenApplicantType').val($(this).html()); 
                $('#applicantTypeSelected').html($(this).html());
                $('#applicantTypeRes').html($(this).html());

                $('#displayHead').html($(this).html());

                if ($('#applicantTypeSelected').html() == "Household Head - Mother") {

                    $('#pregnantOption1').prop('checked', true);
                    $('#pregnantOption2').prop('checked', false);
                    $('#pregnantDate').prop('readonly', false);

                } else {

                    $('#pregnantOption1').prop('checked', false);
                    $('#pregnantOption2').prop('checked', true);
                    $('#pregnantDate').prop('readonly', true);

                }

            }
            
        });

    });

    // options

    $(document).ready(function() {

        $('input[name=pregnantOption]').on('click', function(){

            if ($('input[name=pregnantOption]:checked').val() == "yes") {
                $('#pregnantDate').prop('readonly', false);
            } else {
                $('#pregnantDate').val("");
                $('#pregnantDate').prop('readonly', true);
            }
            
        });

    });

    // review

    $(document).ready(function() {
        
        $('#steps-uid-0-t-3').on('click', function() {
            
            $('#monthlyIncomeRes').html($('#monthlyIncome').val());
            $('#membersNumRes').html($('#membersNum').val());
            $('#pregnantDateRes').html($('#pregnantDate').val());
            $('#lastNameRes').html($('#lastName').val());
            $('#firstNameRes').html($('#firstName').val());
            $('#middleNameRes').html($('#middleName').val());
            $('#qualifierRes').html($('#qualifier').val());
            $('#genderRes').html($('#gender').val());
            $('#civilStatusRes').html($('#civilStatus').val());
            $('#birthDateRes').html($('#birthDate').val());
            $('#educationRes').html($('#education').val());
            $('#occupationRes').html($('#occupation').val());
            $('#contactNumRes').html($('#contactNum').val());
            $('#yearOfResidenceRes').html($('#yearOfResidence').val());
            $('#provinceRes').html($('#province').val());
            $('#cityRes').html($('#city').val());
            $('#barangayRes').html($('#barangay option:selected').text());
            $('#purokRes').html($('#purok').val());
            $('#houseNumRes').html($('#houseNum').val());
            $('#streetRes').html($('#street').val());
            $('#zipCodeRes').html($('#zipCode').val());
            $('#residenceTypeRes').html($('#residenceType').val());
            $('#houseDescRes').html($('#houseDesc').val());

            if ($('#monthlyIncome').val() == "10000 above") {
                $('#monthlyIncomeRes').addClass("text-danger");
            } else {
                $('#monthlyIncomeRes').removeClass("text-danger");
            }

        });

    });

    // validation
    
    var form = $("#applicantCreate");

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onFinished: function(event, currentIndex) {
            
            // set conditions

            if (($('#applicantTypeSelected').html() == "Select") || ($('#applicantTypeSelected').html() == "")) {

                toastr.error("Please select Type of Applicant");

            } else if ($('#monthlyIncome').val() == "") {

                toastr.error("Please enter monthly income");
                
            } else if ($('#membersNum').val() == "") {

                toastr.error("Please enter number of family members");
                
            } else if (($('input[name=pregnantOption]:checked').val() == "yes") && ($('#pregnantDate').val() == "")) {

                toastr.error("Please enter number of pregnants");
                
            } else if (!$('input[name=minorOption]:checked').val()) {

                toastr.error("Please answer if you have childeran aging 0 to 18 years old");
                
            } else if ($('#yearOfResidence').val() == "") {

                toastr.error("Please enter year of residence");
                
            } else if ($('#yearOfResidence').val() < 1900 || $('#yearOfResidence').val() > jDate.getFullYear()) {

                toastr.error("Year of Residency is invalid");
                $('#yearOfResidence').focus();
                
            } else if ($('#residenceType').val() == "") {

                toastr.error("Please select type of residence");
                
            } else if ($('#houseDesc').val() == "") {

                toastr.error("Please select house description");
                
            } else if ($('#lastName').val() == "") {

                toastr.error("Please enter lastname");
                
            } else if ($('#firstName').val() == "") {

                toastr.error("Please enter firstname");
                
            } else if ($('#gender').val() == "") {

                toastr.error("Please select gender");
                
            } else if ($('#civilStatus').val() == "") {

                toastr.error("Please select civil status");
                
            } else if ($('#birthDate').val() == "0000-00-00") {

                toastr.error("Please enter birth date");
                
            } else if ($('#education').val() == "") {

                toastr.error("Please select highest education attainment");
                
            } else if ($('#occupation').val() == "") {

                toastr.error("Please enter occupation");
                
            } else if ($('#province').val() == "") {

                toastr.error("Please enter province");
                
            } else if ($('#city').val() == "") {

                toastr.error("Please enter city");
                
            } else if ($('#barangay').val() == "") {

                toastr.error("Please enter barangay");
                
            } else {

                $("#applicantCreate").submit();

            }

        }
    });

})(jQuery);
