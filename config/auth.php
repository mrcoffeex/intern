<?php  
	session_start();

	require_once('conn.php');
	require_once('function.php');

	if(isset($_POST['userEmail'])){

		$userEmail = clean_string($_POST['userEmail']);
		$userPassword = clean_string(md5($_POST['userPassword']));
			
		$statement=datalink()->prepare("SELECT * From users Where 
								user_email = :user_email AND 
								user_password = :user_password");
		$statement->execute([ 
			'user_email' => $userEmail,
			'user_password' => $userPassword
		]);
								
		$count=$statement->rowCount();
		$row=$statement->fetch(PDO::FETCH_ASSOC);

		$_SESSION['hotkopi_session_id'] = $row['user_uid'];
		$_SESSION['hotkopi_session_type'] = $row['user_type'];

		if($count > 0){

			if ($row['user_verified'] == 1) {
				
				if ($row['user_status'] == 0) {

					switch ($row['user_type']) {
						case '0':
							createLog("Login", $userEmail, "auth");
							header("location: ../c/core/");
							break;
						case '1':
							createLog("Login", $userEmail, "auth");
							header("location: ../c/qa/");
							break;
						case '2':
							createLog("Login", $userEmail, "auth");
							header("location: ../c/company/");
							break;
						case '3':
							createLog("Login", $userEmail, "auth");
							header("location: ../c/student/");
							break;
						
						default:
							createLog("Login Attempt", $userEmail, "attempt");
							session_destroy();
							header("location: ../?note=noexist&email=$userEmail");
							break;
					}
	
				}else{
					createLog("Login Attempt", $userEmail, "attempt");
					session_destroy();
					header("location: ../?note=suspended&email=$userEmail&modal=1");
				}

			} else {
				createLog("Login Attempt", $userEmail, "attempt");
				session_destroy();
				header("location: ../verify?token=".my_rand_str(30)."&ucode=".$row['user_code']."&note=unverified");
			}

		}else{
			createLog("Login Attempt", $userEmail, "attempt");
			session_destroy();
			header("location: ../?note=noexist&email=$userEmail&modal=1");
		}
	}
		
?>