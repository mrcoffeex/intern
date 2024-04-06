<?php  
    require '../../config/includes.php';
    require '_session.php';

    $schoolCourseId = clean_int($_GET['schoolCourseId']);

    if (isset($_POST['department'])) {
        
        $department = clean_int($_POST['department']);
        $course = clean_int($_POST['course']);

        $request = updateSchoolCourse($department, $course, $schoolCourseId);

        if ($request == true) {
            header("location: courses?note=updated");
        } else {
            header("location: courses?note=error");
        }

    } else {
        header("location: courses?note=invalid");
    }
    
    
?>