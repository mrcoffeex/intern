<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['department'])) {
        
        $department = clean_int($_POST['department']);
        $course = clean_int($_POST['course']);

        $request = createSchoolCourse($schoolId, $department, $course);

        if ($request == true) {
            header("location: courses?note=added");
        } else {
            header("location: courses?note=error");
        }

    } else {
        header("location: courses?note=invalid");
    }
    
    
?>