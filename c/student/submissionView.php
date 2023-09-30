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
        $certificate = "certificate not available";
    } else {
        $certificate = "
            <a href='download?token=" . my_rand_str(50) . "&postId=" . $sub['post_id'] . "'>
                <button type='button' class='btn btn-primary btn-sm'>Download Certificate</button>
            </a>
        ";
    }

    if ($sub['app_hired'] == "0000-00-00 00:00:00") {
        $hired = "";
        $hireLink = "#";
        $viewBtnStatus = "disabled";
        $icon = "icon-times-circle";
        $iconTitle = "pending";
    } else {
        $hired = proper_date($sub['app_hired']);
        $hireLink = "submissionView?token=" . my_rand_str(30) . "&appId=" . $sub['app_id'];
        $viewBtnStatus = "";
        $icon = "icon-check-circle";
        $iconTitle = "hired";
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
            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="card card-flex">
                        <div class="card-body card-body-flex">
                            <h4 class="text-bold">
                                <?= getBusinessName($sub['app_business']) ?> <span class="<?= $icon ?>" title="<?= $iconTitle ?>"></span>
                            </h4>
                            <p>
                                Position: <?= getPostCategory($sub['post_id']) ?> <br>
                                Date Hired: <?= proper_date($sub['app_hired']) ?> <br>
                                Hours: <?= $sub['app_school_hours'] ?> h <br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card card-flex">
                        <div class="card-body text-center card-body-flex">
                            <h1 class="text-bold m-0 p-0"><?= $sub['app_hours'] ?></h1>
                            <p class="m-0 p-0">out of <?= $sub['app_school_hours'] ?> hours rendered</p>
                            <p>
                                <span class="badge badge-dark">
                                <?php 
                                    if (empty($sub['app_school_hours']) && empty($sub['app_hours'])) {
                                        echo "incomplete";
                                    } else {
                                        if ($sub['app_hours'] >= $sub['app_school_hours']) {
                                            echo "completed";
                                        } else {
                                            echo "incomplete";
                                        }
                                    }
                                ?>
                                </span>
                            </p>
                            <p class="mb-0 text-dark text-bold"><?= $certificate ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h2 class="mb-4">Job Task</h2>
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