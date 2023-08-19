<?php 
    require '../../config/includes.php';
    require '_session.php';

	$title = "Logout";

	createLog("Logout", $userEmail, "auth");
	session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
	    <meta http-equiv="refresh" content="1;url=../../">
    </head>

	<?php include '_head.php'; ?>

<body>
	<div class="row" style="margin-top: 10%;">
		<div class="col-lg-12 text-center">
			<span class="text-uppercase" style="font-size: 27px;">&nbsp;Saving Logs</span>
			<p>please wait.</p>
		</div>
	</div>
    <?php include '_scripts.php'; ?>
</body>
</html>