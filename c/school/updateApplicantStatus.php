<?php  
    require '../../config/includes.php';
    require '_session.php';
    
    $appId = clean_string($_GET['appId']);
	$postId = clean_int($_GET['postId']);

    $request = updateApplicantStatus("hired", $appId);

    if ($request == true) {
        header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=status_change");
    } else {
        header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=error");
    }
    
?>