// business profile

$(document).ready(function () {

    if ($("#intro").length) {
        tinymce.init({
            selector: '#intro',
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
                    $('#introPreview').html(editor.getContent());
                });
            }
        });
    }

    $('#introPreview').html($('#intro').val());
});