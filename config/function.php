<?php

    function verifyPassword($entered, $stored){

        if (md5($entered) === $stored) {
            return true;
        } else {
            return false;
        }

    }

	function clean_string($value){

        include 'conf.php';
		
		if (empty($value)) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_SANITIZE_STRING)) {
                header($input_error."?note=not_real_string");
            } else {
                return $value;
            }
        }
        
	} 

    function clean_email($value){

        include 'conf.php';

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            header($input_error."?note=not_real_email");
        } else {
            return $value;
        }

    }

    function clean_int($value){

        if ($value == 0) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_VALIDATE_INT)) {
                header($input_error."?note=not_real_int");
            } else {
                return $value;
            }
        }        
    }

    function clean_float($value){

        if ($value == 0) {
            return $value;
        } else {
            if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                header($input_error."?note=not_real_float");
            } else {
                return $value;
            }
        }        
    }

    function checkfileCSV($file){

        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if ($ext == "csv") {
            $r_value = 1;
        }else{
            $r_value = 0;
        }

        return $r_value;
    }

	function getAge($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now - $value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        $months = $days / 30;

        $weeks = $days / 7;

        if ($days <= 6) {
            $finalset = $days;
            $age_ext = " days";
        } else if ($days <= 28) {
            $finalset = $weeks;
            $age_ext = " weeks";
        } else if ($days <= 364) {
            $finalset = $months;
            $age_ext = " months";
        } else {
            $finalset = $years;
            $age_ext = " yrs";
        }

        //result
        $result = floor($finalset)." ".$age_ext;

        return $result;
    }

	function getYears($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now - $value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        if ($days < 365) {
            $finalset = 1;
        } else {
            $finalset = $years;
        }

        //result
        $result = floor($finalset);

        return $result;
    }

	function getMonths($birthday){
        //values
        $date_now = strtotime(date("Y-m-d"));
        $value = strtotime($birthday);

        //subtract in seconds
        $date_diff = $date_now - $value;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        $months = $days / 30;

        if ($days < 30) {
            $finalset = 1;
        } else {
            $finalset = $months;
        }

        //result
        $result = floor($finalset);

        return $result;
    }

    function get_year_two_param($before, $later){
        //values
        $value_one = strtotime($later);
        $value_two = strtotime($before);

        //subtract in seconds
        $date_diff = $value_one-$value_two;
        //convert in days
        $days = $date_diff / 86400;
        //convert in years
        $years = $days / 365.25;

        //result
        $result = floor($years);

        return $result;
    }

    function getTimePassed($basetime, $currenttime){

        $secs = strtotime($currenttime) - strtotime($basetime);

        $mins = $secs / 60;
        $hours = $secs / 3600;
        $days = $secs / 86400;

        if ($secs < 60) {
            $res = "Just Now";
        } else if ($secs >= 60 && $secs < 3600) {
            $res = floor($mins) . " minute(s) ago";
        } else if ($secs >= 3600 && $secs < 86400) {
            $res = floor($hours) . " hour(s) ago";
        } else {
            if ($days < 7) {
                $res = floor($days) . " day(s) ago";
            } else if ($days >= 7 && $days < 30.5) {
                $res = floor($days / 7)." week(s) ago";
            } else if ($days >= 30.5 && $days < 365.25) {
                $res = floor(($days / 30.5))." month(s) ago";
            } else {
                $res = floor(($days / 365.25))." year(s) ago";
            }
        }
        
        return $res;
    }

    function getTimeDiff($basetime, $currenttime){

        $secs = strtotime($currenttime) - strtotime($basetime);

        $mins = $secs / 60;
        $hours = $secs / 3600;
        $days = $secs / 86400;

        if ($secs < 60) {
            $res = "Just Now";
        } else if ($secs >= 60 && $secs < 3600) {
            $res = floor($mins) . " minute(s)";
        } else if ($secs >= 3600 && $secs < 86400) {
            $res = floor($hours) . " hour(s)";
        } else {
            if ($days < 7) {
                $res = floor($days) . " day(s)";
            } else if ($days >= 7 && $days < 30.5) {
                $res = floor($days / 7)." week(s)";
            } else if ($days >= 30.5 && $days < 365.25) {
                $res = floor(($days / 30.5))." month(s)";
            } else {
                $res = floor(($days / 365.25))." year(s)";
            }
        }
        
        return $res;
    }

    function previewImage($image, $default_image, $directory){

        if (empty($image)) {
            $res = $default_image;
        }else{
            $res = $directory . "" . $image;
        }

        return $res;

    }

    function displayImage($image, $directory, $default){

        if (empty($image)) {
            $res = "../../images/" . $default;
        }else{

            //url validation
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                $res = $image;
            } else {
                $res = $directory . "" . $image;
            }

        }

        return $res;

    }

    function setActive($value){

        $currpage = str_replace('.php', '', basename($_SERVER['PHP_SELF']));

        if ($currpage == $value) {
            $res = "active";
        } else {
            $res = "";
        }
        
        return $res;
    }

    function createLog($note_text, $user, $type){

    	$my_notification_full = $note_text." - ".$user;
    	
    	//INSERT to database
    	$statement=dataLink()->prepare("INSERT Into notifications(
                                notif_type,
                                notif_text,
                                notif_created) 
                                Values(
                                    :mytype,
                                    :mynotification,
                                    NOW() )");
        $statement->execute([
            'mytype' => $type,
            'mynotification' => $my_notification_full
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function get_days($fromdate, $todate) {
        $fromdate = \DateTime::createFromFormat('Y-m-d', $fromdate);
        $todate = \DateTime::createFromFormat('Y-m-d', $todate);
        return new \DatePeriod(
            $fromdate,
            new \DateInterval('P1D'),
            $todate->modify('+1 day')
        );
    }

    function dataVerify($value, $alt){
        if (empty($value)) {
            $res = $alt;
        }else{
            $res = $value;
        }

        return $res;
    }

    function my_randoms( $length ) {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function my_rand_str( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }

    function my_rand_int( $length ) {
        $chars = "0123456789";   

        $str="";
        
        $size = strlen( $chars );
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }

        return $str;
    }
    
    function RealNumber($value, $decimal){

        if ($value == 0) {
            $res = number_format(0, $decimal);
        } else {
            if ($decimal == "") {
                $res = number_format($value);
            } else {
                $res = number_format($value, $decimal);
            }
        }
        
        return $res;
    }

    function toAlpha($number){
        
        $alphabet = array('N', 'S', 'T', 'A', 'R', 'G', 'O', 'L', 'D', 'E');

        $count = count($alphabet);
        if ($number == 10){
            $alpha = "SN";
        } else if ($number <= $count) {
            return $alphabet[$number - 0];
        }
        $alpha = '';
        while ($number > 0) {
            $modulo = ($number - 0) % $count;
            $alpha  = $alphabet[$modulo] . $alpha;
            $number = floor((($number - $modulo) / $count));
        }
        return $alpha;
    }

    function stringLimit($name, $limit){

        if (strlen($name) > $limit){
            $name = substr($name, 0, $limit) . '...';
        }else{
            $name = $name;
        }

        return $name;
    }

    function addS($string, $value){

        if ($value > 1) {
            $res = $string . "s";
        } else {
            $res = $string;
        }
        
        return $res;
    }

    function compare_update($old_data , $new_data , $type_data){
        if ($old_data != $new_data) {
            $my_data_res = $type_data.": ".$old_data." -> ".$new_data." , ";
        }else{
            $my_data_res = "";
        }

        return $my_data_res;
    }

    function proper_date($datetime){

        if ($datetime == "") {
            $res = "";
        }else{
            $res = date("Md Y", strtotime($datetime));
        }

        return $res;

    }

    function proper_time($datetime){

        if ($datetime == "") {
            $res = "";
        }else{
            $res = date("g:i A", strtotime($datetime));
        }

        return $res;

    }

    function get_date_status($date){

        $thisdate = date("Y-m-d");
        $thistomorrow = date("Y-m-d", strtotime("+1 day"));
        $thisyesterday = date("Y-m-d", strtotime("-1 day"));

        if (date("Y") == date("Y", strtotime($date))) {
            if ($date == $thisdate) {
                $res = "Today";
            }else if ($date == $thistomorrow) {
                $res = "Tomorrow";
            }else if ($date == $thisyesterday) {
                $res = "Yesterday";
            }else{
                $res = date("Md", strtotime($date));
            }
        }else{
            $res = date("Md Y", strtotime($date));
        }

        return $res;

    }
    
    function validateChecked($value, $checkboxValue){

        if ($checkboxValue == $value) {
            $res = "checked";
        } else {
            $res = "";
        }
        
        return $res;
    }

    function removeCharThatStarts($string, $char){

        $res = substr($string, 0, strpos($string, $char));

        if (empty($res)) {
            return $string;
        } else {
            return $res;
        }

    }
    
    function getFileExtension($path){

        $res = pathinfo($path, PATHINFO_EXTENSION);

        return $res;

    }

    function imageUpload($input, $location){

        $errors= array();
        $file_name = $_FILES[$input]['name'];

        if (empty($file_name)) {
            $res = "";
        } else {
            $file_size =$_FILES[$input]['size'];
            $file_tmp =$_FILES[$input]['tmp_name'];
            $file_type=$_FILES[$input]['type'];
            $file_extension = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);

            $final_filename = date("YmdHis")."_".$file_name;

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_extension, $extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 26000000){
                $errors[]='File size must be excately 25 MB';
            }

            $file_directory = $location."".$final_filename;

            if(empty($errors)==true){

                move_uploaded_file($file_tmp, $file_directory);
                $res = $final_filename;

            }else{

                if ($file_tmp == "") {
                    $res = "";
                }else{
                    $res = "error";
                }

            }
        }

        return $res;

    }

    // methods_system_logs

    function get_system_logs_skin($type){

        if ($type == "auth") {
            $res = "text-primary";
        }else if ($type == "insert") {
            $res = "text-success";
        }else if ($type == "delete") {
            $res = "text-warning";
        }else if ($type == "update") {
            $res = "text-info";
        }else if ($type == "attempt") {
            $res = "text-danger";
        }else{
            $res = "text-muted";
        }

        return $res;

    }

    function count_system_logs($date1, $date2){

        $statement=dataLink()->prepare("SELECT notif_id From notifications Where date(notif_created) BETWEEN :date1 AND :date2 ");
        $statement->execute([
            'date1' => $date1,
            'date2' => $date2
        ]);
        $countres=$statement->rowCount();

        return $countres;
    }

    function selectLogsToday(){

        $statement=dataLink()->prepare("SELECT notif_type,
                                        notif_created, 
                                        notif_text 
                                        From 
                                        notifications
                                        Order By 
                                        notif_id DESC LIMIT 50");
        $statement->execute();

        return $statement;

    }

    // users

    function selectUsers(){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        From 
                                        users
                                        Where
                                        user_uid != :user_uid
                                        Order By 
                                        user_fullname 
                                        ASC");
        $statement->execute([
            'user_uid' => 1
        ]);

        return $statement;
    }

    function countUsers(){

        $statement=dataLink()->prepare("SELECT user_uid From users 
                                        Where
                                        user_uid != :user_uid");
        $statement->execute([
            'user_uid' => 1
        ]);
        $count=$statement->rowCount();

        return $count;
    }

    function removeUser($userId){

        $statement=dataLink()->prepare("DELETE FROM
                                        users
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        }else{
            return false;
        }
    }

    function user_type($usertype){
        if ($usertype == 0) {
            $res = "dev";
        }else if ($usertype == 1) {
            $res = "user";
        }else{
            $res = "unknown";
        }
        return $res;
    }

    function createUserStudent($userCode, $fname, $lname, $uEmail, $uPassword){

        $statement=dataLink()->prepare("INSERT INTO 
                                        users
                                        (
                                            user_code,
                                            user_fname,
                                            user_lname,
                                            user_email,
                                            user_password,
                                            user_type,
                                            user_created,
                                            user_updated
                                        )
                                        Values
                                        (
                                            :user_code,
                                            :user_fname,
                                            :user_lname,
                                            :user_email,
                                            :user_password,
                                            :user_type,
                                            NOW(),
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode,
            'user_fname' => $fname,
            'user_lname' => $lname,
            'user_email' => $uEmail,
            'user_password' => $uPassword,
            'user_type' => 3
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function getUserEmail($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        user_email 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_email'];
        } else {
            return null;
        }

    }

    function checkUserEmail($email){

        $statement=dataLink()->prepare("SELECT 
                                        user_uid 
                                        FROM
                                        users
                                        Where
                                        user_email = :user_email");
        $statement->execute([
            'user_email' => $email
        ]);

        $count=$statement->rowCount();

        if (empty($count)) {
            return true;
        } else {
            return false;
        }

    }

    function getUserImg($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        user_profile_img 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_profile_img'];
        } else {
            return null;
        }

    }

    function verifyUserCode($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        user_uid 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $count=$statement->rowCount();

        if (!empty($count)) {
            return true;
        } else {
            return false;
        }

    }

    function checkUserVerification($userCode){

        $statement=dataLink()->prepare("SELECT
                                        user_verified
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if ($res['user_verified'] == 1) {
            return true;
        } else {
            return false;
        }

    }

    // school

    function getSchoolName($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        school_name
                                        FROM
                                        schools
                                        Where
                                        school_id = :school_id");
        $statement->execute([
            'school_id' => $schoolId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['school_name'];
        } else {
            return null;
        }

    }

    function getSchoolId($schoolName){

        $statement=dataLink()->prepare("SELECT
                                        school_id
                                        FROM
                                        schools
                                        Where
                                        school_name = :school_name");
        $statement->execute([
            'school_name' => $schoolName
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['school_id'];
        } else {
            return null;
        }

    }

    // profile

    function createProfile($userCode){

        $statement=dataLink()->prepare("INSERT INTO
                                        profiles
                                        (
                                            user_code, 
                                            profile_course, 
                                            school_id, 
                                            profile_country, 
                                            profile_address, 
                                            city_id, 
                                            profile_gender, 
                                            profile_contact, 
                                            profile_about_me, 
                                            profile_skills, 
                                            profile_created, 
                                            profile_updated
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :profile_course, 
                                            :school_id, 
                                            :profile_country, 
                                            :profile_address, 
                                            :city_id, 
                                            :profile_gender, 
                                            :profile_contact, 
                                            :profile_about_me, 
                                            :profile_skills, 
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'profile_course' => '', 
            'school_id' => 0, 
            'profile_country' => '', 
            'profile_address' => '', 
            'city_id' => 0, 
            'profile_gender' => '', 
            'profile_contact' => '', 
            'profile_about_me' => '', 
            'profile_skills' => ''
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function selectProfile($userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        profiles
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    function updateProfileIntro($profileImg, $fname, $lname, $course, $schoolId, $country, $userCode){

        if (empty($profileImg)) {
            $profileImg = getUserImg($userCode);
        } else {
            $profileImg = $profileImg;
        }
        
        $statement1=dataLink()->prepare("UPDATE
                                        profiles
                                        SET
                                        profile_course = :profile_course,
                                        school_id = :school_id,
                                        profile_country = :profile_country,
                                        profile_updated = NOW()
                                        Where
                                        user_code = :user_code");

        $statement2=dataLink()->prepare("UPDATE
                                        users
                                        SET
                                        user_fname = :user_fname,
                                        user_lname = :user_lname,
                                        user_profile_img = :user_profile_img,
                                        user_updated = NOW()
                                        Where
                                        user_code = :user_code");
        $statement1->execute([
            'profile_course' => $course,
            'school_id' => $schoolId,
            'profile_country' => $country,
            'user_code' => $userCode
        ]);

        $statement2->execute([
            'user_fname' => $fname,
            'user_lname' => $lname,
            'user_profile_img' => $profileImg,
            'user_code' => $userCode
        ]);

        if ($statement1 && $statement2) {
            return true;
        } else {
            return false;
        }

    }

    function updateProfilePersonal($address, $cityId, $gender, $contact, $userCode){
        
        $statement=dataLink()->prepare("UPDATE
                                        profiles
                                        SET
                                        profile_address = :profile_address,
                                        city_id = :city_id,
                                        profile_gender = :profile_gender,
                                        profile_contact = :profile_contact
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'profile_address' => $address,
            'city_id' => $cityId,
            'profile_gender' => $gender,
            'profile_contact' => $contact,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function updateAboutMe($aboutMe, $userCode){

        $statement=dataLink()->prepare("UPDATE
                                        profiles
                                        SET
                                        profile_about_me = :profile_about_me
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'profile_about_me' => $aboutMe,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function updateSkills($skills, $userCode){

        $statement=dataLink()->prepare("UPDATE
                                        profiles
                                        SET
                                        profile_skills = :profile_skills
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'profile_skills' => $skills,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function selectSkills($skill){

        $statement=dataLink()->prepare("SELECT
                                        skill_name
                                        FROM
                                        skills
                                        Where
                                        skill_name LIKE :skill_name
                                        Order By
                                        skill_name
                                        ASC
                                        LIMIT 10");
        $statement->execute([
            'skill_name' => "%$skill%"
        ]);

        return $statement;

    }

    function createExp($position, $company, $expFrom, $expTo, $expCity, $jobDesc, $userCode){

        $statement=dataLink()->prepare("INSERT INTO
                                        experiences
                                        (
                                            user_code, 
                                            exp_position, 
                                            exp_company, 
                                            exp_from, 
                                            exp_to, 
                                            exp_city, 
                                            exp_job_desc, 
                                            exp_created, 
                                            exp_updated
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :exp_position, 
                                            :exp_company, 
                                            :exp_from, 
                                            :exp_to, 
                                            :exp_city, 
                                            :exp_job_desc,
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'exp_position' => $position, 
            'exp_company' => $company, 
            'exp_from' => $expFrom, 
            'exp_to' => $expTo, 
            'exp_city' => $expCity, 
            'exp_job_desc' => $jobDesc,
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function removeExp($expId){

        $statement=dataLink()->prepare("DELETE
                                        FROM
                                        experiences
                                        Where
                                        exp_id = :exp_id");
        $statement->execute([
            'exp_id' => $expId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    // filters

    function createFilters($userCode){

        $statement=dataLink()->prepare("INSERT INTO
                                        filters
                                        (
                                            user_code, 
                                            filter_category, 
                                            filter_locations, 
                                            filter_fulltime, 
                                            filter_parttime, 
                                            filter_office_based, 
                                            filter_home_based, 
                                            filter_salary, 
                                            filter_updated
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :filter_category, 
                                            :filter_locations, 
                                            :filter_fulltime, 
                                            :filter_parttime, 
                                            :filter_office_based, 
                                            :filter_home_based, 
                                            :filter_salary, 
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'filter_category' => '', 
            'filter_locations' => 'Davao City,Cebu City,Manila,Quezon,Tarlac', 
            'filter_fulltime' => 'checked', 
            'filter_parttime' => '', 
            'filter_office_based' => 'checked', 
            'filter_home_based' => '', 
            'filter_salary' => '20000'
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function selectProfileFilters($userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        filters
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    // experience

    function selectStudentExp($userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        experiences
                                        Where
                                        user_code = :user_code
                                        Order By
                                        exp_from
                                        DESC");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    // course 

    function selectCourses(){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        courses
                                        Order By
                                        course_name
                                        ASC");
        $statement->execute();

        return $statement;

    }

    // city 

    function selectCities(){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        cities
                                        Order By
                                        city_name
                                        ASC");
        $statement->execute();

        return $statement;

    }

    function getCityName($cityId){

        $statement=dataLink()->prepare("SELECT
                                        city_name
                                        FROM
                                        cities
                                        Where
                                        city_id = :city_id");
        $statement->execute([
            'city_id' => $cityId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['city_name'];
        } else {
            return null;
        }

    }

    // smtp email
    function sendEmail($emailTo, $emailSubject, $emailMessage, $autoload){

        require $autoload;
    
        $mail = new PHPMailer;
        $mail->isSMTP();
        
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = "noreply@e4psmap.com";
        $mail->Password = "Semicircle_123";
        $mail->IsHTML(true);
        
        $mail->setFrom('noreply@e4psmap.com', 'InternBuilders');
        $mail->addAddress($emailTo, '');
        $mail->Subject = $emailSubject;
        
        $mail->Body = $emailMessage;
        
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }

    }

    // otp

    function createOTP($userCode){

        $randomNumber = my_rand_int(6);

        $statement=dataLink()->prepare("INSERT INTO 
                                        otps
                                        (
                                            otp_num, 
                                            user_code, 
                                            otp_status,
                                            otp_created
                                        ) 
                                        VALUES
                                        (
                                            :otp_num, 
                                            :user_code, 
                                            :otp_status,
                                            NOW()
                                        )");
        $statement->execute([
            'otp_num' => $randomNumber, 
            'user_code' => $userCode,
            'otp_status' => 0,
        ]);

        return $randomNumber;

    }

    function sendOTP($userCode, $emailTo, $autoload){

        $otp = createOTP($userCode);

        $subject = "Verification Code: " . $otp;
        $message = "<p>Here is you verification code:</p>";
        $message .= "<h4>" . $otp . "</h4>\n\n";
        $message .= "<p>If this request did not come from you, change your account password immediately to prevent further unauthorized access.</p>";
        $message .= "<p>This is a system generated email. Do not reply.</p>";

        $request = sendEmail($emailTo, $subject, $message, $autoload);

        if ($request == true) {
            return true;
        } else {
            return false;
        }

    }

    function updateOTPStatus($userCode, $otp){

        $statement=dataLink()->prepare("UPDATE 
                                        otps
                                        SET
                                        otp_status = :otp_status
                                        Where
                                        user_code = :user_code
                                        AND
                                        otp_num = :otp_num");
        $statement->execute([
            'otp_status' => 1,
            'user_code' => $userCode,
            'otp_num' => $otp
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }
    
    function verifyUser($userCode){

        $statement=dataLink()->prepare("UPDATE 
                                        users
                                        SET
                                        user_verified = :user_verified
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_verified' => 1,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function verifyOTP($userCode, $otp){

        $statement=dataLink()->prepare("SELECT 
                                        otp_id
                                        FROM
                                        otps
                                        Where
                                        user_code = :user_code
                                        AND
                                        otp_num = :otp_num
                                        AND
                                        otp_status = :otp_status");
        $statement->execute([
            'user_code' => $userCode,
            'otp_num' => $otp,
            'otp_status' => 0
        ]);

        $count=$statement->rowCount();

        if (!empty($count)) {

            updateOTPStatus($userCode, $otp);
            verifyUser($userCode);

            return true;
        } else {
            return false;
        }
        
    }
?>