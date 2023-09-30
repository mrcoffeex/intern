<?php  
    require 'config/includes.php';

    $title = "InternShips";

    $city = clean_int($_GET['city'] ?? "");
    $type = clean_string($_GET['type'] ?? "");
    $based = clean_string($_GET['based'] ?? "");
    $salaryMinimum = clean_float($_GET['salaryMinimum'] ?? 0);
    $keywords = clean_string($_GET['keywords']);

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
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section"></section>

    <section class="pt-3 pb-0 bg-image overlay-primary fixed overlay">
        <div class="container">
            <form action="_redirect" enctype="multipart/form-data" method="post" class="search-jobs-form" onsubmit="btnLoader(this.searchBtn)">
                <div class="row mb-1">
                    <div class="col-lg-10">
                        <label for="" class="text-white">Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Job title, Company..." value="<?= $keywords ?>" required>
                    </div>
                    <div class="col-lg-2 mb-2">
                        <label for="" class="text-white">&nbsp;</label>
                        <button type="submit" id="searchBtn" class="btn btn-outline-white btn-block border-radius-none"><span class="icon-search icon mr-2"></span>Search</button>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <select name="city" id="city" class="select2" multiple="multiple" style="width: 100%;">
                            <?php  
                                if (empty($city)) {
                                    echo "";
                                } else {
                                    echo "<option value='" . $city . "' selected>" . getCityName($city) . "</option>";
                                }
                            ?>
                            <?php  
                                $getCities=selectCities();
                                while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="btn-group" data-toggle="buttons" style="width: 100%;">
                            <label id="typelabel1" class="btn btn-outline-white <?= ($type == 'Full-time' || $type == '') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="type" id="type1" value="Full-time" autocomplete="off" <?= ($type == 'Full-time' || $type == '') ? "checked" : ""; ?> > Full-time
                            </label>
                            <label id="typelabel2" class="btn btn-outline-white <?= ($type == 'Part-time') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="type" id="type2" value="Part-time" autocomplete="off" <?= ($type == 'Part-time') ? "checked" : ""; ?> > Part-time
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="btn-group" data-toggle="buttons" style="width: 100%;">
                            <label id="basedlabel1" class="btn btn-outline-white <?= ($based == 'Office-based' || $based == '') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="based" id="based1" value="Office-based" autocomplete="off"  <?= ($based == 'Office-based' || $based == '') ? "checked" : ""; ?> > Office-based
                            </label>
                            <label id="basedlabel2" class="btn btn-outline-white <?= ($based == 'Home-based') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="based" id="based2" value="Home-based" autocomplete="off" <?= ($based == 'Home-based') ? "checked" : ""; ?> > Home-based
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-0">
                        <div class="form-group">
                            <label for="" class="text-white mb-0">Desired minimum monthly salary <span class="text-bold">PHP <span id="salaryMinimumValue"><?= $salaryMinimum ?></span></span></label>
                            <input type="range" class="form-control" name="salaryMinimum" id="salaryMinimum" min="0" max="100000" step="5000" value="<?= $salaryMinimum ?>" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="site-section pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <p class="text-dark text-center">keywords: <?= $keywords ?> | <span class="text-primary"><?= $countRes ?></span> results</p>
                </div>
                <div class="col-lg-12">

                    <div class="row">

                        <?php 
                            while ($post=$paginate->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                        <div class="col-md-4 mb-4">
                            <div class="card card-flex">
                                <div class="card-body card-body-flex">
                                    <p class="m-0 text-bold text-dark"><?= $post['post_category'] ?></p>
                                    <p class="business-text m-0"><?= getBusinessName($post['user_code']) ?></p>

                                    <hr>

                                    <p class="small-text m-2"><span class="icon-room"></span> <?= getCityName($post['city_id']) ?></p>
                                    <p class="small-text m-2"><span class="icon-timer"></span> <?= $post['post_type'] ?></p>
                                    <p class="small-text m-2"><span class="icon-money"></span> <?= $post['post_salary_from'] . " - " . $post['post_salary_to'] ?></p>
                                    <p class="small-text m-2"><span class="icon-calendar-o"></span> <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?></p>
                                    <?php  
                                        $tagsArray = explode(',', $post['post_tags']);
                                        foreach ($tagsArray as $tags) {
                                    ?>

                                    <span class="badge badge-secondary"><?= $tags ?></span>

                                    <?php } ?>

                                    <a href="#" data-toggle="modal" data-target="#login" class="stretched-link" title="click to view ..."></a>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                    </div>

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

    <script src="js/internships.js"></script>
     
  </body>
</html>