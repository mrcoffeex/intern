<?php 
	require '../../config/includes.php';
    require '_session.php';

	$postId = clean_int($_GET['postId']);
	$ucode = clean_string($_GET['ucode']);
	
    $downloadFIle = getApplicantCertificate($ucode, $postId);

	$fileurl = '../../filebank/'.$downloadFIle;
	header("Content-type:application/pdf");
	header('Content-Disposition: attachment; filename=' . $downloadFIle);
	readfile( $fileurl );
?>