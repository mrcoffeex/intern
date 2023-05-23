<?php  
    require 'config/includes.php';

    $businessName = $_POST['businessName'];

    $request = checkBusinessNameDuplicate($businessName);

    if ($request == true) {
        echo "duplicate";
    } else {
        echo "valid";
    }
    
?>