<?php  
    require 'config/includes.php';

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
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/intern/contact.jpg');" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mt-5 mb-4 text-center">
              <h1 class="text-white font-weight-bold text-capitalize">Contact Us</h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="section-title mb-5 text-primary">Contact Form</h2>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body">
                <form action="sendRequest" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.createRequest)">
                  <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                      <label class="text-black" for="fname">Full Name</label>
                      <input type="text" id="fullName" name="fullName" class="form-control" required>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="email">Email</label> 
                      <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <label class="text-black" for="message">Message</label> 
                      <textarea name="messageText" id="messageText" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..." required></textarea>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-12">
                      <button type="submit" id="createRequest" class="btn btn-primary btn-md text-white">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="mb-3 bg-white">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2 text-center">
                      <span class="icon-map icon-lg text-primary"></span>
                    </div>
                    <div class="col-md-10">
                      <p class="mb-0 font-weight-bold">Address</p>
                      <p class="mb-0">Ecoland, Davao City, Philippines 8000</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2 text-center">
                      <span class="icon-phone icon-lg text-primary"></span>
                    </div>
                    <div class="col-md-10">
                      <p class="mb-0 font-weight-bold">Phone</p>
                      <p class="mb-0"><a href="#">+1 232 3235 324</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2 text-center">
                      <span class="icon-envelope icon-lg text-primary"></span>
                    </div>
                    <div class="col-md-10">
                      <p class="mb-0 font-weight-bold">Email Address</p>
                      <p class="mb-0"><a href="#">internbuilders@gmail.com</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title mb-3">Happy <span class="text-primary">Interns</span> Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <div>
                  <h3>Elisabeth Smith</h3>
                  <span class="position">Creative Director</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="block__87154 bg-white rounded">
              <blockquote>
                <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
              </blockquote>
              <div class="block__91147 d-flex align-items-center">
                <div>
                  <h3>Chris Peter</h3>
                  <span class="position">Web Designer</span>
                </div>
              </div>
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
     
  </body>
</html>