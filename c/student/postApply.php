<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    $getPost=selectPostById($postId);
    $post=$getPost->fetch(PDO::FETCH_ASSOC);

    if (isset($_FILES['document'])) {
        
        $fileUpload = fileUpload('document', "../../filebank/");

        if ($fileUpload == "error") {
            header("location: post?toekn=" . my_rand_str(30) . "&postId=$postId&note=invalid_upload");
        } else {
            
            $request = createApplication($postId, $userCode, $post['user_code'], $fileUpload);

            if ($request == true) {
                header("location: post?toekn=" . my_rand_str(30) . "&postId=$postId&note=applied");
            } else {
                header("location: post?toekn=" . my_rand_str(30) . "&postId=$postId&note=error");
            }

        }

    } else {
        header("location: post?toekn=" . my_rand_str(30) . "&postId=$postId&note=invalid");
    }
    
?>