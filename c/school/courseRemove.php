<?php  
    require '../../config/includes.php';
    require '_session.php';

    $schoolCourseId = clean_int($_GET['schoolCourseId']);

    if (!empty($schoolCourseId)) {

        $request = removeSchoolCourse($schoolCourseId);

        if ($request == true) {
            header("location: courses?note=removed");
        } else {
            header("location: courses?note=error");
        }

    } else {
        header("location: courses?note=invalid");
    }
    
    
?>