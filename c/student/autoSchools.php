<?php  
    require '../../config/includes.php';
    require '_session.php';

	$search = $_GET['search'];

	if ($search == "") {
		echo "<option></option>";
	}else{
		$statement=datalink()->prepare("SELECT 
                                        school_name 
                                        FROM 
                                        schools 
                                        WHERE 
                                        school_name like '%$search%' 
                                        ORDER BY 
                                        school_name 
                                        ASC 
                                        LIMIT 15");
        $statement->execute();
	 	$count=$statement->rowCount();

		if (empty($count)) {
			echo "<option value='course not found'></option>";
		}else{
			while($res=$statement->fetch(PDO::FETCH_ASSOC)){
				echo "<option>" . $res['school_name'] . "</option>";
			}
		}
	}
 
?>

