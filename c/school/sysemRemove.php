<?php  
    require '../../config/includes.php';
    require '_session.php';

    $sysemId = clean_int($_GET['sysemId']);

    if (!empty($sysemId)) {

        $request = removeSysem($sysemId);

        if ($request == true) {
            header("location: sysem?note=removed");
        } else {
            header("location: sysem?note=error");
        }

    } else {
        header("location: sysem?note=invalid");
    }
    
    
?>