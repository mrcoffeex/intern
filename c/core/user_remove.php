<?php  
    require '../../config/includes.php';
    require '_session.php';

    $userId = clean_int($_GET['userId']);

    if (empty($userId)) {

        header("location: users&note=invalid");

    } else {
        
        $deleteData = removeUser($userId);

        if ($deleteData == true) {

            header("location: users?note=removed");

        } else {
            
            header("location: users?note=error");

        }

    }
    
?>