<?php  
    require '../../config/includes.php';
    require '_session.php';

    $page = clean_string($_GET['page']);
    $searchText = clean_string($_GET['searchText']);
    $userId = clean_int($_GET['userId']);

    if ($page == "users") {
        $pageRedirect = "users?rand=" . my_rand_str(30);
    } else {
        $pageRedirect = "user_search?rand=" . my_rand_str(30) . "&searchText=$searchText";
    }

    if (!empty($userId)) {

        $request = changeUserStatus($userId);

        if ($request == true) {
            header("location: " . $pageRedirect . "&note=changestat");
        }else{
            header("location: " . $pageRedirect . "&note=error");
        }

    }else{
        header("location: " . $pageRedirect . "&note=invalid");
    }
?>