<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "InternShips";

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
                <div class="col-lg-5">
                    <form action="" method="post">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="text-center">Keyword Search</h5>
                                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="ex. Customer Service Davao City" autofocus required>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><span class="text-primary"><i class="icon-filter"></i></span> Filters</h5>
                                
                                <div class="form-group">
                                    <label for="">Job Category</label>
                                    <input type="text" class="form-control" name="category" id="category" placeholder="ex. Web Developer">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-12 p-0">Locations</label>
                                    <textarea name="locations" id="setLocations" rows="3">Davao City,Cebu City,Manila,Quezon,Tarlac</textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type1" value="full" checked>
                                    <label class="form-check-label" for="type1">Full-Time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="type2" value="part" >
                                    <label class="form-check-label" for="type2">Part-Time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="base1" value="office" checked>
                                    <label class="form-check-label" for="base1">Office-based</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="base2" value="home" >
                                    <label class="form-check-label" for="base2">Home-based</label>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">Desired minimum monthly salary <span class="text-primary">PHP <span id="salaryMinimumValue">20000</span></span></label>
                                    <input type="range" class="form-control" name="salaryMinimum" id="salaryMinimum" min="10000" max="100000" step="5000" value="20000" required>
                                </div>
                                <div class="form-group float-right">
                                    <button type="button" class="btn btn-default text-primary">Clear all</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7">

                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="text-bold">Media & Public Relations (PR)</h5>
                            </a>
                            <h6 class="text-bold mb-3">Divine Company</h6>

                            <p class="text-dark"><i class="icon-map-marker"></i> Davao City</p>

                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">start date</p>
                                    <p class="text-primary">Immediately</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">duration</p>
                                    <p class="text-dark">6 months</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">Salary</p>
                                    <p class="text-dark">15,000 - 30,0000 /month</p>
                                </div>
                            </div>

                            <span class="badge badge-secondary">Part-time</span>
                            <span class="badge badge-secondary">Home-based</span>
                            <span class="badge badge-info">InternShip</span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="text-bold">Web Developer Apprentice</h5>
                            </a>
                            <h6 class="text-bold mb-3">Growify Digital</h6>

                            <p class="text-dark"><i class="icon-map-marker"></i> Davao City</p>

                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">start date</p>
                                    <p class="text-primary">Immediately</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">duration</p>
                                    <p class="text-dark">3 months</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">Salary</p>
                                    <p class="text-dark">10,000 - 25,0000 /month</p>
                                </div>
                            </div>

                            <span class="badge badge-dark">Full-time</span>
                            <span class="badge badge-dark">Office-based</span>
                            <span class="badge badge-info">InternShip</span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-dark">
                                <h5 class="text-bold">Intern Software Developer</h5>
                            </a>
                            <h6 class="text-bold mb-3">Digitals Co.</h6>

                            <p class="text-dark"><i class="icon-map-marker"></i> Davao City</p>

                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">start date</p>
                                    <p class="text-primary">Immediately</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">duration</p>
                                    <p class="text-dark">6 months</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <p class="text-uppercase text-bold">Salary</p>
                                    <p class="text-dark">17,000 - 21,0000 /month</p>
                                </div>
                            </div>

                            <span class="badge badge-dark">Full-time</span>
                            <span class="badge badge-dark">Office-based</span>
                            <span class="badge badge-info">InternShip</span>
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