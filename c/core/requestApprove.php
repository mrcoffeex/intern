<?php  
    require '../../config/includes.php';
    require '_session.php';

    $reqId = clean_int($_GET['reqId']);

    $getRequirements=selectRequirementById($reqId);
    $requirement=$getRequirements->fetch(PDO::FETCH_ASSOC);

    if (!empty($reqId)) {
        
        $request = approveRequirements($reqId, $requirement['user_code'], $requirement['school_id']);

        if ($request == true) {
            header("location: ./?note=approved");
        } else {
            header("location: ./?note=error");
        }

    }else{
        header("location: ./?note=invalid");
    }
    
?>