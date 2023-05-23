<?php  
    require 'config/includes.php';

    if (isset($_POST['businessName'])) {
        
        $businessName = clean_string($_POST['businessName']);
        $city = clean_int($_POST['city']);
        $businessEmail = clean_email($_POST['businessEmail']);
        $businessPassword = clean_string($_POST['businessPassword']);

        $userCode = date("YmdHis") . "" .my_rand_str(8);
        $encPassword = md5($businessPassword);

        if (checkUserEmail($businessEmail) == true) {
            
            $request = createUserReg($userCode, $businessName, "", $businessEmail, $encPassword, 2);

            if ($request == true) {
                //send email OTP
                createBusinessProfile($userCode, getBusinessName($userCode), $city);
                sendOTP($userCode, $businessEmail, "phpmailer/PHPMailerAutoload.php");
                createLog("new business applicant", "user", "create");

                header("location: verify?token=" . my_rand_str(30) . "&ucode=$userCode");
            } else {
                header("location: business?note=error");
            }

        } else {
            header("location: business?note=duplicate_email");
        }

    } else {
        header("location: business?note=invalid");
    }
    
?>