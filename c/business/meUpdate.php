<?php  
    require '../../config/includes.php';
    require '_session.php';

    if (isset($_POST['businessName'])) {
        
        $businessName = clean_string($_POST['businessName']);
        $intro = clean_string($_POST['intro']);
        $city = clean_string($_POST['city']);

        $request = updateBusiness($businessName, $intro, $city, $userCode);

        if ($request) {
            header("location: me?note=updated");
        } else {
            header("location: me?note=error");
        }
        
    } else {
        header("location: me?note=invalid");
    }
    
?>