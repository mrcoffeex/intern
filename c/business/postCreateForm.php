<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Create Job Posts";
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
                                    <form action="postCreate" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.postJob)">
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
                                                    <option value=""></option>
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
                                                    <option value=""></option>
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
                                                <input type="number" name="salary_from" id="salary_from" class="form-control form-control-lg" value="15000" min="0" step="0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Salary Range To</label>
                                                <input type="number" name="salary_to" id="salary_to" class="form-control form-control-lg" value="25000" min="0" step="0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job Type</label>
                                                <select class="form-control form-control-lg" name="type" id="type" required>
                                                    <option>Full-Time</option>
                                                    <option>Part-Time</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Job-based</label>
                                                <select class="form-control form-control-lg" name="based" id="based" required>
                                                    <option>Office-Based</option>
                                                    <option>Home-Based</option>
                                                    <option>Hybrid</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Job Title</label>
                                                <input type="text" name="title" id="title" class="form-control form-control-lg" maxlength="255" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Job Description</label>
                                                <textarea id='description' name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Skill Tags</label>
                                                <select class="js-example-basic-multiple w-100" multiple="multiple" name="tags[]" id="tags">
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
                                                <button type="submit" id="postJob" class="btn btn-info text-white">Post Job</button>
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
                                        <h4><span id="categoryPreview"></span></h4>
                                        <p><span id="locationPreview"></span></p>
                                        <p class="text-primary"><span id="salaryPreview"></span></p>
                                        <p><span id="typeBasedPreview"></span></p>

                                        <p class="text-bold"><span id="titlePreview"></span></p>
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

