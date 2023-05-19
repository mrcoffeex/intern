<?php
    require '../../config/includes.php';
    require '_session.php';

    // Assuming you have a MySQL database connection already established

    // Retrieve the search term
    $term = $_GET['term'];

    // Fetch country suggestions from the database
    $statement=datalink()->prepare("SELECT country_name FROM countries WHERE country_name LIKE :country_name");
    $statement->execute([
        'country_name' => "%$term%"
    ]);

    $suggestions = array();
    
    // Build an array of suggestions
    while ($res = $statement->fetch(PDO::FETCH_ASSOC)) {
        $suggestions[] = $res['country_name'];
    }

    // Convert the array to JSON and send the response
    echo json_encode($suggestions);
?>
