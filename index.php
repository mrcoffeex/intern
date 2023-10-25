<?php  
    require 'config/includes.php';
    require '_config.php';

    $email = @$_GET['email'];

    $title = "InternBuilders";
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
    </div>
    
    <?php include '_navbar.php' ?>

    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mt-5 mb-4 text-center">
              <h1 class="text-white font-weight-bold text-capitalize">the ultimate destination for interns</h1>
              <!-- <p>Our platform is designed to simplify the process for you</p> -->
            </div>
            <form action="_redirect" enctype="multipart/form-data" method="post" class="search-jobs-form" onsubmit="btnLoader(this.searchBtn)">
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <input type="text" name="keywords" class="form-control" placeholder="Job title, Company..." required>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <select name="city" id="city" class="select2" multiple="multiple" style="width: 100%;">
                    <?php  
                        $getCities=selectCities();
                        while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
                  <button type="submit" id="searchBtn" class="btn btn-primary btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Latest jobs on <?= $projectName ?></h2>
          </div>
        </div>
        
        <div class="row mb-4">
            <?php  
                $getPosts=selectPostsRecent();
                while ($post=$getPosts->fetch(PDO::FETCH_ASSOC)) {

                  if ($post['post_salary_from'] == 0 && $post['post_salary_to'] == 0) {
                      $salaryRate = "No Salary";
                  } else {
                      $salaryRate = $post['post_salary_from'] . " - " . $post['post_salary_to'];
                  }
            ?>
              
              <div class="col-md-4 mb-4">
                <div class="card card-flex">
                  <div class="card-body card-body-flex">
                    <p class="m-0 text-bold text-dark"><?= $post['post_category'] ?></p>
                    <p class="business-text m-0"><?= getBusinessName($post['user_code']) ?></p>

                    <hr>

                    <p class="small-text m-2"><span class="icon-room"></span> <?= getCityName($post['city_id']) ?></p>
                    <p class="small-text m-2"><span class="icon-timer"></span> <?= $post['post_type'] ?></p>
                    <p class="small-text m-2"><span class="icon-money"></span> <?= $salaryRate ?></p>
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
    </section>

    <section class="site-section bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Looking For Internship?</h2>
            <p class="mb-0 text-white lead">Looking for an internship opportunity to gain valuable hands-on experience and contribute to a dynamic and innovative team?</p>
          </div>
          <div class="col-md-3 ml-auto">
            <a href="student" class="btn btn-outline-white btn-block btn-lg">Sign Up</a>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section py-4">
      <div class="container">
  
        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-4">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Reviews</h2>
                <p class="lead">Here are some examples of the individuals we have helped.</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <section class="bg-light pt-5 testimony-full">
        
        <div class="owl-carousel single-carousel">
        
          <div class="container">
            <div class="row">
              <div class="col-lg-12 align-self-center text-center">
                <blockquote>
                  <p>&ldquo;We have supported numerous startups by providing strategic guidance, conducting market research, and assisting with business planning and development. Our tailored solutions have helped these startups establish a strong foundation and navigate their initial stages of growth.&rdquo;</p>
                  <p><cite> &mdash; Corey Woods, Student</cite></p>
                </blockquote>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-lg-12 align-self-center text-center">
                <blockquote>
                  <p>&ldquo;We have partnered with retail and e-commerce businesses to optimize their online presence, improve customer experience, and implement effective digital marketing strategies. Through our expertise, these businesses have achieved increased brand visibility, enhanced customer engagement, and improved sales performance.&rdquo;</p>
                  <p><cite> &mdash; Chris Peters, Student</cite></p>
                </blockquote>
              </div>
            </div>
          </div>

      </div>
    
    <section class="site-section bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">InternBuilders Community</h2>
          </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?= countProfiles() ?>">0</strong>
            </div>
            <span class="caption">Candidates</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?= countPostsAll() ?>">0</strong>
            </div>
            <span class="caption">Jobs Posted</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?= countApplicantsHired() ?>">0</strong>
            </div>
            <span class="caption">Jobs Filled</span>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
              <strong class="number" data-number="<?= countBusinessProfiles() ?>">0</strong>
            </div>
            <span class="caption">Business</span>
          </div>
        </div>
      </div>
    </section>

    </section>
    
    <?php include '_footer.php'; ?>
  
  </div>

    <?php include '_modals.php'; ?>
    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

    <script src="js/internships.js"></script>

    <?php  
        $modal = @$_GET['modal'];

        if ($modal == 1) {
            echo "
                <script>
                    $(document).ready(function(){
                        $('#login').modal('show');
                    });
                </script>
            ";
        } else {
            echo "";
        }
        
    ?>
     
  </body>
</html>