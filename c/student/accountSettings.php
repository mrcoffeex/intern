<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Account Settings";

    $selectProfile = selectProfile($userCode);
    $profile=$selectProfile->fetch(PDO::FETCH_ASSOC);

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

    <section class="site-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>
                                <span class="text-primary">Account Settings</span>
                                <span class="float-right">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#account">
                                        <i class="icon-pencil" title="click to edit ..."></i>
                                    </button>
                                </span>
                            </h5>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="mb-0">Fullname</p>
                                        <code><?= $userFullname ?></code>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="mb-0">Email</p>
                                        <code><?= $userEmail ?></code>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p class="mb-0">Password</p>
                                        <code>*******************</code>
                                    </div>
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

    <div class="modal fade" id="account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header m-2">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Account Settings</h5>
                    <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                </div>
                <div class="modal-body m-2">
                    <form action="updateAccount" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.updateAccountBtn)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input 
                                    type="email" 
                                    class="form-control" 
                                    name="userEmail" 
                                    id="userEmail" 
                                    value="<?= $userEmail ?>" 
                                    maxlength="100"
                                    required>
                                </div>
                                <small id="emailHelp" class="form-text"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-black" for="fname">Current Password <code>(*leave empty if no changes)</code></label>
                                <div class="input-group">
                                    <input 
                                    type="password" 
                                    class="form-control" 
                                    id="currentPassword" 
                                    name="currentPassword" 
                                    placeholder="**********" 
                                    maxlength="20" 
                                    >
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="button" id="toggleCurrentPassword">
                                            <i class="icon-eye" id="currentEyeIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                <small id="currentPasswordHelp" class="form-text"></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="text-black" for="fname">New Password</label>
                                <div class="input-group">
                                    <input 
                                    type="password" 
                                    class="form-control" 
                                    id="newPassword" 
                                    name="newPassword" 
                                    placeholder="***********" 
                                    maxlength="20" 
                                    >
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="button" id="toggleNewPassword">
                                            <i class="icon-eye" id="newEyeIcon"></i>
                                        </button>
                                    </div>
                                </div>
                                <small id="newPasswordHelp" class="form-text"></small>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button 
                                    type="submit" 
                                    id="updateAccountBtn" 
                                    class="btn btn-primary btn-block">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

    <script src="../../js/accountSettings.js"></script>
     
  </body>
</html>