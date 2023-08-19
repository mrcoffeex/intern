<?php  
    require 'config/includes.php';

    if (isset($_POST['schoolFname'])) {
        
        $schoolFname = clean_string($_POST['schoolFname']);
        $schoolLname = clean_string($_POST['schoolLname']);
        $schoolEmail = clean_email($_POST['schoolEmail']);
        $schoolPassword = clean_string($_POST['schoolPassword']);

        $userCode = date("YmdHis") . "" .my_rand_str(8);
        $encPassword = md5($schoolPassword);

        if (checkUserEmail($schoolEmail) == true) {
            
            $request = createUserReg($userCode, $schoolFname, $schoolLname, $schoolEmail, $encPassword, 1);

            if ($request == true) {
                //send email OTP
                sendOTP($userCode, $schoolEmail, "phpmailer/PHPMailerAutoload.php");
                createLog("new school applicant", "user", "create");

                header("location: verify?token=" . my_rand_str(30) . "&ucode=$userCode");
            } else {
                header("location: school?note=error");
            }

        } else {
            header("location: school?note=duplicate_email");
        }

    } else {
        header("location: school?note=invalid");
    }
    
?>