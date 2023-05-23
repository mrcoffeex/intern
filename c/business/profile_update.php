<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['userFullname'])) {

        $userFullname = clean_string($_POST['userFullname']);
        $userEmail = clean_email($_POST['userEmail']);

        if (empty($_POST['userPassword'])) {
            $userPassword = $row['e4ps_user_password'];
        } else {
            $userPassword = clean_string(md5($_POST['userPassword']));
        }

        $request = updateUserProfile($userFullname, $userEmail, $userPassword, $e4ps_user_id);

        if ($request == true) {
            header("location: profile?rand=".my_rand_str(30)."&note=profile_updated");
        }else{
            header("location: profile?rand=".my_rand_str(30)."&note=error");
        }

    }else{

        header("location: profile?rand=".my_rand_str(30)."&note=invalid");

    }
    
?>