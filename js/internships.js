// internships

$(document).ready(function () {

    $('#salaryMinimum').change(function(){
        $('#salaryMinimumValue').html($('#salaryMinimum').val());
    }); 

    $('#keywords').val("").focus().val($('#keywords').val());
    
});