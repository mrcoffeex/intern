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
            <div class="row justify-content-center">

                <div class="col-lg-12">

                    <div class="card mb-2">
                        <div class="card-body">
                            <p class="card-title"><?= countSubmissions($userCode) ?> Submissions</p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Business</th>
                                            <th>Category</th>
                                            <th class="text-center">Applied</th>
                                            <th class="text-center">Hired</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Opt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            $getSubmissions=selectSubmissions($userCode);
                                            while ($sub=$getSubmissions->fetch(PDO::FETCH_ASSOC)) {

                                                if ($sub['app_hired'] == "0000-00-00 00:00:00") {
                                                    $hired = "";
                                                    $hireLink = "#";
                                                    $viewBtnStatus = "disabled";
                                                } else {
                                                    $hired = proper_date($sub['app_hired']);
                                                    $hireLink = "submissionView?token=" . my_rand_str(30) . "&appId=" . $sub['app_id'];
                                                    $viewBtnStatus = "";
                                                }
                                                
                                        ?>
                                        <tr>
                                            <td><?= getBusinessName($sub['app_business']) ?></td>
                                            <td><?= getPostCategory($sub['post_id']) ?></td>
                                            <td class="text-center"><?= proper_date($sub['app_created']) ?></td>
                                            <td class="text-center"><?= $hired ?></td>
                                            <td class="text-center"><span class="badge badge-secondary"><?= $sub['app_status'] ?></span></td>
                                            <td class="text-center">
                                                <a href="<?= $hireLink ?>">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#info_<?= $sub['app_id'] ?>" <?= $viewBtnStatus ?> >View</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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