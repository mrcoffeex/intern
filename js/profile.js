// intro

$(document).ready(function () {

    var fnameInput = $('#fname');
    var fnameHelpText = $('#fnameHelpText');

    var lnameInput = $('#lname');
    var lnameHelpText = $('#lnameHelpText');

    var updateIntroBtn = $('#updateIntroBtn');

    fnameInput.on('input', function() {
        var minLength = 2;
        var maxLength = 40;

        if (fnameInput.val().length < minLength) {
            updateIntroBtn.prop("disabled", true);
            fnameHelpText.text("Firstname must be at least " + minLength + " characters long.");
            fnameHelpText.css("color", "red");
        } else if (fnameInput.val().length > maxLength) {
            updateIntroBtn.prop("disabled", true);
            fnameHelpText.text("Firstname cannot exceed " + maxLength + " characters.");
            fnameHelpText.css("color", "red");
        } else {
            updateIntroBtn.prop("disabled", false);
            fnameHelpText.text("");
        }
    });

    lnameInput.on('input', function() {
        var minLength = 2;
        var maxLength = 30;

        if (lnameInput.val().length < minLength) {
            updateIntroBtn.prop("disabled", true);
            lnameHelpText.text("Lastname must be at least " + minLength + " characters long.");
            lnameHelpText.css("color", "red");
        } else if (lnameInput.val().length > maxLength) {
            updateIntroBtn.prop("disabled", true);
            lnameHelpText.text("Lastname cannot exceed " + maxLength + " characters.");
            lnameHelpText.css("color", "red");
        } else {
            updateIntroBtn.prop("disabled", false);
            lnameHelpText.text("");
        }
    });

    var timer;
    
    $("#course").keyup(function(){
        clearTimeout(timer);
        var ms = 200;
        $.get("autoCourses.php", {search: $(this).val()}, function(data){
            timer = setTimeout(function() {
                $("#myCourses").empty();
                $("#myCourses").html(data);
            }, ms);
        });
    });

    $("#school").keyup(function(){
        clearTimeout(timer);
        var ms = 200;
        $.get("autoSchools.php", {search: $(this).val()}, function(data){
            timer = setTimeout(function() {
                $("#mySchools").empty();
                $("#mySchools").html(data);
            }, ms);
        });
    });

    $("#country").keyup(function(){
        clearTimeout(timer);
        var ms = 200;
        $.get("autoCountries.php", {search: $(this).val()}, function(data){
            timer = setTimeout(function() {
                $("#myCountries").empty();
                $("#myCountries").html(data);
            }, ms);
        });
    });

    $("#position").keyup(function(){
        clearTimeout(timer);
        var ms = 200;
        $.get("autoPositions.php", {search: $(this).val()}, function(data){
            timer = setTimeout(function() {
                $("#myPositions").empty();
                $("#myPositions").html(data);
            }, ms);
        });
    });

    $("#company").keyup(function(){
        clearTimeout(timer);
        var ms = 200;
        $.get("autoCompanies.php", {search: $(this).val()}, function(data){
            timer = setTimeout(function() {
                $("#myCompanies").empty();
                $("#myCompanies").html(data);
            }, ms);
        });
    });
  
    $('#aboutMe').on('input', function() {
        
        var aboutMeHelpText = $('#aboutMeHelpText');
        var aboutMe = $('#aboutMe').val();
        var charCount = aboutMe.length;

        aboutMeHelpText.text('');
        $('#aboutMeCharCount').text(charCount + '/255');

        clearTimeout(timer);
        
        timer = setTimeout(function() {
            $.ajax({
                url: 'autoUpdateAboutMe.php',
                method: 'POST',
                data: { aboutMe: aboutMe },
                success: function(response) {
                    aboutMeHelpText.text('Changes saved');
                    aboutMeHelpText.css("color", "green");
                },
                error: function(xhr, status, error) {
                    aboutMeHelpText.text('Error updating data :' + error);
                    aboutMeHelpText.css("color", "red");
                }
            });
        }, 1000);
    });

    //tagify
    var locations = document.getElementById('locations');
    var locationsTag = new Tagify(locations);
    var skills = document.getElementById('skills');
    var skillsTag = new Tagify(skills);
  
    $('#skillsBtn').click(function() {
            
        $(this).text("Updating skills ...");
        $(this).prop("disabled", true);
        
        var skillsHelpText = $('#skillsHelpText');
        skillsHelpText.text('');

        clearTimeout(timer);
        
        timer = setTimeout(function() {

            var tags = skillsTag.value.reduce(function(result, tag) {
                return result.concat(tag.value);
            }, []);
            var stringTags = tags.join(', ');

            console.log(stringTags);

            $.ajax({
                url: 'autoUpdateSkills.php',
                method: 'POST',
                data: { skills: stringTags },
                success: function(response) {
                    skillsHelpText.text('Changes saved');
                    skillsHelpText.css("color", "green");
                    $('#skillsBtn').text("Update Skills");
                    $('#skillsBtn').prop("disabled", false);
                },
                error: function(xhr, status, error) {
                    skillsHelpText.text('Error updating data :' + error);
                    skillsHelpText.css("color", "red");
                    $('#skillsBtn').text("Update Skills");
                    $('#skillsBtn').prop("disabled", false);
                }
            });
            
        }, 1000);
    });

    $('#salaryMinimum').change(function(){
        $('#salaryMinimumValue').html($('#salaryMinimum').val());
    });
        
});