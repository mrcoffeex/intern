<?php  
    require '../../config/includes.php';
    require '_session.php';

    $userId = clean_int($_GET['userId']);
    $page = clean_string($_GET['page']);
    $searchText = clean_string($_GET['searchText']);

    if ($page == "users") {
        $pageRedirect = "users?rand=" . my_rand_str(30);
    } else {
        $pageRedirect = "user_search?rand=" . my_rand_str(30) . "&searchText=$searchText";
    }

    if (empty($userId)) {

        header("location: " . $pageRedirect . "&note=invalid");

    } else {
        
        $deleteData = removeUser($userId);

        if ($deleteData == true) {

            header("location: " . $pageRedirect . "&note=user_remove");

        } else {
            
            header("location: " . $pageRedirect . "&note=error");

        }

    }
    
?>