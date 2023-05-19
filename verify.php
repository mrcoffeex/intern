<?php  
    require 'config/includes.php';

    $title = "Verify Email";
    
    $ucode = clean_string($_GET['ucode']);

    if (empty($ucode)) {
        header("location: 404");
    }else{
        if (verifyUserCode($ucode) == false) {
            header("location: 404");
        }else{
            // check if already verified
            if (checkUserVerification($ucode) == true) {
                header("location: index?modal=1");
            }
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
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section"></section>

    <section class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="text-capitalize">Verify your Email</h2>
                    <p class="mb-0">
                        A code has been sent to <span class="text-primary"><?= getUserEmail($ucode) ?></span>. 
                    </p>
                    <p class="mb-2">
                        If you didn't receive an email try 
                        <a href="verifyResend?token=<?= my_rand_str(30) ?>&ucode=<?= $ucode ?>">send again.</a>
                    </p>
                    <form 
                    class="p-4 border rounded card-shadow" 
                    enctype="multipart/form-data" 
                    method="POST" 
                    action="verifyAccount?token=<?= my_rand_str(30) ?>&ucode=<?= $ucode ?>" 
                    onsubmit="btnLoader(this.submitOTP)"
                    >

                        <div class="position-relative p-2 text-center">
                            <h5>Please enter your verification code</h5>
                            <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                                <input class="m-1 text-center form-control rounded text-bold" type="text" name="first" id="first" maxlength="1" autofocus /> 
                                <input class="m-1 text-center form-control rounded text-bold" type="text" name="second" id="second" maxlength="1" /> 
                                <input class="m-1 text-center form-control rounded text-bold" type="text" name="third" id="third" maxlength="1" /> 
                                <input class="m-1 text-center form-control rounded text-bold" type="text" name="fourth" id="fourth" maxlength="1" /> 
                                <input class="m-1 text-center form-control rounded text-bold" type="text" name="fifth" id="fifth" maxlength="1" /> 
                                <input class="m-1 text-center form-control rounded text-bold" type="text" name="sixth" id="sixth" maxlength="1" /> 
                            </div>
                            <div class="mt-4"> 
                                <button type="submit" id="submitOTP" class="btn btn-primary px-4 validate">Submit</button> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <?php include '_footer.php'; ?>
  
  </div>

    <?php include '_modals.php'; ?>
    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

    <script src="js/verification.js"></script>
     
  </body>
</html>