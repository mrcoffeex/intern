<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Support";
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
            <h3 class="mb-4">Contacting Technical Support</h3>
            <p class="text-justify text-black mb-4">
            We understand that sometimes things can go wrong with technology, and we're here to help. Our technical support team is available to assist you with any issues you may encounter while using our website or applications. Please review the information below to learn more about our technical support services.
            </p>
            <p class="text-justify text-black mb-4">
            If you need technical assistance, you can contact our support team via email or phone. Our support hours are Monday to Friday, 9:00 AM to 5:00 PM Pacific Standard Time. Please be sure to provide as much detail as possible about the issue you're experiencing, including any error messages or screenshots.
            </p>
            <p class="text-black text-bold">
                Email:&nbsp;
                <span class="text-primary">interbuilders@gmail.com</span>&nbsp;
                Cel #:&nbsp;
                <span class="text-primary">0912 312 3123</span>&nbsp;
            </p>
          </div>
        </div>
      </div>
    </section>
    
    <?php include '_footer.php'; ?>
  
  </div>
    <?php include '_modals.php'; ?>
    <?php include '_scripts.php'; ?>
     
  </body>
</html>