<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['schoolYear'])) {
        
        $schoolYear = clean_string($_POST['schoolYear']);
        $semester = clean_string($_POST['semester']);

        $request = createSysem($schoolYear, $semester);

        if ($request == true) {
            header("location: sysem?note=added");
        } else {
            header("location: sysem?note=error");
        }

    } else {
        header("location: sysem?note=invalid");
    }
    
    
?>