<?php 
	require '../../config/includes.php';
    require '_session.php';

    $ucode = clean_string($_GET['ucode']);
	$postId = clean_int($_GET['postId']);
	
    $downloadFIle = getApplicantDocument($ucode, $postId);

	$fileurl = '../../filebank/'.$downloadFIle;
	header("Content-type:application/pdf");
	header('Content-Disposition: attachment; filename=' . $downloadFIle);
	readfile( $fileurl );
?>