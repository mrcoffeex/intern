<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    if (isset($_POST['category'])) {

        $category = clean_string($_POST['category']);
        $location = clean_string($_POST['location']);
        $salary_from = clean_float($_POST['salary_from']);
        $salary_to = clean_float($_POST['salary_to']);
        $type = clean_string($_POST['type']);
        $based = clean_string($_POST['based']);
        $title = clean_string($_POST['title']);
        $description = clean_string($_POST['description']);

        $tags = $_POST['tags'];
        $tagsArray = implode(',', $tags);

        $request = updatePost($postId, $category, $title, $description, $salary_from, $salary_to, $type, $based, $location, $tagsArray);

        if ($request) {
            header("location: postEdit?postId=$postId&note=updated");
        } else {
            header("location: postEdit?postId=$postId&note=error");
        }

    } else {
        header("location: postEdit?postId=$postId&note=invalid");
    }
    
?>