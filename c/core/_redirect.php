<?php  
    require '../../config/includes.php';
    require '_session.php';

    //redirects

    if (isset($_POST['user_search'])) {

        $user_search = clean_string($_POST['user_search']);

        if (empty($user_search)) {
            header("location: users?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: user_search?rand=" . my_rand_str(30) . "&searchText=" . $user_search);
        }

    }
?>