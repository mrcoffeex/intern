<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['fname'])) {
        
        $usercode = clean_string(date("YmdHis")."".my_randoms(8));
        $fname = clean_string($_POST['fname']);
        $lname = clean_string($_POST['lname']);
        $email = clean_email($_POST['email']);
        $password = clean_string(md5("12345678"));

        if (strlen($email) > 50) {

            header("location: users?note=char_exceed");

        } else {

            $insertData = createUser($usercode, $fname, $lname, $email, $password, 0);

            if ($insertData == true) {
                header("location: users?note=added");
            }else{
                header("location: users?note=error");
            }
            
        }
    }
?>