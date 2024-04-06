<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['departmentName'])) {
        
        $departmentName = clean_string($_POST['departmentName']);

        $request = createDepartment($departmentName, $schoolId);

        if ($request == true) {
            header("location: departments?note=added");
        } else {
            header("location: departments?note=error");
        }

    } else {
        header("location: departments?note=invalid");
    }
    
    
?>