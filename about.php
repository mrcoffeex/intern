<?php  
    require 'config/includes.php';

    $title = "About";
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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/intern/about.jpg');" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mt-5 mb-4 text-center">
              <h1 class="text-white font-weight-bold text-capitalize">we are <span class="text-primary"><?= $projectName ?></span></h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <h2 class="section-title mb-5 text-primary text-center">Our Vision</h2>
            <p class="text-justify">
              We understand the importance of practical exposure in shaping the future of talented individuals. We strive to create a supportive and immersive environment where interns can gain invaluable skills, expand their professional networks, and make meaningful contributions to real projects. Our goal is to empower interns with the tools and knowledge they need to excel in their chosen fields.
            </p>

            <div class="row mt-5">
              <div class="col-md-6 mb-5">
                <div class="card card-flex">
                  <div class="card-body card-body-flextext-justify">
                    <b>Quality Internships</b> We partner with renowned companies and organizations across various industries to offer high-quality internship placements. We ensure that each internship aligns with the intern's interests, skills, and career goals. By providing challenging and rewarding experiences, we aim to foster personal and professional growth.
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="card card-flex">
                  <div class="card-body card-body-flextext-justify">
                    <b>Mentorship and Guidance</b> We believe that mentorship plays a vital role in an intern's development. Our experienced mentors provide guidance, support, and regular feedback to help interns navigate their internship journey successfully. We encourage open communication and foster a collaborative environment where interns can freely seek advice and learn from industry experts.
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="card card-flex">
                  <div class="card-body card-body-flextext-justify">
                    <b>Skill Enhancement</b> At InternBuilders, we go beyond providing mere work experience. We offer a range of skill-building workshops, training sessions, and educational resources to enhance interns' competencies. Through our carefully curated programs, interns can acquire valuable technical skills, improve their communication abilities, and develop essential workplace proficiencies.
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-5">
                <div class="card card-flex">
                  <div class="card-body card-body-flextext-justify">
                    <b>Continued Support</b> Our commitment to interns extends beyond the duration of their internships. We remain engaged with our alumni, providing ongoing support, career guidance, and access to job opportunities. We take pride in witnessing our interns evolve into successful professionals and serve as ambassadors for the InternBuilders community.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="site-section pt-0">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3 text-primary">Our Team</h2>
          </div>
        </div>

        <div class="row align-items-center block__69944">

          <div class="col-md-6">
            <img src="images/person_6.jpg" alt="Image" class="img-fluid mb-4 rounded">
          </div>

          <div class="col-md-6">
            <h3>Elisabeth Smith</h3>
            <p class="text-muted">Creative Director</p>
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>

          <div class="col-md-6 order-md-2 ml-md-auto">
            <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-4 rounded">
          </div>

          <div class="col-md-6">
            <h3>Chintan Patel</h3>
            <p class="text-muted">Creative Director</p>
            <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae voluptatibus ut? Ex vel  ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi velit?.</p>
            <div class="social mt-4">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
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