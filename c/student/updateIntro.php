<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['fname'])) {
        
        $profileImg = imageUpload("profileImg", "../../imagebank/");

        $fname = clean_string($_POST['fname']);
        $lname = clean_string($_POST['lname']);
        $course = clean_string($_POST['course']);
        $school = clean_string($_POST['school']);
        $country = clean_string($_POST['country']);

        $schoolId = getSchoolId($school);

        if ($profileImg == "error") {

            header("location: profile?note=invalid_upload");
				
		}else{

            $request = updateProfileIntro($profileImg, $fname, $lname, $course, $schoolId, $country, $userCode);
            
            if ($request == true) {
                header("location: profile?note=updated");
            }else{
                header("location: profile?note=error");
            }
        }
        

    } else {
        header("location: profile?note=invalid");
    }
    
?>