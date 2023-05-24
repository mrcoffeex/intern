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
                                            <th class="text-center">Status</th>
                                            <th>Date Applied</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            $getSubmissions=selectSubmissions($userCode);
                                            while ($sub=$getSubmissions->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?= getBusinessName($sub['app_business']) ?></td>
                                            <td><?= getPostCategory($sub['post_id']) ?></td>
                                            <td class="text-center"><span class="badge badge-secondary"><?= $sub['app_status'] ?></span></td>
                                            <td><?= proper_date($sub['app_created']) ?></td>
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