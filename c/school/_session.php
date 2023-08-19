<?php 

	session_start([
        'cookie_lifetime' => 86400,
    ]);

	if(!isset($_SESSION['hotkopi_session_id'])){
        header("location: ../../");
    }else if ($_SESSION['hotkopi_session_type'] != 1) {
        header("location: ../../");
    }

    $user_id = $_SESSION['hotkopi_session_id'];
    $user_type = $_SESSION['hotkopi_session_type'];

    //find user
    $getuser=datalink()->prepare("SELECT 
                                *
                                From 
                                users 
                                Where 
                                user_uid = :session_user_id");
    $getuser->execute([
        'session_user_id' => $user_id
    ]);
    $row=$getuser->fetch(PDO::FETCH_ASSOC);

    //user
    $userFullname = $row['user_fname'] . $row['user_lname'];
    $userEmail = $row['user_email'];
    $userId = $row['user_uid'];
    $userCode = $row['user_code'];
    $userProfileImg = $row['user_profile_img'];
    $schoolId = $row['school_id'];

    if (empty($schoolId)) {
        $schoolName = "( no school )";
    } else {
        $schoolName = getSchoolName($schoolId);
    }
    

    //dates
    $datenow = date("Y-m-d H:i:s");
    $onlydate = date("Y-m-d");

?>