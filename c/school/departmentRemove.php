<?php  
    require '../../config/includes.php';
    require '_session.php';

    $departmentId = clean_int($_GET['departmentId']);

    if (!empty($departmentId)) {

        $request = removeDepartment($departmentId);

        if ($request == true) {
            header("location: departments?note=removed");
        } else {
            header("location: departments?note=error");
        }

    } else {
        header("location: departments?note=invalid");
    }
    
    
?>