<?php  
    require '../../config/includes.php';
    require '_session.php';

    //redirects

    if (isset($_POST['user_search'])) {

        $user_search = clean_string($_POST['user_search']);

        if (empty($user_search)) {
            header("location: users?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: userSearch?rand=" . my_rand_str(30) . "&searchText=" . $user_search);
        }

    }

    if (isset($_POST['schoolSearch'])) {

        $schoolSearch = clean_string($_POST['schoolSearch']);

        if (empty($schoolSearch)) {
            header("location: schools?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: schoolSearch?rand=" . my_rand_str(30) . "&searchText=" . $schoolSearch);
        }

    }

    if (isset($_POST['bSearch'])) {

        $bSearch = clean_string($_POST['bSearch']);

        if (empty($bSearch)) {
            header("location: businesses?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: businessSearch?rand=" . my_rand_str(30) . "&searchText=" . $bSearch);
        }

    }

    if (isset($_POST['studentSearch'])) {

        $studentSearch = clean_string($_POST['studentSearch']);

        if (empty($studentSearch)) {
            header("location: students?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: studentSearch?rand=" . my_rand_str(30) . "&searchText=" . $studentSearch);
        }

    }
?>