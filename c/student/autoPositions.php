<?php  
    require '../../config/includes.php';
    require '_session.php';

	$search = $_GET['search'];

	if ($search == "") {
		echo "<option></option>";
	}else{
		$statement=datalink()->prepare("SELECT 
                                        * 
                                        FROM 
                                        categories 
                                        WHERE 
                                        cat_name like '%$search%' 
                                        ORDER BY 
                                        cat_name 
                                        ASC 
                                        LIMIT 15");
        $statement->execute();
	 	$count=$statement->rowCount();

		if (empty($count)) {
			echo "<option value='course not found'></option>";
		}else{
			while($res=$statement->fetch(PDO::FETCH_ASSOC)){
				echo "<option>" . $res['cat_name'] . "</option>";
			}
		}
	}
 
?>

