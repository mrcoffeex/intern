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

    if (isset($_POST['name'])) {
        $name = clean_string($_POST['name']);
        $email = clean_email($_POST['email']);
        $role = clean_int($_POST['role']);
        $inputPassword = clean_string($_POST['userPassword']);

        if (empty($inputPassword)) {
            $userPassword = getUserPassword($userId);
        } else {
            $userPassword = md5($inputPassword);
        }

        if (strlen($email) > 50) {

            header("location: " . $pageRedirect . "&note=char_exceed");

        } else if (strlen($inputPassword) > 16) {

            header("location: " . $pageRedirect . "&note=char_exceed");

        } else {
        
            $updateData = updateUser($name, $email, $role, $userPassword, $userId);

            if ($updateData == true) {
                header("location: " . $pageRedirect . "&note=user_updated");
            }else{
                header("location: " . $pageRedirect . "&note=error");
            }
        }
    }
?>