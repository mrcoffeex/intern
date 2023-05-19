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
            } else if ($note == "suspended") {
                echo "
                    <script>
                        toastr.error('Either username or password is incorrect');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // users
        
        if ($currpage == "users" || $currpage == "user_search") {
            
            if ($note == "user_added") {
                echo "
                    <script>
                        toastr.success('User has been added');
                    </script>
                ";
            } else if ($note == "user_updated") {
                echo "
                    <script>
                        toastr.success('User has been updated');
                    </script>
                ";
            } else if ($note == "user_remove") {
                echo "
                    <script>
                        toastr.success('User has been removed');
                    </script>
                ";
            } else if ($note == "char_exceed") {
                echo "
                    <script>
                        toastr.error('Email must be NOT greater than 30 characters');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // verify
        
        if ($currpage == "verify") {
            
            if ($note == "otp_fail") {
                echo "
                    <script>
                        toastr.error('Verification code do not match');
                    </script>
                ";
            } else if ($note == "unverified") {
                echo "
                    <script>
                        toastr.error('Please verify your email first');
                    </script>
                ";
            } else if ($note == "sent") {
                echo "
                    <script>
                        toastr.success('Email sent');
                    </script>
                ";
            } else {
                echo "";
            }

        }

        // student
        
        if ($currpage == "student") {
            
            if ($note == "duplicate_email") {
                echo "
                    <script>
                        toastr.error('Duplicate email address');
                    </script>
                ";
            } else {
                echo "";
            }

        }
        
    }
?>