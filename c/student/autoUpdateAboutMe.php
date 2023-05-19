<?php  
    require '../../config/includes.php';
    require '_session.php';

    $aboutMe = $_POST['aboutMe'];

    updateAboutMe($aboutMe, $userCode);
?>