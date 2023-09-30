<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Profile";

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

    <section class="site-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-3">
                    <h1 class="text-center text-uppercase">My Profile</h1>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body p-5">
                            <div class="row mb-4">
                                <div class="col-md-2 mb-2">
                                    <img src="<?= displayImage($userProfileImg, '../../imagebank/', 'profile_default') ?>" class="profile-img">
                                </div>
                                <div class="col-md-10 mt-1">
                                    <h2 class="text-bold text-dark">
                                        <?= $userFullname ?> <small><a href="#" data-toggle="modal" data-target="#intro" class="text-decoration-none"><i class="icon-pencil"></i></a></small>
                                    </h2>
                                    <h6 class="text-bold">
                                        <?= dataVerify($profile['profile_course'], 'No Course') ?>
                                    </h6>
                                    <h6>
                                        <?= dataVerify(getSchoolName($profile['school_id']), 'No School') ?>
                                    </h6>
                                    <h6 class="text-primary mb-3">
                                        <i class="icon-map-marker"></i> 
                                        <?= dataVerify($profile['profile_country'], 'No Country') ?>
                                    </h6>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-4 mt-4">
                                <div class="col-md-3">
                                    <p>About Me</p>
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <textarea class="form-control border-radius-none" name="aboutMe" id="aboutMe" rows="3" placeholder="tell me about yourself ..." maxlength="255"><?= $profile['profile_about_me'] ?></textarea>
                                        <small id="aboutMeHelpText" class="form-text float-left"></small>
                                        <small id="aboutMeCharCount" class="form-text float-right"><?= strlen($profile['profile_about_me']) . "/255" ?></small>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-4 mt-4">
                                <div class="col-md-3">
                                    <p>Permanent Address</p>
                                </div>
                                <div class="col-lg-9">
                                    <p class="text-dark"><?= dataVerify($profile['profile_address'], 'No Address') . " " . dataVerify(getCityName($profile['city_id']), 'No City') ?></p>
                                </div>
                            </div>

                            <div class="row mb-4 mt-4">
                                <div class="col-md-3">
                                    <p>Gender</p>
                                </div>
                                <div class="col-lg-9">
                                    <p class="text-dark"><?= dataVerify($profile['profile_gender'], 'please select your gender') ?></p>
                                </div>
                            </div>

                            <div class="row mb-4 mt-4">
                                <div class="col-md-3">
                                    <p>Mobile #</p>
                                </div>
                                <div class="col-lg-9">
                                    <p class="text-dark"><?= dataVerify($profile['profile_contact'], 'please provide your mobile number') ?></p>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#personalInfo">
                                        Edit
                                    </button>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-4 mt-4">
                                <div class="col-md-3">
                                    <p>Skills</p>
                                </div>
                                <div class="col-lg-9">
                                    <form action="updateSkills" method="post" onsubmit="btnLoader(this.skillsBtn)">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <select class="js-example-basic-multiple w-100" multiple="multiple" name="skills[]" id="skills">
                                                        <?php  
                                                            $tagsArray = explode(',', $profile['profile_skills']);
                                                            foreach ($tagsArray as $tags) {
                                                                echo '<option value="'.$tags.'" selected>'.$tags.'</option>';
                                                            }
                                                        ?>

                                                        <?php  
                                                            $getSKills=selectSkills();
                                                            while ($skill=$getSKills->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <option value="<?= $skill['skill_name'] ?>"><?= $skill['skill_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <small id="skillsHelpText" class="form-text"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" id="skillsBtn" class="btn btn-outline-primary btn-sm">Update Skills</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-4 mt-4">
                                <div class="col-md-3">
                                    <p>
                                        Job Experience 
                                    </p>
                                    
                                </div>
                                <div class="col-lg-9">
                                    <?php  
                                        $selectExp=selectStudentExp($userCode);
                                        $count=$selectExp->rowCount();
                                        if (empty($count)) {
                                            echo "<code>if you have any job experiences please add it here</code>";
                                        }
                                        while ($exp=$selectExp->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class="card card-body mb-1">
                                        <h6 class="text-bold mb-0"><?= $exp['exp_position'] ?></h6>
                                        <p class="mb-0"><?= $exp['exp_company'] ?></p>
                                        <p class="mb-0"><i class="icon-map-marker"></i> <?= $exp['exp_city'] ?></p>
                                        <p class="mb-0"><span class="badge"><?= $exp['exp_from'] ?> - <?= $exp['exp_to'] ?> . <?= getTimeDiff($exp['exp_from'], $exp['exp_to']) ?></span></p>
                                        <p class="mb-0">Description: <?= $exp['exp_job_desc'] ?></p>
                                        <a href="expRemove?expId=<?= $exp['exp_id'] ?>" class="text-decoration-none">
                                            <i class="icon-trash"></i> Remove
                                        </a>
                                    </div>
                                    <?php } ?>

                                    <br>

                                    <div class="mt-1">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exp">
                                            <i class="icon-plus" title="click to add ..."></i> Add
                                        </button>
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

    <div class="modal fade" id="intro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header m-2">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Intro</h5>
                    <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                </div>
                <div class="modal-body m-2">
                    <form action="updateIntro" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.updateIntroBtn)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Profile Image (150 x 150 pixels)</label>
                                    <input type="file" class="dropify" accept="images/jpg, images/png" name="profileImg">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="fname" 
                                    id="fname" 
                                    value="<?= $row['user_fname'] ?>" 
                                    required>
                                    <small id="fnameHelpText" class="form-text"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="lname" 
                                    id="lname" 
                                    value="<?= $row['user_lname'] ?>" 
                                    required>
                                    <small id="lnameHelpText" class="form-text"></small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="course" 
                                    id="course" 
                                    maxlength="255" 
                                    value="<?= $profile['profile_course'] ?>" 
                                    list="myCourses" 
                                    autocomplete="off" 
                                    required>
                                    <datalist id="myCourses"></datalist>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">School / College / University</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="school" 
                                    id="school" 
                                    maxlength="255" 
                                    value="<?= getSchoolName($profile['school_id']) ?>" 
                                    list="mySchools" 
                                    autocomplete="off" 
                                    required>
                                    <datalist id="mySchools"></datalist>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="country" 
                                    id="country" 
                                    maxlength="100" 
                                    value="<?= $profile['profile_country'] ?>" 
                                    list="myCountries" 
                                    autocomplete="off" 
                                    required>
                                    <datalist id="myCountries"></datalist>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button 
                                    type="submit" 
                                    id="updateIntroBtn" 
                                    class="btn btn-primary btn-block">
                                        Update Intro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="personalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header m-2">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Personal Information</h5>
                    <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                </div>
                <div class="modal-body m-2">
                    <form action="updatePersonalInfo" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.updatePersonalInfoBtn)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">House Number, Street</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="address" 
                                    id="address" 
                                    value="<?= $profile['profile_address'] ?>" 
                                    maxlength="255"
                                    required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">City</label>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+63</span>
                                        </div>
                                        <input type="text" class="form-control" name="contact" id="contact" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button 
                                    type="submit" 
                                    id="updatePersonalInfoBtn" 
                                    class="btn btn-primary btn-block">
                                        Update Personal Info
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header m-2">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Job Experience</h5>
                    <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                </div>
                <div class="modal-body m-2">
                    <form action="expCreate" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.addExp)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Position</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="position" 
                                    id="position" 
                                    maxlength="100"
                                    list="myPositions" 
                                    autocomplete="off" 
                                    required>
                                    <datalist id="myPositions"></datalist>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Company</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="company" 
                                    id="company" 
                                    maxlength="100"
                                    list="myCompanies" 
                                    autocomplete="off" 
                                    required>
                                    <datalist id="myCompanies"></datalist>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Started</label>
                                    <input 
                                    type="date" 
                                    class="form-control" 
                                    name="expFrom" 
                                    id="expFrom" 
                                    required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Ended</label>
                                    <input 
                                    type="date" 
                                    class="form-control" 
                                    name="expTo" 
                                    id="expTo" 
                                    required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <select name="expCity" id="expCity" class="form-control">
                                        <option></option>
                                        <?php  
                                            $getCities = selectCities();
                                            while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option><?= $city['city_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Job Description</label>
                                    <textarea class="form-control" name="jobDesc" id="jobDesc" rows="3" placeholder="..." maxlengh="255"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button 
                                    type="submit" 
                                    id="addExp" 
                                    class="btn btn-primary btn-block">
                                        Add Experience
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

    <script src="../../js/profile.js"></script>
     
  </body>
</html>