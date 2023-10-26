<?php  
    require 'config/includes.php';

    $title = "Register | Business";
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
            <div class="col-md-12">
                <h2 class="mb-4 text-capitalize">sign up your school @ <span class="text-primary"><?= $projectName ?></span></h2>
            </div>
          <div class="col-md-6">
            <form class="p-4 border rounded card-shadow equal-height" enctype="multipart/form-data" method="POST" action="schoolRegister" onsubmit="btnLoader(this.regSchoolBtn)">

            <div class="row form-group">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">First Name</label>
                        <input 
                        type="text" 
                        name="schoolFname" 
                        id="schoolFname" 
                        class="form-control text-capitalize" 
                        placeholder="John"
                        autofocus required>
                        <small id="fnameHelpText" class="form-text"></small>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="text-black" for="fname">Last Name</label>
                        <input 
                        type="text" 
                        name="schoolLname" 
                        id="schoolLname" 
                        class="form-control text-capitalize" 
                        placeholder="Doe" 
                        required>
                        <small id="lnameHelpText" class="form-text"></small>
                    </div>
                </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Email</label>
                  <input 
                  type="email" 
                  name="schoolEmail" 
                  id="schoolEmail" 
                  class="form-control" 
                  placeholder="Email address" 
                  maxlength="100" 
                  required>
                  <small id="emailHelp" class="form-text"></small>
                </div>
              </div>
              <div class="row form-group mb-4">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Password</label>
                  <div class="input-group">
                        <input 
                        type="password" 
                        class="form-control" 
                        id="schoolPassword" 
                        name="schoolPassword" 
                        placeholder="Password" 
                        maxlength="20" 
                        required>
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" id="togglePasswordButton">
                                <i class="icon-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                  </div>
                </div>
                <div class="col-md-12 mb-3 mb-md-0">
                    <small id="passwordHelp" class="form-text"></small>
                </div>
              </div>

              <div class="row form-group mb-1">
                <div class="col-md-12 mb-md-0">
                  <p>
                    <small>
                      By signing up, you agree to our 
                      <a href="terms" data-bs-toggle="modal" data-bs-target="#terms">Terms and Conditions</a>.
                    </small>
                  </p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 text-center">
                  <button type="submit" id="regSchoolBtn" class="btn btn-primary">Sign Up</button>
                </div>
              </div>

              <div class="form-group">
                <div class=" mb-md-0 text-center">
                  <p>
                      Already registered? <a href="#" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                  </p>
                </div>
              </div>

            </form>
          </div>

            <div class="col-md-6">
                <div class="p-0 border rounded card-shadow equal-height">
                    <img src="images/school.png" class="img-fluid" alt="join us ...">
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

    <script src="js/validateRegSchool.js"></script>
     
  </body>
</html>