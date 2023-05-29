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

        //postView

        if ($currpage == "postView") {
            
            if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else if ($note == "status_change") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else if ($note == "uploaded") {
                echo "
                    <script>
                        toastr.success('Certficate has been uploaded');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // posts

        if ($currpage == "posts") {
            
            if ($note == "status_change") {
                echo "
                    <script>
                        toastr.success('Status changed');
                    </script>
                ";
            } else if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else if ($note == "removed") {
                echo "
                    <script>
                        toastr.success('Post has been removed');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // postCreateForm

        if ($currpage == "postCreateForm") {
            
            if ($note == "posted") {
                echo "
                    <script>
                        toastr.success('Job Posted');
                    </script>
                ";
            } else if ($note == "removed") {
                echo "
                    <script>
                        toastr.success('Post has been removed');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // postEdit

        if ($currpage == "postEdit") {
            
            if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // business me

        if ($currpage == "me") {
            
            if ($note == "updated") {
                echo "
                    <script>
                        toastr.success('Changes saved');
                    </script>
                ";
            } else {
                echo "";
            }

        }
        
    }
?>