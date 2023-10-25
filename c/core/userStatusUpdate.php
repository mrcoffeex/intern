<?php  
    require '../../config/includes.php';
    require '_session.php';

    $userId = clean_int($_GET['userId']);

    if (isset($_POST['role'])) {

        $role = clean_string($_POST['role']);
        
        $request = updateUserStatus($userId, $role);

        if ($request == true) {

            header("location: users?note=updated");

        } else {
            
            header("location: users?note=error");

        }

    } else {

        header("location: users?note=invalid");

    }
    
?>