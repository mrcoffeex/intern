<?php  
    require 'config/includes.php';

    $ucode = clean_string($_GET['ucode']);

    if (!empty($ucode)) {

        sendOTP($ucode, getUserEmail($ucode), "phpmailer/PHPMailerAutoload.php");
        header("location: verify?token=" . my_rand_str(30) . "&ucode=$ucode&note=sent");

    } else {
        
        header("location: verify?token=" . my_rand_str(30) . "&ucode=$ucode&note=invalid");

    }
    
?>