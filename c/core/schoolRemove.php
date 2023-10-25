<?php  
    require '../../config/includes.php';
    require '_session.php';

    $schoolId = clean_int($_GET['schoolId']);

    if (!empty($schoolId)) {

        $request = removeSchool($schoolId);

        if ($request == true) {
            header("location: schools?rand=".my_rand_str(30)."&note=removed");
        }else{
            header("location: schools?rand=".my_rand_str(30)."&note=error");
        }

    }else{

        header("location: schools?rand=".my_rand_str(30)."&note=invalid");

    }
    
?>