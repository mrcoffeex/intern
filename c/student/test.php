<?php  
    require '../../config/includes.php';
    require '_session.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
</head>
<body>
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="countryInput">Country:</label>
                        <input type="text" id="countryInput" class="form-control" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>

    <script>

    $(document).ready(function() {
        $('#countryInput').on('input', function() {
            var input = $(this).val();

            // Send an AJAX request to fetch suggestions
            $.ajax({
                url: 'test_process.php',
                method: 'GET',
                data: {
                    term: input
                },
                success: function(response) {
                    var suggestions = JSON.parse(response);
                    $('#countryInput').autocomplete({
                    source: suggestions
                    });
                }
            });
        });
    });

    </script>
</body>
</html>