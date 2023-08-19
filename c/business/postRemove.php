<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    $request = removePost($postId);

    if ($request == true) {
        header("location: posts?note=removed");
    } else {
        header("location: posts?note=error");
    }
    
?>