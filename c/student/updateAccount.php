<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['userEmail'])) {
        
        $userEmail = clean_email($_POST['userEmail']);
        $currentPassword = clean_string($_POST['currentPassword']);
        $newPassword = clean_string($_POST['newPassword']);

        if (empty($currentPassword) || empty($newPassword)) {

            //proceed
            $request = updateUserAccount($userEmail, $row['user_password'], $userId);
    
            if ($request == true) {
                header("location: accountSettings?note=updated");
            } else {
                header("location: accountSettings?note=error");
            }

        } else {
            if (md5($currentPassword) == $row['user_password']) {

                //proceed
                $request = updateUserAccount($userEmail, md5($newPassword), $userId);
    
                if ($request == true) {
                    header("location: accountSettings?note=updated");
                } else {
                    header("location: accountSettings?note=error");
                }
    
            } else {
                header("location: accountSettings?note=mismatch");
            }
        }

    } else {
        header("location: accountSettings?note=invalid");
    }
    
?>