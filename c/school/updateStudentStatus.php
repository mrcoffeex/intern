<?php  
    require '../../config/includes.php';
    require '_session.php';

    $usercode = clean_string($_GET['usercode']);

    if (empty($usercode)) {

        header("location: studentUnverified?rand=".my_rand_str(30)."&note=invalid");

    }else{

        $request = verifyStudent($usercode, 1);

        if ($request == true) {
            header("location: studentUnverified?rand=".my_rand_str(30)."&note=updated");
        } else {
            header("location: studentUnverified?rand=".my_rand_str(30)."&note=error");
        }

    }
    
?>