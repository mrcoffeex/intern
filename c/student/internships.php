<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "InternShips";

    if (isset($_POST['keywords'])) {

        $keywords = clean_string($_POST['keywords']);
        $city = clean_int($_POST['city']);
        $type = clean_string($_POST['type']);
        @$based = clean_string($_POST['based']) ? clean_string($_POST['based']) : 'Office-Based';
        @$salaryMinimum = clean_float($_POST['salaryMinimum']) ? clean_float($_POST['salaryMinimum']) : '0';
        
    } else {

        $keywords = "";
        $city = $profile['city_id'];
        $type = "Full-TIme";
        $based = "Office-Based";
        $salaryMinimum = "0";

    }

    include 'internships.paginate.php';
    
?>

<!doctype html>
<html lang="en">
    
    <?php include '_head.php'; ?>

  <body id="top">
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <?php include '_navbar.php'; ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../../images/hero_1.jpg');" id="home-section"></section>

    <section class="site-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <p class="text-dark text-center">keywords: <?= $keywords ?> | <span class="text-primary"><?= $countRes ?></span> results</p>
                </div>

                <div class="col-lg-5">
                    <form action="" method="post" onsubmit="btnLoader(this.search)">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <h5 class="text-center">Keyword Search</h5>
                                    <input type="text" class="form-control" name="keywords" id="keywords" placeholder="ex. Customer Service" value="<?= $keywords ?>" autofocus >
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="search" class="btn btn-primary btn-block">Search Jobs</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><span class="text-primary"><i class="icon-filter"></i></span> Filters</h5>

                                <div class="form-group">
                                    <label for="" class="col-sm-12 p-0">City</label>
                                    <select class="js-example-basic-multiple w-100" name="city" id="city">
                                        <option value="<?= $city ?>"><?= getCityName($city) ?></option>
                                        <?php  
                                            $getCities=selectCities();
                                            while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-12 p-0">Job Type</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option><?= $type ?></option>
                                        <option>Full-TIme</option>
                                        <option>Part-TIme</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-12 p-0">Job Based</label>
                                    <select class="form-control" name="based" id="based" required>
                                        <option><?= $based ?></option>
                                        <option>Office-Based</option>
                                        <option>Home-Based</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">Desired minimum monthly salary <span class="text-primary">PHP <span id="salaryMinimumValue"><?= $salaryMinimum ?></span></span></label>
                                    <input type="range" class="form-control" name="salaryMinimum" id="salaryMinimum" min="0" max="100000" step="5000" value="<?= $salaryMinimum ?>" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7">

                    <?php 
                        while ($post=$paginate->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="text-bold"><?= $post['post_category'] ?></h5>
                            <h6 class="text-bold mb-2"><?= $post['bus_name'] ?></h6>

                            <p class="text-dark"><i class="icon-map-marker"></i> <?= getCityName($post['city_id']) ?></p>

                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">Job Type</p>
                                    <p class="text-primary"><?= $post['post_type'] ?></p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">Job Based</p>
                                    <p class="text-primary"><?= $post['post_based'] ?></p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">Salary</p>
                                    <p class="text-dark">
                                        <?= RealNumber($post['post_salary_from'], 0) ?> - <?= RealNumber($post['post_salary_to'], 0) ?> /month
                                    </p>
                                </div>
                            </div>

                            <?php  
                                $tagsArray = explode(',', $post['post_tags']);
                                foreach ($tagsArray as $tags) {
                            ?>

                            <span class="badge badge-secondary"><?= $tags ?></span>

                            <?php } ?>
                            <a href="post?token=<?= my_rand_str(30) ?>&postId=<?= $post['post_id'] ?>" target="_NEW" class="stretched-link" title="click to view ..."></a>
                        </div>
                    </div>

                    <?php } ?>

                </div>

                <div class="col-lg-12">
                    <div class="float-right mt-4">
                        <ul class="pagination flex-wrap pagination-rounded">
                            <?= $paginationCtrls; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include '_footer.php'; ?>
  
  </div>
  
    <?php include '_modals.php'; ?>
    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

    <script src="../../js/internships.js"></script>
     
  </body>
</html>