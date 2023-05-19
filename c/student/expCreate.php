<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['position'])) {

        $position = clean_string($_POST['position']);
        $company = clean_string($_POST['company']);
        $expFrom = clean_string($_POST['expFrom']);
        $expTo = clean_string($_POST['expTo']);
        $expCity = clean_string($_POST['expCity']);
        $jobDesc = clean_string($_POST['jobDesc']);

        $request = createExp($position, $company, $expFrom, $expTo, $expCity, $jobDesc, $userCode);
        
        if ($request == true) {
            header("location: profile?note=exp_add");
        }else{
            header("location: profile?note=error");
        }
        

    } else {
        header("location: profile?note=invalid");
    }
    
?>