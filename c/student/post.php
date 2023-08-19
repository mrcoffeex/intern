<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    $getPost=selectPostById($postId);
    $post=$getPost->fetch(PDO::FETCH_ASSOC);

    //add post views
    updatePostViews($postId);

    $title = $post['post_category'];
    
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
                            <p class="text-secondary">
                                Posted <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?>
                                <span class="float-right"><?= countApplicants($postId) ?> applicants</span>
                            </p>

                            <h5 class="text-bold"><?= $post['post_category'] ?></h5>
                            <h6 class="text-bold mb-2"><?= getBusinessName($post['user_code']) ?></h6>

                            <p class="text-dark small-text"><i class="icon-map-marker"></i> <?= getCityName($post['city_id']) ?></p>

                            <div class="row mb-4">
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

                                <div class="col-md-12 mt-4">
                                    <p class="text-bold"><?= $post['post_title'] ?></p>
                                </div>

                                <div class="col-md-12">
                                    <div><?= $post['post_description'] ?></div>
                                </div>
                            </div>

                            <?php  
                                $tagsArray = explode(',', $post['post_tags']);
                                foreach ($tagsArray as $tags) {
                            ?>

                            <span class="badge badge-secondary"><?= $tags ?></span>

                            <?php } ?>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button 
                                    type="button" 
                                    class="btn btn-primary" 
                                    data-toggle="modal" 
                                    data-target="#apply" 
                                    <?= applyBtnStatus($userCode, $postId) ?> ><?= applyBtnStatusLabel($userCode, $postId) ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <?php include '_footer.php'; ?>
  
  </div>

    <!-- modals -->

    <div class="modal fade" id="apply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header m-2">
                    <h5 class="modal-title" id="exampleModalLabel">Application Requirements</h5>
                    <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                </div>
                <div class="modal-body m-2">
                    <form action="postApply?token=<?= my_rand_str(30) ?>&postId=<?= $postId ?>" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.applyJob)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Drop your Resume / CV</label>
                                    <input type="file" class="dropify" accept=".pdf,.doc,.docx,.txt" name="document" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button 
                                    type="submit" 
                                    id="applyJob" 
                                    class="btn btn-primary btn-block" >
                                        Submit Application
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
    <?php include '_modals.php'; ?>
    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>
     
  </body>
</html>