<?php  
    require '../../config/includes.php';
    require '_session.php';

    $appId = clean_int($_GET['appId']);
    $postId = clean_int($_GET['postId']);

    if (isset($_POST['addHours'])) {

        $addHours = clean_float($_POST['addHours']);
        $schoolHours = clean_float($_POST['schoolHours']);
        $tasks = clean_string($_POST['tasks']);

        $request = updateApplicantTasksHours($appId, $addHours, $schoolHours, $tasks);

        if ($request) {
            header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=updated");
        } else {
            header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=error");
        }

    } else {
        header("location: postView?token=" . my_rand_str(30) . "&postId=$postId&note=invalid");
    }
    
?>