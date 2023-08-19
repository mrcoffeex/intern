<?php  
    require '../../config/includes.php';
    require '_session.php';

    $expId = clean_int($_GET['expId']);

    if (!empty($expId)) {

        $request = removeExp($expId);
        
        if ($request == true) {
            header("location: profile?note=exp_remove");
        }else{
            header("location: profile?note=error");
        }
        

    } else {
        header("location: profile?note=invalid");
    }
    
?>