<?php  
    require '../../config/includes.php';
    require '_session.php';

    $page = clean_string($_GET['page']);
    $searchText = clean_string($_GET['searchText']);

    if ($page == "users") {
        $pageRedirect = "users?rand=" . my_rand_str(30);
    } else {
        $pageRedirect = "user_search?rand=" . my_rand_str(30) . "&searchText=$searchText";
    }

    if (isset($_POST['name'])) {
        
        $usercode = clean_string(date("YmdHis")."".my_randoms(8));
        $name = clean_string($_POST['name']);
        $email = clean_email($_POST['email']);

        if (strlen($email) > 50) {

            header("location: " . $pageRedirect . "&note=char_exceed");

        } else {

            $insertData = createUser($usercode, $name, $email, 0);

            if ($insertData == true) {
                header("location: " . $pageRedirect . "&note=user_added");
            }else{
                header("location: " . $pageRedirect . "&note=error");
            }
            
        }
    }
?>