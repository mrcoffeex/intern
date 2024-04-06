<?php  
    require '../../config/includes.php';
    require '_session.php';

    $usercode = clean_string($_GET['usercode']);

    if (isset($_POST['sysem'])) {

        $sysem = clean_string($_POST['sysem']);

        $request = verifyStudent($usercode, $sysem, 1);

        if ($request == true) {
            header("location: studentUnverified?rand=".my_rand_str(30)."&note=updated");
        } else {
            header("location: studentUnverified?rand=".my_rand_str(30)."&note=error");
        }

    }else{

        header("location: studentUnverified?rand=".my_rand_str(30)."&note=invalid");

    }
    
?>