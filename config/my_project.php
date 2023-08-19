<?php

	//select in the database
	$getproject=datalink()->prepare("SELECT * From project Where project_id = :project_id");
	$getproject->execute([
		'project_id' => 1
	]);

	$project=$getproject->fetch(PDO::FETCH_ASSOC);

	$projectName = $project['project_name'];
	$projectAddress = $project['project_address'];
	$projectCreated = $project['project_created'];
?>