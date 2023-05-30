<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['school'])) {

        $school = clean_int($_POST['school']);
        $position = clean_string($_POST['position']);

        $attachment1 = imageUpload('attachment1', "../../imagebank/");
        $attachment2 = imageUpload('attachment2', "../../imagebank/");

        if ($attachment1 == "error") {

            header("location: school?note=invalid_upload");

        } else if ($attachment2 == "error") {

            header("location: school?note=invalid_upload");

        } else {

            $request = createRequirements($userCode, $school, $position, $attachment1, $attachment2);

            if ($request) {
                header("location: schoolPending?note=submit");
            } else {
                header("location: school?note=error");
            }

        }

    } else {
        header("location: school?note=invalid");
    }
    
?>