<?php  
    require 'config/includes.php';

    if (isset($_POST['studentFname'])) {
        
        $studentFname = clean_string($_POST['studentFname']);
        $studentLname = clean_string($_POST['studentLname']);
        $studentEmail = clean_email($_POST['studentEmail']);
        $studentPassword = clean_string($_POST['studentPassword']);

        $userCode = date("YmdHis") . "" .my_rand_str(8);
        $encPassword = md5($studentPassword);

        if (checkUserEmail($studentEmail) == true) {
            
            $request = createUserStudent($userCode, $studentFname, $studentLname, $studentEmail, $encPassword);

            if ($request == true) {
                //send email OTP
                sendOTP($userCode, $studentEmail, "phpmailer/PHPMailerAutoload.php");
                createLog("new applicant", "user", "create");

                header("location: verify?token=" . my_rand_str(30) . "&ucode=$userCode");
            } else {
                header("location: student?note=error");
            }

        } else {
            header("location: student?note=duplicate_email");
        }

    } else {
        header("location: student?note=invalid");
    }
    
?>