// internships

$(document).ready(function () {

    $('#salaryMinimum').change(function(){
        $('#salaryMinimumValue').html($('#salaryMinimum').val());
    });

    $('#city').select2({
        tags: true, // Allow user to add new options
        maximumSelectionLength: 5, // Set the maximum number of selected options
        placeholder: 'Select a City',
        maximumSelectionLength: 1,
    });

    //hide the radio buttons
    // $("#type1, #type2").hide();
    // $("#based1, #based2").hide();
    
    $('input[type="radio"][name="type"]').on('change', function() {
        if ($(this).is(':checked')) {
            if ($(this).val() == "Full-time") {
                $('#typelabel1').addClass('bg-white text-dark');
                $('#typelabel2').removeClass('bg-white text-dark');
            }else{
                $('#typelabel1').removeClass('bg-white text-dark');
                $('#typelabel2').addClass('bg-white text-dark');
            }
        }
    });

    $('input[type="radio"][name="based"]').on('change', function() {
        if ($(this).is(':checked')) {
            if ($(this).val() == "Office-based") {
                $('#basedlabel1').addClass('bg-white text-dark');
                $('#basedlabel2').removeClass('bg-white text-dark');
            }else{
                $('#basedlabel1').removeClass('bg-white text-dark');
                $('#basedlabel2').addClass('bg-white text-dark');
            }
        }
    });
});