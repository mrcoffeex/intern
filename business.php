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
                <h2 class="mb-4 text-capitalize">Join us @ <span class="text-primary"><?= $projectName ?></span></h2>
            </div>
          <div class="col-md-6">
            <form class="p-4 border rounded card-shadow equal-height" enctype="multipart/form-data" method="POST" action="businessRegister" onsubmit="btnLoader(this.regBusinessBtn)">

                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="text-black" for="studentFname">Business Name</label>
                        <input 
                        type="text" 
                        name="businessName" 
                        id="businessName" 
                        class="form-control" 
                        placeholder="ex. Krazy Apps PH"
                        autofocus required>
                        <small id="businessNameHelp" class="form-text"></small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="text-black" for="city">City</label>
                        <select name="city" id="city" class="form-control">
                            <option value=""></option>
                            <?php  
                                $getCities = selectCities();
                                while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="businessEmail">Email</label>
                  <input 
                  type="email" 
                  name="businessEmail" 
                  id="businessEmail" 
                  class="form-control" 
                  placeholder="Email address" 
                  maxlength="100" 
                  required>
                  <small id="businessEmailHelp" class="form-text"></small>
                </div>
              </div>
              <div class="row form-group mb-1">
                <div class="col-md-12">
                  <label class="text-black" for="businessPassword">Password</label>
                  <div class="input-group">
                    <input 
                    type="password" 
                    class="form-control" 
                    id="businessPassword" 
                    name="businessPassword" 
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
                    <small id="businessPasswordHelp" class="form-text"></small>
                </div>
              </div>

              <div class="row form-group mb-1">
                <div class="col-md-12 mb-md-0">
                  <p>
                    <small>
                      By signing up, you agree to our 
                      <a href="#" data-bs-toggle="modal" data-bs-target="#terms">Terms and Conditions</a>.
                    </small>
                  </p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 text-center">
                  <button type="submit" id="regBusinessBtn" class="btn btn-primary">Join Now</button>
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
                    <img src="images/join_us.png" class="img-fluid" alt="join us ...">
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

    <script src="js/validateRegBusiness.js"></script>
     
  </body>
</html>