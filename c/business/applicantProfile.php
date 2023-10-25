<?php  
    require '../../config/includes.php';
    require '_session.php';

    $ucode = clean_string($_GET['ucode']);

    $getApplicant=selectProfile($ucode);
    $applicant=$getApplicant->fetch(PDO::FETCH_ASSOC);

    $title = getUserFullnameByCode($ucode) . "'s profile";

    if ($applicant['profile_verified'] == 1) {
        $verified = "verified";
        $verifiedIcon = "<span class='badge badge-primary'>verified</span>";
    } else {
        $verified = "unverified";
        $verifiedIcon = "<span class='badge badge-danger'>unverified</span>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include '_head.php'; ?>

<body class="sidebar-dark">
    <div class="container-scroller">
        
        <?php include '_navbar.php'; ?>
        
        <div class="container-fluid page-body-wrapper">

        <?php include '_sidebar.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    
                    <?php include '_breads.php'; ?>

                    <div class="row">
                        
                        <?php 
                            include '_reminder.php';
                        ?>

                    </div>

                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-md-12 mb-3">
                                            <img src="<?= previewImage(getUserImg($ucode), '../../images/profile_default.png', '../../imagebank/') ?>" class="profile-img mb-2" alt="">

                                            <h5 class="text-bold text-dark">
                                                <?= getUserFullnameByCode($ucode) . " " . $verifiedIcon ?>
                                            </h5>
                                            <h6 class="text-bold">
                                                <?= dataVerify($applicant['profile_course'], 'No Course') ?>
                                            </h6>
                                            <h6>
                                                <?= dataVerify(getSchoolName($applicant['school_id']), 'No School') ?>
                                            </h6>
                                            <h6 class="text-primary mb-3">
                                                <i class="icon-map-marker"></i> 
                                                <?= dataVerify($applicant['profile_country'], 'No Country') ?>
                                            </h6>
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <?php  
                                                $skills = explode(',', $applicant['profile_skills']);
                                                foreach ($skills as $skill) {
                                            ?>
                                            <span class="badge badge-dark"><?= $skill ?></span>&nbsp;
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h4 class="mb-3">Contact Information</h4>
                                    <p>
                                        Mobile #:
                                        <?= $applicant['profile_contact'] ?>
                                    </p>
                                    <p>
                                        Email:
                                        <?= getUserEmail($ucode) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4>Experiences</h4>
                                    <?php  
                                        $selectExp=selectStudentExp($ucode);
                                        $count=$selectExp->rowCount();
                                        if (empty($count)) {
                                            echo "<code>no job experience</code>";
                                        }
                                        while ($exp=$selectExp->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                    <div class="card card-body mb-2">
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
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4>About Me</h4>
                                    <p class="text-justify mt-3">
                                        <?= $applicant['profile_about_me'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php include '_footer.php'; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- modals -->

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

    <script src="../../js/postCreateForm.js"></script>

</body>

</html>

