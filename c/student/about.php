<?php  
    require '../../config/includes.php';
    require '_session.php';

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
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('../../images/hero_1.jpg');" id="home-section"></section>

    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2 class="mb-4 text-capitalize">we are <span class="text-primary"><?= $projectName ?></span></h2>
            <p class="text-justify text-black mb-4">
            InternBuilders is a dynamic and innovative company dedicated to providing exceptional internship opportunities to aspiring young professionals. Our primary focus is to bridge the gap between classroom learning and real-world work experience, enabling students and graduates to kick-start their careers with confidence.
            <br><br>
            At InternBuilders, we understand the importance of practical exposure in shaping the future of talented individuals. We strive to create a supportive and immersive environment where interns can gain invaluable skills, expand their professional networks, and make meaningful contributions to real projects. Our goal is to empower interns with the tools and knowledge they need to excel in their chosen fields.
            <br><br>
            Our Commitment:
            </p>
            <ol class="text-justify text-black">
                <li>
                    Quality Internships: We partner with renowned companies and organizations across various industries to offer high-quality internship placements. We ensure that each internship aligns with the intern's interests, skills, and career goals. By providing challenging and rewarding experiences, we aim to foster personal and professional growth.
                </li>
                <li>
                    Mentorship and Guidance: We believe that mentorship plays a vital role in an intern's development. Our experienced mentors provide guidance, support, and regular feedback to help interns navigate their internship journey successfully. We encourage open communication and foster a collaborative environment where interns can freely seek advice and learn from industry experts.
                </li>
                <li>
                    Skill Enhancement: At InternBuilders, we go beyond providing mere work experience. We offer a range of skill-building workshops, training sessions, and educational resources to enhance interns' competencies. Through our carefully curated programs, interns can acquire valuable technical skills, improve their communication abilities, and develop essential workplace proficiencies.
                </li>
                <li>
                    Networking Opportunities: We recognize the significance of networking in today's professional landscape. InternBuilders hosts networking events, industry panels, and social gatherings, facilitating connections between interns, professionals, and potential employers. These interactions enable interns to expand their professional network and explore future career prospects.
                </li>
                <li>
                    Continued Support: Our commitment to interns extends beyond the duration of their internships. We remain engaged with our alumni, providing ongoing support, career guidance, and access to job opportunities. We take pride in witnessing our interns evolve into successful professionals and serve as ambassadors for the InternBuilders community.
                </li>
            </ol>
            <p class="text-justify text-black mt-4">
                Join InternBuilders:
                <br><br>
                Whether you're a student looking for hands-on experience or a graduate seeking to launch your career, InternBuilders offers a platform for you to gain practical skills, make lasting connections, and unlock your potential. We are passionate about empowering the next generation of professionals and shaping a brighter future.
                <br><br>    
                Embark on an enriching internship journey with InternBuilders and let us help you build a solid foundation for your future success.
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