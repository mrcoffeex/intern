// post form

$(document).ready(function () {

    var category = $('#category');
    var categoryPreview = $('#categoryPreview');

    category.on('change', function () {
        
        categoryPreview.html(category.val());

    });

    var location = $('#location');
    var locationPreview = $('#locationPreview');

    location.on('change', function () {
        
        locationPreview.html('<i class="ti-location-pin"></i>' + $('#location option:selected').text());

    });

    var salary_from = $('#salary_from');
    var salary_to = $('#salary_to');
    var salaryPreview = $('#salaryPreview');

    salaryPreview.html('<span class="text-dark">Salary Range: </span>' + salary_from.val() + ' - ' + salary_to.val());

    salary_from.on('keyup', function () {
        
        salaryPreview.html('<span class="text-dark">Salary Range: </span>' + salary_from.val() + ' - ' + salary_to.val());

    });

    salary_to.on('keyup', function () {
        
        salaryPreview.html('<span class="text-dark">Salary Range: </span>' + salary_from.val() + ' - ' + salary_to.val());

    });

    var type = $('#type');
    var based = $('#based');
    var typeBasedPreview = $('#typeBasedPreview');

    typeBasedPreview.html(type.val() + ' | ' + based.val());

    type.on('change', function () {
        
        typeBasedPreview.html(type.val() + ' | ' + based.val());

    });

    based.on('change', function () {
        
        typeBasedPreview.html(type.val() + ' | ' + based.val());

    });

    var title = $('#title');
    var titlePreview = $('#titlePreview');

    title.on('keyup', function () {
        
        titlePreview.html(title.val());

    });

    if ($("#description").length) {
        tinymce.init({
            selector: '#description',
            height: 500,
            theme: 'silver',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
            image_advtab: true,
            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
                },
                {
                title: 'Test template 2',
                content: 'Test 2'
                }
            ],
            content_css: [],
            setup: function(editor) {

                editor.on('keyup', function() {
                    // Event handler code
                    $('#descriptionPreview').html(editor.getContent());
                });
            }
        });
    }

    $('#descriptionPreview').html($('#description').val());

});