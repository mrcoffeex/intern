<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);
    $appId = clean_int($_GET['appId']);

    if (isset($_FILES['certificateImg'])) {
        
        $fileUpload = imageUpload('certificateImg', "../../filebank/");

        if ($fileUpload == "error") {
            header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=invalid_upload");
        } else {
            
            $request = updateCertificate($appId, $fileUpload);

            if ($request == true) {
                header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=uploaded");
            } else {
                header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=error");
            }

        }

    } else {
        header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=invalid");
    }
    
?>