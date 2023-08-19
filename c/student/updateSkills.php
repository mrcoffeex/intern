<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['skills'])) {

        $skills = $_POST['skills'];
        $skillsArray = implode(',', $skills);

        $request = updateSkills($skillsArray, $userCode);

        if ($request) {
            header("location: profile?note=updated");
        } else {
            header("location: profile?note=error");
        }

    } else {
        header("location: profile?note=invalid");
    }

    
?>