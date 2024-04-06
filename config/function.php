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

        include 'conf.php';

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

        include 'conf.php';

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

    function previewImage($image, $default, $directory){

        if (empty($image)) {
            $res = $default;
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

            $extensions= array("jpeg","jpg","png","jfif");

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

    function fileUpload($input, $location){

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

            $extensions= array("pdf","doc","docx");

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

    function getUserStatus($userStatus){

        if ($userStatus == 0) {
            $res = "Active";
        } else {
            $res = "Suspended";
        }
        
        return $res;
    }

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

    function countUsersBySearch($searchText){

        $statement=dataLink()->prepare("SELECT user_uid From users 
                                    Where
                                    user_uid != :user_uid AND 
                                    CONCAT(
                                        user_fname, 
                                        user_lname,
                                        user_email
                                    ) LIKE :search_text");
        $statement->execute([
            'user_uid' => 1,
            'search_text' => "%$searchText%"
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
            $res = "Admin";
        }else if ($usertype == 1) {
            $res = "School";
        }else if ($usertype == 2) {
            $res = "Business";
        }else if ($usertype == 3) {
            $res = "Student";
        }else{
            $res = "unknown";
        }
        return $res;
    }

    function createUser($userCode, $fname, $lname, $userEmail, $userPassword, $userType){

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
            'user_email' => $userEmail,
            'user_password' => $userPassword,
            'user_type' => $userType
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function createUserReg($userCode, $fname, $lname, $uEmail, $uPassword, $userType){

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
            'user_type' => $userType
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function updateUserStatus($userId, $role){

        $statement=dataLink()->prepare("UPDATE
                                        users
                                        SET
                                        user_status = :user_status
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_status' => $role,
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function updateUserAccount($userEmail, $userPassword, $userId){

        $statement=dataLink()->prepare("UPDATE
                                        users
                                        SET
                                        user_email = :user_email,
                                        user_password = :user_password,
                                        user_updated = NOW()
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_email' => $userEmail,
            'user_password' => $userPassword,
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function updateUserAccountImg($userEmail, $userPassword, $profileImg, $userId){

        $statement=dataLink()->prepare("UPDATE
                                        users
                                        SET
                                        user_email = :user_email,
                                        user_password = :user_password,
                                        user_profile_img = :user_profile_img,
                                        user_updated = NOW()
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_email' => $userEmail,
            'user_password' => $userPassword,
            'user_profile_img' => $profileImg,
            'user_uid' => $userId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function updateUserFirstname($fname, $userCode){

        $statement=dataLink()->prepare("UPDATE
                                        users
                                        SET
                                        user_fname = :user_fname
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_fname' => $fname,
            'user_code' => $userCode
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
    
    }

    function getUserFullname($userId){

        $statement=dataLink()->prepare("SELECT 
                                        user_fname,
                                        user_lname 
                                        FROM
                                        users
                                        Where
                                        user_uid = :user_uid");
        $statement->execute([
            'user_uid' => $userId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_fname'] . " " . $res['user_lname'];
        } else {
            return null;
        }

    }

    function getUserFullnameByCode($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        user_fname,
                                        user_lname 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_fname'] . " " . $res['user_lname'];
        } else {
            return null;
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

    function getUserType($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        user_type 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_type'];
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

    function countSchools(){

        $statement=dataLink()->prepare("SELECT
                                        school_id
                                        FROM
                                        schools");
        $statement->execute();

        $count=$statement->rowCount();

        return $count;

    }

    function selectSchools(){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        schools
                                        Order By
                                        school_name
                                        ASC");
        $statement->execute();

        return $statement;

    }

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

    function removeSchool($schoolId){

        $statement=dataLink()->prepare("DELETE
                                        FROM
                                        schools
                                        Where
                                        school_id = :school_id");
        $statement->execute([
            'school_id' => $schoolId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function updateSchool($schoolName, $cityId, $schoolId){

        $statement=dataLink()->prepare("UPDATE
                                        schools
                                        SET
                                        school_name = :school_name,
                                        city_id = :city_id
                                        Where
                                        school_id = :school_id");
        $statement->execute([
            'school_name' => $schoolName,
            'city_id' => $cityId,
            'school_id' => $schoolId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function selectSysem(){

        $statement=dataLink()->prepare("SELECT * From sysem
                                        Order By
                                        sysem_text
                                        DESC");
        $statement->execute();

        return $statement;
        

    }

    function createSysem($schoolYear, $semester){

        $sysem = $schoolYear . "-" . $semester;

        $statement=dataLink()->prepare("INSERT INTO sysem
                                    (
                                        sysem_text, 
                                        sysem_created
                                    ) 
                                    VALUES
                                    (
                                        :sysem_text, 
                                        NOW()
                                    )");
        $statement->execute([
            'sysem_text' => $sysem
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function removeSysem($sysemId){

        $statement=dataLink()->prepare("DELETE FROM sysem
                                        Where
                                        sysem_id = :sysem_id");
        $statement->execute([
            'sysem_id' => $sysemId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
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

    function countProfiles(){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        profiles");
        $statement->execute();

        $count=$statement->rowCount();

        return $count;

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

    function selectSkills(){

        $statement=dataLink()->prepare("SELECT
                                        skill_name
                                        FROM
                                        skills
                                        Order By
                                        skill_name
                                        ASC");
        $statement->execute();

        return $statement;

    }

    // experiences

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

    function createSchoolCourse($schoolId, $departmentId, $courseId){

        $statement=dataLink()->prepare("INSERT INTO school_courses
                                        (
                                            school_id, 
                                            department_id, 
                                            course_id, 
                                            school_course_created
                                        ) 
                                        VALUES
                                        (
                                            :school_id, 
                                            :department_id, 
                                            :course_id, 
                                            NOW()
                                        )");
        $statement->execute([
            'school_id' => $schoolId,
            'department_id' => $departmentId,
            'course_id' => $courseId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function updateSchoolCourse($departmentId, $courseId, $schoolCourseId){

        $statement=dataLink()->prepare("UPDATE school_courses SET
                                        department_id = :department_id,
                                        course_id = :course_id
                                        Where
                                        school_course_id = :school_course_id");
        $statement->execute([
            'department_id' => $departmentId,
            'course_id' => $courseId,
            'school_course_id' => $schoolCourseId
            
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function removeSchoolCourse($schoolCourseId){

        $statement=dataLink()->prepare("DELETE FROM school_courses
                                        Where
                                        school_course_id = :school_course_id");
        $statement->execute([
            'school_course_id' => $schoolCourseId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function getCourseName($courseId){

        $statement=dataLink()->prepare("SELECT
                                        course_name
                                        FROM
                                        courses
                                        Where
                                        course_id = :course_id");
        $statement->execute([
            'course_id' => $courseId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['course_name'];
        } else {
            return "unknown";
        }

    }

    // department 

    function selectDepartment($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        departments
                                        Where
                                        school_id = :school_id
                                        Order By
                                        department_name
                                        ASC");
        $statement->execute([
            'school_id' => $schoolId
        ]);

        return $statement;

    }

    function createDepartment($departmentName, $schoolId){

        $statement=dataLink()->prepare("INSERT INTO departments
                                        (
                                            school_id, 
                                            department_name
                                        ) 
                                        VALUES
                                        (
                                            :school_id, 
                                            :department_name
                                        )");
        $statement->execute([
            'school_id' => $schoolId,
            'department_name' => $departmentName
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function getDepartmentName($departmentId){

        $statement=dataLink()->prepare("SELECT
                                        department_name
                                        FROM
                                        departments
                                        Where
                                        department_id = :department_id");
        $statement->execute([
            'department_id' => $departmentId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['department_name'];
        } else {
            return "unknown";
        }

    }

    function removeDepartment($departmentId){

        $statement=dataLink()->prepare("DELETE FROM departments
                                        Where
                                        department_id = :department_id");
        $statement->execute([
            'department_id' => $departmentId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
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
    function sendEmail($emailTo, $emailSubject, $emailBodyTitle, $emailBodyMessage, $autoload){

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
        
        $mail->Body = '

        <!DOCTYPE>
        <html style="padding:0;Margin:0">
        <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="x-apple-disable-message-reformatting">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="telephone=no" name="format-detection">
        <title>InternBuilders Email</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i" rel="stylesheet">
        <style type="text/css">
        #outlook a {
        padding:0;
        }
        .ExternalClass {
        width:100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
        line-height:100%;
        }
        .es-button {
        mso-style-priority:100!important;
        text-decoration:none!important;
        }
        a[x-apple-data-detectors] {
        color:inherit!important;
        text-decoration:none!important;
        font-size:inherit!important;
        font-family:inherit!important;
        font-weight:inherit!important;
        line-height:inherit!important;
        }
        .es-desk-hidden {
        display:none;
        float:left;
        overflow:hidden;
        width:0;
        max-height:0;
        line-height:0;
        mso-hide:all;
        }
        @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:30px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:20px!important; display:block!important; padding:15px 25px 15px 25px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
        </style>
        </head>
        <body style="width:100%;font-family:lato,  helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
        <div class="es-wrapper-color" style="background-color:#F4F4F4">
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#F4F4F4">
        <tr class="gmail-fix" height="0" style="border-collapse:collapse">
        <td style="padding:0;Margin:0">
        <table cellspacing="0" cellpadding="0" border="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:600px">
        <tr style="border-collapse:collapse">
        <td cellpadding="0" cellspacing="0" border="0" style="padding:0;Margin:0;line-height:1px;min-width:600px" height="0"><img src="https://sdxesn.stripocdn.email/content/guids/CABINET_837dc1d79e3a5eca5eb1609bfe9fd374/images/41521605538834349.png" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;max-height:0px;min-height:0px;min-width:600px;width:600px" alt width="600" height="1"></td>
        </tr>
        </table></td>
        </tr>
        <tr style="border-collapse:collapse">
        <td valign="top" style="padding:0;Margin:0">
        <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
        <tr style="border-collapse:collapse">
        <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px">
        <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;width:282px">
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td class="es-infoblock es-m-txt-c" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px">InternBuilders<br></p></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;width:278px">
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td align="right" class="es-infoblock es-m-txt-c" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato,  helvetica, arial, sans-serif;line-height:14px;color:#CCCCCC;font-size:12px"><a href="https://internbuilders.online/" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#CCCCCC;font-size:12px;font-family:arial,  helvetica, sans-serif">Visit Website</a></p></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#00A5EC;background-repeat:repeat;background-position:center top">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-header-body" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
        <tr style="border-collapse:collapse">
        <td align="left" style="Margin:0;padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:580px">
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:25px;padding-bottom:25px;font-size:0">
            <img src="" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="40">
        </td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td style="padding:0;Margin:0;background-color:#00A5EC" bgcolor="#00A5EC" align="center">
        <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
        <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#ffffff;border-radius:4px" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation">
        <tr style="border-collapse:collapse">
        <td align="center" style="Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px"><h1 style="Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato,  helvetica, arial, sans-serif;font-size:48px;font-style:normal;font-weight:normal;color:#111111">' . $emailBodyTitle . '</h1></td>
        </tr>
        <tr style="border-collapse:collapse">
        <td bgcolor="#ffffff" align="center" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;font-size:0">
        <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td style="padding:0;Margin:0;border-bottom:1px solid #ffffff;background:#FFFFFF none repeat scroll 0% 0%;height:1px;width:100%;margin:0px"></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
        <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#ffffff" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation">
        <tr style="border-collapse:collapse">
        <td class="es-m-txt-l" bgcolor="#ffffff" align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
                <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato,  helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                ' . $emailBodyMessage . '
            </p>
        </td>
        </tr>
        <tr style="border-collapse:collapse">
        <td class="es-m-txt-l" align="left" style="Margin:0;padding-top:20px;padding-left:30px;padding-right:30px;padding-bottom:40px">
            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato,  helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                InternBuilders Support Team
            </p>
        </td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px;font-size:0">
        <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td style="padding:0;Margin:0;border-bottom:1px solid #f4f4f4;background:#FFFFFF none repeat scroll 0% 0%;height:1px;width:100%;margin:0px"></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
        <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#b5d6f1;border-radius:4px" width="100%" cellspacing="0" cellpadding="0" bgcolor="#b5d6f1" role="presentation">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0;padding-top:30px;padding-left:30px;padding-right:30px"><h3 style="Margin:0; margin-bottom: 10px;line-height:24px;mso-line-height-rule:exactly;font-family:lato,  helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#111111">Visit InternBuilders</h3></td>
        </tr>
        <tr style="border-collapse:collapse">
        <td esdev-links-color="#00A5EC" align="center" style="padding:0;Margin:0;padding-bottom:30px;padding-left:30px;padding-right:30px"><a target="_blank" href="https://www.internbuilders.online/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#00A5EC;font-size:18px">click here</a></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-footer-body" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
        <tr style="border-collapse:collapse">
        <td align="left" style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:540px">
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td align="left" style="padding:0;Margin:0;padding-top:25px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato,  helvetica, arial, sans-serif;line-height:21px;color:#666666;font-size:14px;text-align: center;">This is a system generated email, please do not reply.</p></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
        <td align="center" style="padding:0;Margin:0">
        <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
        <tr style="border-collapse:collapse">
        <td align="left" style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px">
        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        <tr style="border-collapse:collapse">
        <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
        <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table></td>
        </tr>
        </table>
        </div>
        </body>
        </html>
        
        ';
        
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

        $title = "Verification Code";

        $subject = "Verification Code: " . $otp;
        $message = "<p>Here is you verification code:</p>";
        $message .= "<h4>" . $otp . "</h4>\n\n";
        $message .= "<p>If this request did not come from you, change your account password immediately to prevent further unauthorized access.</p>";
        $message .= "<p>This is a system generated email. Do not reply.</p>";

        $request = sendEmail($emailTo, $subject, $title, $message, $autoload);

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

    // business

    function checkBusinessNameDuplicate($name){

        $statement=dataLink()->prepare("SELECT
                                        bus_id
                                        FROM
                                        business_profiles
                                        Where
                                        bus_name = :bus_name");
        $statement->execute([
            'bus_name' => $name
        ]);

        $count=$statement->rowCount();

        if (empty($count)) {
            return false;
        } else {
            return true;
        }
        

    }

    function createBusinessProfile($userCode, $businessName, $city){

        $statement=dataLink()->prepare("INSERT INTO
                                        business_profiles
                                        (
                                            user_code, 
                                            bus_name, 
                                            city_id, 
                                            bus_created, 
                                            bus_updated
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :bus_name, 
                                            :city_id, 
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'bus_name' => $businessName, 
            'city_id' => $city
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function getBusinessName($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        user_fname 
                                        FROM
                                        users
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['user_fname'];
        } else {
            return null;
        }

    }

    function countBusinessProfiles(){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        business_profiles");
        $statement->execute();

        $count=$statement->rowCount();

        return $count;

    }

    function selectBusiness($userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        business_profiles
                                        WHere
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    function updateBusiness($businessName, $intro, $city, $userCode){

        $statement=dataLink()->prepare("UPDATE
                                        business_profiles
                                        SET
                                        bus_name = :bus_name,
                                        bus_intro = :bus_intro,
                                        city_id = :city_id
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'bus_name' => $businessName,
            'bus_intro' => $intro,
            'city_id' => $city,
            'user_code' => $userCode
        ]);

        updateUserFirstname($businessName, $userCode);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    // category

    function selectCategories(){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        categories
                                        Order By
                                        cat_name
                                        ASC");
        $statement->execute();

        return $statement;

    }

    // posts

    function getPostStatusSKin($status){

        if ($status == "active") {
            $res = "success";
        } else {
            $res = "danger";
        }
        
        return $res;
    }

    function selectPosts($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        posts
                                        Where
                                        user_code = :user_code
                                        Order By
                                        post_created
                                        DESC");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    function selectPostsRanking(){

        $statement=dataLink()->prepare("SELECT 
                                        b.bus_id AS bus_id, b.bus_name AS bus_name, COUNT(p.post_id) AS post_count 
                                        FROM 
                                        business_profiles b 
                                        LEFT JOIN 
                                        posts p ON b.user_code = p.user_code 
                                        GROUP BY 
                                        b.bus_id, b.bus_name 
                                        ORDER BY 
                                        post_count 
                                        DESC");
        $statement->execute();

        return $statement;

    }

    function selectPostsRecent(){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        posts
                                        Order By
                                        post_id
                                        DESC
                                        LIMIT 9");
        $statement->execute();

        return $statement;

    }

    function countPostsAll(){

        $statement=dataLink()->prepare("SELECT 
                                        post_id 
                                        FROM
                                        posts");
        $statement->execute();

        $count=$statement->rowCount();

        return $count;

    }

    function countPosts($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        post_id 
                                        FROM
                                        posts
                                        Where
                                        user_code = :user_code
                                        Order By
                                        post_created
                                        DESC");
        $statement->execute([
            'user_code' => $userCode
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function countPostActive($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        post_id 
                                        FROM
                                        posts
                                        Where
                                        user_code = :user_code
                                        AND
                                        post_status = :post_status
                                        Order By
                                        post_created
                                        DESC");
        $statement->execute([
            'user_code' => $userCode,
            'post_status' => 'active'
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function createPost($userCode, $category, $title, $description, $salary_from, $salary_to, $type, $based, $location, $tags){

        $statement=dataLink()->prepare("INSERT INTO
                                        posts
                                        (
                                            user_code, 
                                            post_category, 
                                            post_title, 
                                            post_description, 
                                            post_salary_from, 
                                            post_salary_to, 
                                            post_type, 
                                            post_based, 
                                            city_id, 
                                            post_tags, 
                                            post_status, 
                                            post_created, 
                                            post_updated
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :post_category, 
                                            :post_title, 
                                            :post_description, 
                                            :post_salary_from, 
                                            :post_salary_to, 
                                            :post_type, 
                                            :post_based, 
                                            :city_id, 
                                            :post_tags, 
                                            :post_status, 
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'post_category' => $category, 
            'post_title' => $title, 
            'post_description' => $description, 
            'post_salary_from' => $salary_from, 
            'post_salary_to' => $salary_to, 
            'post_type' => $type, 
            'post_based' => $based, 
            'city_id' => $location, 
            'post_tags' => $tags, 
            'post_status' => 'active'
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function updatePost($postId, $category, $title, $description, $salary_from, $salary_to, $type, $based, $location, $tags){

        $statement=dataLink()->prepare("UPDATE
                                        posts
                                        SET
                                        post_category = :post_category, 
                                        post_title = :post_title, 
                                        post_description = :post_description, 
                                        post_salary_from = :post_salary_from, 
                                        post_salary_to = :post_salary_to, 
                                        post_type = :post_type, 
                                        post_based = :post_based, 
                                        city_id = :city_id, 
                                        post_tags = :post_tags, 
                                        post_updated = NOW()
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId, 
            'post_category' => $category, 
            'post_title' => $title, 
            'post_description' => $description, 
            'post_salary_from' => $salary_from, 
            'post_salary_to' => $salary_to, 
            'post_type' => $type, 
            'post_based' => $based, 
            'city_id' => $location, 
            'post_tags' => $tags
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function removePost($postId){

        $statement=dataLink()->prepare("DELETE FROM
                                        posts
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId
        ]);

        $statement2=dataLink()->prepare("DELETE FROM
                                        applicants
                                        Where
                                        post_id = :post_id");
        $statement2->execute([
            'post_id' => $postId
        ]);

        if ($statement && $statement2) {
            return true;
        } else {
            return false;
        }

    }

    function selectPostById($postId){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        posts
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId
        ]);

        return $statement;

    }

    function getPostCategory($postId){

        $statement=dataLink()->prepare("SELECT
                                        post_category
                                        FROM
                                        posts
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['post_category'];
        } else {
            return null;
        }
        
    }

    function getPostTitle($postId){

        $statement=dataLink()->prepare("SELECT
                                        post_title
                                        FROM
                                        posts
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['post_title'];
        } else {
            return null;
        }
        
    }

    function updatePostViews($postId){

        $statement=dataLink()->prepare("UPDATE
                                        posts
                                        SET
                                        post_views = post_views + 1
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function countApplicants($postId){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        post_id = :post_id");
        $statement->execute([
            'post_id' => $postId
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function countApplicantsHired(){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        app_status = :app_status");
        $statement->execute([
            'app_status' => 'hired'
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function countSubmissions($userCode){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        app_applicant = :app_applicant");
        $statement->execute([
            'app_applicant' => $userCode
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function selectSubmission($appId){

        $statement=dataLink()->prepare("SELECT 
                                        *
                                        FROM
                                        applicants
                                        Where
                                        app_id = :app_id");
        $statement->execute([
            'app_id' => $appId
        ]);

        return $statement;

    }

    function selectSubmissions($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        *
                                        FROM
                                        applicants
                                        Where
                                        app_applicant = :app_applicant
                                        Order By
                                        app_id
                                        DESC");
        $statement->execute([
            'app_applicant' => $userCode
        ]);

        return $statement;

    }

    function countApplicantsByBusiness($userCode){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        app_business = :app_business");
        $statement->execute([
            'app_business' => $userCode
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function countApplicantsHiredByBusiness($userCode){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        app_business = :app_business
                                        AND
                                        app_status = :app_status");
        $statement->execute([
            'app_business' => $userCode,
            'app_status' => 'hired'
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function selectApplicantsByPost($postId, $userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        Where
                                        post_id = :post_id
                                        AND
                                        app_business = :app_business
                                        Order By
                                        app_created
                                        DESC");
        $statement->execute([
            'post_id' => $postId,
            'app_business' => $userCode
        ]);

        return $statement;

    }

    function selectApplicantsByBusiness($userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        Where
                                        app_business = :app_business
                                        Order By
                                        app_created
                                        DESC
                                        LIMIT 5");
        $statement->execute([
            'app_business' => $userCode
        ]);

        return $statement;

    }

    function applyBtnStatus($userCode, $postId){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        app_applicant = :app_applicant
                                        AND
                                        post_id = :post_id");
        $statement->execute([
            'app_applicant' => $userCode,
            'post_id' => $postId
        ]);

        $count=$statement->rowCount();

        if (empty($count)) {
            return "";
        } else {
            return "disabled";
        }

    }

    function applyBtnStatusLabel($userCode, $postId){

        $statement=dataLink()->prepare("SELECT
                                        app_id
                                        FROM
                                        applicants
                                        Where
                                        app_applicant = :app_applicant
                                        AND
                                        post_id = :post_id");
        $statement->execute([
            'app_applicant' => $userCode,
            'post_id' => $postId
        ]);

        $count=$statement->rowCount();

        if (empty($count)) {
            return "Apply Now";
        } else {
            return "Applied";
        }

    }

    function createApplication($postId, $applicant, $business, $document){

        $statement=dataLink()->prepare("INSERT INTO
                                        applicants
                                        (
                                            post_id, 
                                            app_business, 
                                            app_applicant, 
                                            app_document, 
                                            app_status, 
                                            app_created,
                                            app_updated
                                        )
                                        VALUES
                                        (
                                            :post_id, 
                                            :app_business, 
                                            :app_applicant, 
                                            :app_document, 
                                            :app_status, 
                                            NOW(),
                                            NOW()
                                        )");
        $statement->execute([
            'post_id' => $postId,
            'app_business' => $business,
            'app_applicant' => $applicant,
            'app_document' => $document,
            'app_status' => 'pending'
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }
        
    }

    function getApplicantDocument($userCode, $postId){

        $statement=dataLink()->prepare("SELECT 
                                        app_document
                                        FROM
                                        applicants
                                        Where
                                        app_applicant = :app_applicant
                                        AND
                                        post_id = :post_id");
        $statement->execute([
            'app_applicant' => $userCode,
            'post_id' => $postId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['app_document'];
        } else {
            return null;
        }

    }

    function getApplicantCertificate($userCode, $postId){

        $statement=dataLink()->prepare("SELECT 
                                        app_certificate
                                        FROM
                                        applicants
                                        Where
                                        app_applicant = :app_applicant
                                        AND
                                        post_id = :post_id");
        $statement->execute([
            'app_applicant' => $userCode,
            'post_id' => $postId
        ]);

        $res=$statement->fetch(PDO::FETCH_ASSOC);

        if (is_array($res)) {
            return $res['app_certificate'];
        } else {
            return null;
        }

    }

    function updateApplicantStatus($status, $appId){

        $statement=dataLink()->prepare("UPDATE
                                        applicants
                                        SET
                                        app_status = :app_status,
                                        app_hired = NOW()
                                        Where
                                        app_id = :app_id");
        $statement->execute([
            'app_status' => $status,
            'app_id' => $appId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function updateApplicantTasksHours($appId, $addHours, $schoolHours, $tasks){

        $statement=dataLink()->prepare("UPDATE
                                        applicants
                                        SET
                                        app_school_hours = :app_school_hours,
                                        app_hours = app_hours + :app_hours,
                                        app_task = :app_task
                                        Where
                                        app_id = :app_id");
        $statement->execute([
            'app_school_hours' => $schoolHours,
            'app_hours' => $addHours,
            'app_task' => $tasks,
            'app_id' => $appId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function updateCertificate($appId, $certificate){

        $statement=dataLink()->prepare("UPDATE
                                        applicants
                                        SET
                                        app_certificate = :app_certificate
                                        Where
                                        app_id = :app_id");
        $statement->execute([
            'app_certificate' => $certificate,
            'app_id' => $appId
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    // students

    function countStudents(){

        $statement=dataLink()->prepare("SELECT
                                        profile_id
                                        FROM
                                        profiles");
        $statement->execute();

        $count=$statement->rowCount();

        return $count;

    }

    function countVerifiedStudentsBySchool($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        profile_id
                                        FROM
                                        profiles
                                        Where
                                        school_id = :school_id
                                        AND
                                        profile_verified = :profile_verified");
        $statement->execute([
            'school_id' => $schoolId,
            'profile_verified' => 1
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function countUnVerifiedStudentsBySchool($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        profile_id
                                        FROM
                                        profiles
                                        Where
                                        school_id = :school_id
                                        AND
                                        profile_verified = :profile_verified");
        $statement->execute([
            'school_id' => $schoolId,
            'profile_verified' => 0
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function selectRecentHiredStudents($schoolId, $inputLImit){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        LEFT JOIN
                                        profiles
                                        ON
                                        applicants.app_applicant = profiles.user_code
                                        Where
                                        school_id = :school_id
                                        AND
                                        app_status = :app_status
                                        ORDER BY
                                        profile_created
                                        DESC
                                        LIMIT :input_limit");
        $statement->execute([
            'school_id' => $schoolId,
            'app_status' => 'hired',
            'input_limit' => $inputLImit
        ]);

        return $statement;

    }

    function selectStudentApplications($userCode){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        LEFT JOIN
                                        profiles
                                        ON
                                        applicants.app_applicant = profiles.user_code
                                        Where
                                        profiles.user_code = :user_code
                                        ORDER BY
                                        profile_created
                                        DESC");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    function selectStudentHoursRanking($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        LEFT JOIN
                                        profiles
                                        ON
                                        applicants.app_applicant = profiles.user_code
                                        Where
                                        profiles.school_id = :school_id
                                        ORDER BY
                                        app_hours
                                        DESC");
        $statement->execute([
            'school_id' => $schoolId
        ]);

        return $statement;

    }

    function selectVerifiedStudent($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        LEFT JOIN
                                        profiles
                                        ON
                                        applicants.app_applicant = profiles.user_code
                                        Where
                                        school_id = :school_id
                                        AND
                                        profile_verified = :profile_verified
                                        ORDER BY
                                        profile_created
                                        DESC");
        $statement->execute([
            'school_id' => $schoolId,
            'profile_verified' => 1
        ]);

        return $statement;

    }

    function selectUnverifiedStudent($schoolId){

        $statement=dataLink()->prepare("SELECT
                                        *
                                        FROM
                                        applicants
                                        LEFT JOIN
                                        profiles
                                        ON
                                        applicants.app_applicant = profiles.user_code
                                        Where
                                        school_id = :school_id
                                        AND
                                        profile_verified = :profile_verified
                                        ORDER BY
                                        profile_created
                                        DESC");
        $statement->execute([
            'school_id' => $schoolId,
            'profile_verified' => 0
        ]);

        return $statement;

    }

    function verifyStudent($user_code, $sysem, $status){

        $statement=dataLink()->prepare("UPDATE
                                        profiles
                                        SET
                                        profile_verified = :profile_verified,
                                        profile_sysem = :profile_sysem
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'profile_verified' => $status,
            'profile_sysem' => $sysem,
            'user_code' => $user_code
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function studentVerification($status){

        if ($status == 0) {
            $res = '<i class="ti-close"></i>';
        } else {
            $res = '<i class="ti-check"></i>';
        }
        
        return $res;
    }

    function studentVerificationSkin($status){

        if ($status == 0) {
            $res = "danger";
        } else {
            $res = "info";
        }
        
        return $res;
    }

    // requirements

    function selectRequirement($userCode){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        requirements
                                        Where
                                        user_code = :user_code");
        $statement->execute([
            'user_code' => $userCode
        ]);

        return $statement;

    }

    function selectRequirementById($reqId){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        requirements
                                        Where
                                        require_id = :require_id");
        $statement->execute([
            'require_id' => $reqId
        ]);

        return $statement;

    }

    function countRequests(){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        requirements
                                        Where
                                        require_status = :require_status
                                        Order By
                                        require_created
                                        DESC");
        $statement->execute([
            'require_status' => 'pending'
        ]);

        $count=$statement->rowCount();

        return $count;

    }

    function selectRequests(){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        requirements
                                        Where
                                        require_status = :require_status
                                        Order By
                                        require_created
                                        DESC");
        $statement->execute([
            'require_status' => 'pending'
        ]);

        return $statement;

    }

    function selectRequirements(){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        requirements
                                        Order By
                                        require_created
                                        DESC");
        $statement->execute();

        return $statement;

    }

    function selectRequirementsBySchool($schoolId){

        $statement=dataLink()->prepare("SELECT 
                                        * 
                                        FROM
                                        requirements
                                        Where
                                        school_id = :school_id
                                        Order By
                                        require_created
                                        ASC");
        $statement->execute([
            'school_id' => $schoolId
        ]);

        return $statement;

    }

    function createRequirements($userCode, $schoolId, $position, $attachment1, $attachment2){

        $statement=dataLink()->prepare("INSERT INTO 
                                        requirements
                                        (
                                            user_code, 
                                            school_id, 
                                            require_position, 
                                            require_attachment1, 
                                            require_attachment2, 
                                            require_status, 
                                            require_created, 
                                            require_updated
                                        )
                                        Values
                                        (
                                            :user_code, 
                                            :school_id, 
                                            :require_position, 
                                            :require_attachment1, 
                                            :require_attachment2, 
                                            :require_status, 
                                            NOW(), 
                                            NOW()
                                        )");
        $statement->execute([
            'user_code' => $userCode, 
            'school_id' => $schoolId, 
            'require_position' => $position, 
            'require_attachment1' => $attachment1, 
            'require_attachment2' => $attachment2, 
            'require_status' => 'pending'
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

    function approveRequirements($reqId, $userCode, $schoolId){

        $statement1=dataLink()->prepare("UPDATE
                                        requirements
                                        SET
                                        require_status = :require_status
                                        Where
                                        require_id = :require_id");
        $statement1->execute([
            'require_status' => 'approved',
            'require_id' => $reqId
        ]);

        $statement2=dataLink()->prepare("UPDATE
                                        users
                                        SET
                                        school_id = :school_id
                                        Where
                                        user_code = :user_code");
        $statement2->execute([
            'school_id' => $schoolId,
            'user_code' => $userCode
        ]);

        if ($statement1 && $statement2) {
            return true;
        } else {
            return false;
        }

    }

    // email requests

    function createEmailRequest($ticket, $emailFrom, $message){

        $statement=dataLink()->prepare("INSERT INTO 
                                        emailrequests
                                        (
                                            req_ticket, 
                                            req_email, 
                                            req_message, 
                                            req_read, 
                                            req_created
                                            ) 
                                        VALUES
                                        (
                                            :req_ticket, 
                                            :req_email, 
                                            :req_message, 
                                            :req_read,
                                            NOW()
                                        ) ");
        $statement->execute([
            'req_ticket' => $ticket, 
            'req_email' => $emailFrom, 
            'req_message' => $message, 
            'req_read' => 0
        ]);

        if ($statement) {
            return true;
        } else {
            return false;
        }

    }

?>