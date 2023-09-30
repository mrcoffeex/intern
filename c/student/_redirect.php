<?php 

    require '../../config/includes.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['keywords'])) {

            $city = clean_int($_POST['city']) ?? 0;
            $type = clean_string($_POST['type']) ?? "";
            $based = clean_string($_POST['based']) ?? "";
            $salaryMinimum = clean_float($_POST['salaryMinimum'] ?? 0);
            $keywords = clean_string($_POST['keywords']);

            if (empty($keywords)) {
                header("location: ./?note=empty_search");
            } else {
                header("location: internships?city=$city&type=$type&based=$based&salaryMinimum=$salaryMinimum&keywords=$keywords");
            }
            
        }

    } else {
        http_response_code(400);
    }

?>