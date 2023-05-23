<?php  
    //put alerts here
    $currpage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

    $note = @$_GET['note'];

    if ($note == "error") {
        echo "
            <script>
                toastr.error('Error');
            </script>
        ";
    } else if ($note == "invalid") {
        echo "
            <script>
                toastr.error('Invalid');
            </script>
        ";
    } else if ($note == "empty_search") {
        echo "
            <script>
                toastr.error('Empty input is not allowed');
            </script>
        ";
    } else if ($note == "invalid_upload") {
        echo "
            <script>
                toastr.error('The file is not valid or exceeded the file size limit');
            </script>
        ";
    } else {

        // index

        if ($currpage == "index") {
            
            if ($note == "noexist") {
                echo "
                    <script>
                        toastr.error('Either username or password is incorrect');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // accountSettings

        if ($currpage == "accountSettings") {
            
            if ($note == "mismatch") {
                echo "
                    <script>
                        toastr.error('Current password do not match');
                    </script>
                ";
            } else if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // profile

        if ($currpage == "profile") {
            
            if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else if ($note == "exp_add") {
                echo "
                    <script>
                        toastr.success('Experience added');
                    </script>
                ";
            } else if ($note == "exp_remove") {
                echo "
                    <script>
                        toastr.success('Experience removed');
                    </script>
                ";
            } else {
                echo "";
            }

        }
        
    }
?>