<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['address'])) {

        $address = clean_string($_POST['address']);
        $city = clean_int($_POST['city']);
        $gender = clean_string($_POST['gender']);
        $contact = clean_string($_POST['contact']);

        $request = updateProfilePersonal($address, $city, $gender, $contact, $userCode);
        
        if ($request == true) {
            header("location: profile?note=updated");
        }else{
            header("location: profile?note=error");
        }
        

    } else {
        header("location: profile?note=invalid");
    }
    
?>