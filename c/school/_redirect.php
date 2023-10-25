<?php  
    require '../../config/includes.php';
    require '_session.php';

    //redirects

    if (isset($_POST['studentSearch'])) {

        $studentSearch = clean_string($_POST['studentSearch']);

        if (empty($studentSearch)) {
            header("location: students?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: studentSearch?rand=" . my_rand_str(30) . "&searchText=" . $studentSearch);
        }

    }
?>