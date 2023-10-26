<?php  
    require 'config/includes.php';

    $title = "Email Verified";
    
    $ucode = clean_string($_GET['ucode']);

    if (empty($ucode)) {
        header("location: 404");
    }else{
        if (verifyUserCode($ucode) == false) {
            header("location: 404");
        }
    }

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
    <section class="section-hero overlay inner-page bg-image bg-primary" id="home-section"></section>

    <section class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="text-capitalize">Congratulations!</h2>
                    <p class="mb-4">Your email <span class="text-primary"><?= getUserEmail($ucode) ?></span> has been verified.</p>

                    <img src="images/verified.png" class="img-fluid" alt="verified ..." style="width: 300px;">
                    
                    <br>
                    
                    <a href="./">
                        <button type="button" class="btn btn-secondary">Homepage</button>
                    </a>
                    <button type="button" data-toggle="modal" data-target="#login" class="btn btn-primary">Login Now</button>
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