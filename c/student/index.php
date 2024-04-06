<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "InternShips";

    $keywords = "";
    $city = "";
    $type = "";
    $based = "";
    $salaryMinimum = "0";

    include 'index.paginate.php';
    
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
                    <div class="col-lg-3 mb-2">
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
                            <label id="typelabel1" class="btn btn-outline-white <?= ($type == 'Full-time') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="type" id="type1" value="Full-time" autocomplete="off" <?= ($type == 'Full-time') ? "checked" : ""; ?> > Full-time
                            </label>
                            <label id="typelabel2" class="btn btn-outline-white <?= ($type == 'Part-time') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="type" id="type2" value="Part-time" autocomplete="off" <?= ($type == 'Part-time') ? "checked" : ""; ?> > Part-time
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-2">
                        <div class="btn-group" data-toggle="buttons" style="width: 100%;">
                            <label id="basedlabel1" class="btn btn-outline-white <?= ($based == 'Office-based') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="based" id="based1" value="Office-based" autocomplete="off"  <?= ($based == 'Office-based') ? "checked" : ""; ?> > Office-based
                            </label>
                            <label id="basedlabel2" class="btn btn-outline-white <?= ($based == 'Home-based') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="based" id="based2" value="Home-based" autocomplete="off" <?= ($based == 'Home-based') ? "checked" : ""; ?> > Home-based
                            </label>
                            <label id="basedlabel2" class="btn btn-outline-white <?= ($based == 'Hybrid') ? "bg-white text-dark" : ""; ?>">
                                <input type="radio" name="based" id="based3" value="Hybrid" autocomplete="off" <?= ($based == 'Hybrid') ? "checked" : ""; ?> > Hybrid
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
                <div class="col-md-12 mb-3">
                    <h4 class="text-dark"><span class="badge badge-dark badge-lg">For You</span> <small><span class="text-primary"><?= $countRes ?></span> results</small></h4>
                </div>

                <div class="col-lg-12">

                    <div class="row">

                        <?php 
                            while ($post=$paginate->fetch(PDO::FETCH_ASSOC)) {

                                if ($post['post_salary_from'] == 0 && $post['post_salary_to'] == 0) {
                                    $salaryRate = "No Salary";
                                } else {
                                    $salaryRate = $post['post_salary_from'] . " - " . $post['post_salary_to'];
                                }
                                
                        ?>

                        <div class="col-md-12 mb-4">
                            <div class="card card-flex">
                                <div class="card-body card-body-flex">
                                    <p class="m-0 text-bold text-dark"><?= $post['post_category'] ?> <small class="float-right"><?= $post['total_matched_tags'] ?> <?= addS("skill", $post['total_matched_tags']) ?> match found</small></p>
                                    <p class="business-text m-0"><?= getBusinessName($post['user_code']) ?> . <?= getCityName($post['city_id']) ?> . <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?> . <?= countApplicants($post['post_id']) ?> applicants applied</p>

                                    <hr>

                                    <p class="small-text m-2"><span class="icon-briefcase"></span> <?= $post['post_based'] ?> . <?= $post['post_type'] ?></p>
                                    <p class="m-2">
                                        <span class="small-text">
                                            <span class="icon-list"></span> Skills: 
                                        </span>
                                        <?php  
                                            $tagsArray = explode(',', $post['post_tags']);
                                            foreach ($tagsArray as $tags) {
                                        ?>

                                        <span class="badge badge-secondary"><?= $tags ?></span>

                                        <?php } ?>
                                    </p>
                                    <p class="small-text m-2"><span class="icon-money"></span> Salary:  <?= $salaryRate ?></p>
                                    
                                    <!-- <h5 class="mt-4 text-dark">About the Job</h5> -->

                                    <p class="text-justify">
                                        <?= stringLimit($post['post_description'], 500) ?>
                                        <a href="#">Read more</a>
                                    </p>

                                    <a href="post?token=<?= my_rand_str(30) ?>&postId=<?= $post['post_id'] ?>" target="BLANK" class="stretched-link" title="click to view ..."></a>
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

    <script src="../../js/internships.js"></script>
     
  </body>
</html>