<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Submissions";
    
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

                <div class="col-lg-12">
                    <p class="text-black"><?= countSubmissions($userCode) ?> Submissions</p>
                </div>

                <?php  
                    $getSubmissions=selectSubmissions($userCode);
                    while ($sub=$getSubmissions->fetch(PDO::FETCH_ASSOC)) {

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
                        
                ?>

                <div class="col-md-6">
                    <div class="card card-flex mb-2">
                        <div class="card-body card-body-flex bg-primary text-white" style="border-radius: 3px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="text-bold text-white">
                                        <?= getBusinessName($sub['app_business']) ?> <span class="<?= $icon ?>" title="<?= $iconTitle ?>"></span>
                                    </h4>
                                    <p>
                                        Status: <?= $iconTitle ?> <br>
                                        Position: <?= getPostCategory($sub['post_id']) ?> <br>
                                        <?= getPostTitle($sub['post_id']) ?> <br>
                                    </p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h1 class="text-bold text-white m-0 p-0"><?= $sub['app_hours'] ?></h1>
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
                                </div>
                                <div class="col-md-12">
                                    <a href="<?= $hireLink ?>">
                                        <button type="button" class="btn btn-outline-white btn-sm btn-block">View</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php } ?>
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