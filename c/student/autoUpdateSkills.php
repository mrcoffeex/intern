<?php  
    require '../../config/includes.php';
    require '_session.php';

    $skills = $_POST['skills'];

    updateSkills($skills, $userCode);
?>