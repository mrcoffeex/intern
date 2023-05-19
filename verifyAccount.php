<?php  
    require 'config/includes.php';

    $ucode = clean_string($_GET['ucode']);
    
    if (verifyUserCode($ucode) == false) {
        header("location: 404");
    }else{

        if (isset($_POST['first'])) {
        
            $first = clean_string($_POST['first']);
            $second = clean_string($_POST['second']);
            $third = clean_string($_POST['third']);
            $fourth = clean_string($_POST['fourth']);
            $fifth = clean_string($_POST['fifth']);
            $sixth = clean_string($_POST['sixth']);
    
            $otp = $first . $second . $third . $fourth . $fifth . $sixth;
    
            $request = verifyOTP($ucode, $otp);
    
            if ($request == true) {
                createProfile($ucode);
                createFilters($ucode);
                header("location: verified?token=" . my_rand_str(30) . "&ucode=$ucode");
            } else {
                header("location: verify?token=" . my_rand_str(30) . "&ucode=$ucode&note=otp_fail");
            }
            
    
        } else {
            header("location: student?note=invalid");
        }

    }

    
    
?>