<?php  
    require '../../config/includes.php';
    require '_session.php';

    $appId = clean_int($_GET['appId']);

    $getSubmission=selectSubmission($appId);
    $sub=$getSubmission->fetch(PDO::FETCH_ASSOC);

    if ($sub['app_hired'] == "0000-00-00 00:00:00") {
        $hired = "";
    } else {
        $hired = proper_date($sub['app_hired']);
    }

    if (empty($sub['app_certificate'])) {
        $certificate = "not available";
    } else {
        $certificate = "
            <a href='download?token=" . my_rand_str(50) . "&postId=" . $sub['post_id'] . "'>
                <button type='button' class='btn btn-primary btn-sm'>Download Certificate</button>
            </a>
        ";
    }

    $title = "Internship | " . getBusinessName($sub['app_business']);
    
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

                <div class="col-lg-12">

                    <div class="card mb-2">
                        <div class="card-body">
                            <h4 class="card-title"><?= getBusinessName($sub['app_business']) ?> <span class="badge badge-secondary"><?= $sub['app_status'] ?></span></h4>
                            <p class="mb-0 text-dark">Date Hired: <?= $hired ?></p>
                            <p class="mb-0 text-dark text-bold">Certificate: <?= $certificate ?></p>
                            <h3 class="mb-4 text-dark text-bold">Hours: <span class="text-primary"><?= $sub['app_hours'] ?></span> / <?= $sub['app_school_hours'] ?></h3>

                            <h4>Task</h4>
                            <div><?= $sub['app_task'] ? $sub['app_task'] : 'No task' ?></div>
                        </div>
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
     
  </body>
</html>