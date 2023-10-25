<?php  
    require '../../config/includes.php';
    require '_session.php';

    $schoolId = clean_int($_GET['schoolId']);

    if (isset($_POST['schoolName'])) {

        $schoolName = clean_string($_POST['schoolName']);
        $city = clean_string($_POST['city']);

        $request = updateSchool($schoolName, $city, $schoolId);

        if ($request == true) {
            header("location: schools?rand=".my_rand_str(30)."&note=updated");
        }else{
            header("location: schools?rand=".my_rand_str(30)."&note=error");
        }

    }else{

        header("location: schools?rand=".my_rand_str(30)."&note=invalid");

    }
    
?>