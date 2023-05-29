<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    $getPost=selectPostById($postId);
    $post=$getPost->fetch(PDO::FETCH_ASSOC);

    $title = $post['post_category'];
?>

<!DOCTYPE html>
<html lang="en">

<?php include '_head.php'; ?>

<body class="sidebar-dark">
    <div class="container-scroller">
        
        <?php include '_navbar.php'; ?>
        
        <div class="container-fluid page-body-wrapper">

        <?php include '_sidebar.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    
                    <?php include '_breads.php'; ?>

                    <div class="row">
                        
                        <?php 
                            include '_reminder.php';
                        ?>

                    </div>

                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form action="postUpdate?postId=<?= $postId ?>" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.updateJob)">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <a href="posts">
                                                <button type="button" class="btn btn-dark btn-sm">back to posts</button>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select class="js-example-basic-multiple w-100" name="category" id="category" required>
                                                    <option value="<?= $post['post_category'] ?>"><?= $post['post_category'] ?></option>
                                                    <?php  
                                                        $getCategories=selectCategories();
                                                        while ($category=$getCategories->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?= $category['cat_name'] ?>"><?= $category['cat_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Location</label>
                                                <select class="js-example-basic-multiple w-100" name="location" id="location" >
                                                <option value="<?= $post['city_id'] ?>"><?= getCityName($post['city_id']) ?></option>
                                                    <?php  
                                                        $getCities=selectCities();
                                                        while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Salary Range From</label>
                                                <input type="number" name="salary_from" id="salary_from" class="form-control form-control-lg" min="0" value="<?= $post['post_salary_from'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Salary Range To</label>
                                                <input type="number" name="salary_to" id="salary_to" class="form-control form-control-lg" min="0" value="<?= $post['post_salary_to'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job Type</label>
                                                <select class="form-control form-control-lg" name="type" id="type" required>
                                                    <option><?= $post['post_type'] ?></option>
                                                    <option>Full-Time</option>
                                                    <option>Part-Time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job-based</label>
                                                <select class="form-control form-control-lg" name="based" id="based" required>
                                                    <option><?= $post['post_based'] ?></option>
                                                    <option>Office-Based</option>
                                                    <option>Home-Based</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Job Title</label>
                                                <input type="text" name="title" id="title" class="form-control form-control-lg" value="<?= $post['post_title'] ?>" maxlength="255" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Job Description</label>
                                                <textarea id='description' name="description"><?= $post['post_description'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Skill Tags</label>
                                                <select class="js-example-basic-multiple w-100" multiple="multiple" name="tags[]" id="tags">
                                                    <?php  
                                                        $tagsArray = explode(',', $post['post_tags']);
                                                        foreach ($tagsArray as $tags) {
                                                            echo '<option value="'.$tags.'" selected>'.$tags.'</option>';
                                                        }
                                                    ?>

                                                    <?php  
                                                        $getSkills=selectSkills();
                                                        while ($skill=$getSkills->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?= $skill['skill_name'] ?>"><?= $skill['skill_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" id="updateJob" class="btn btn-info text-white">Update Post</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-title"><i class="ti-eye"></i> Preview</p>
                                        </div>
                                        <h4><span id="categoryPreview"><?= $post['post_category'] ?></span></h4>
                                        <p><span id="locationPreview"><i class="ti-location-pin"></i> <?= getCityName($post['city_id']) ?></span></p>
                                        <p class="text-primary"><span id="salaryPreview"><?= $post['post_salary_from'] . " - " . $post['post_salary_to'] ?></span></p>
                                        <p><span id="typeBasedPreview"><?= $post['post_type'] . " | " . $post['post_based'] ?></span></p>
                                        <p class="text-secondary">Posted <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?></p>

                                        <p class="text-bold"><span id="titlePreview"><?= $post['post_title'] ?></span></p>
                                        <div id="descriptionPreview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php include '_footer.php'; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- modals -->

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

    <script src="../../js/postCreateForm.js"></script>

</body>

</html>

