<?php  
    require '../../config/includes.php';
    require '_session.php';

    //redirects

    if (isset($_POST['postSearch'])) {

        $postSearch = clean_string($_POST['postSearch']);

        if (empty($postSearch)) {
            header("location: posts?rand=" . my_rand_str(30) . "&note=empty_search");
        } else {
            header("location: postSearch?rand=" . my_rand_str(30) . "&searchText=" . $postSearch);
        }

    }
?>