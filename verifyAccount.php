<?php  
    require 'config/includes.php';

    $ucode = clean_string($_GET['ucode']);
    
    if (verifyUserCode($ucode) == false) {
        header("location: 404");
    }else{

        if (isset($_POST['otp'])) {
    
            $otp = clean_string($_POST['otp']);
    
            $request = verifyOTP($ucode, $otp);
    
            if ($request == true) {

                if (getUserType($ucode) == 3) {
                    createProfile($ucode);
                } else {
                    // nothing
                }
                
                header("location: verified?token=" . my_rand_str(30) . "&ucode=$ucode");
            } else {
                header("location: verify?token=" . my_rand_str(30) . "&ucode=$ucode&note=otp_fail");
            }
            
    
        } else {
            header("location: verify?note=invalid");
        }

    }

    
    
?>