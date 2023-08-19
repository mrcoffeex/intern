<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Unverified Students";
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

                        <div class="col-md-12 transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Unverified Students</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countUnVerifiedStudentsBySchool($schoolId) ?></span> counts
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-close"></i> Unverified List</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th>Fullname</th>
                                                    <th class="text-center">Verified</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Business/Company</th>
                                                    <th class="text-center">Date Applied</th>
                                                    <th class="text-center">Date Hired</th>
                                                    <th class="text-center">Hours</th>
                                                    <th class="text-center">Tasks</th>
                                                    <th class="text-center">Certificate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $getRecent=selectUnverifiedStudent($schoolId);
                                                    while ($recent=$getRecent->fetch(PDO::FETCH_ASSOC)) {

                                                        if ($recent['app_hired'] == "0000-00-00 00:00:00") {
                                                            $hired = "";
                                                        } else {
                                                            $hired = proper_date($recent['app_hired']);
                                                        }

                                                        if (empty($recent['app_certificate'])) {
                                                            $certificate = "not available";
                                                        } else {
                                                            $certificate = "
                                                                <a href='download?token=" . my_rand_str(50) . "&postId=" . $recent['post_id'] . "&ucode=" . $recent['app_applicant'] . "'>
                                                                    <button type='button' class='btn btn-info btn-sm'><i class='ti-download'></i></button>
                                                                </a>
                                                            ";
                                                        }
                                                ?>
                                                <tr class="table-<?= studentVerificationSkin($recent['profile_verified']) ?>">
                                                    <td><?= getUserFullnameByCode($recent['user_code']) ?></td>
                                                    <td class="text-center"><?= studentVerification($recent['profile_verified']) ?></td>
                                                    <td class="text-center"><span class="badge badge-dark"><?= $recent['app_status'] ?></span></td>
                                                    <td class="text-center"><?= getBusinessName($recent['app_business']) ?></td>
                                                    <td class="text-center"><?= proper_date($recent['app_created']) ?></td>
                                                    <td class="text-center"><?= $hired ?></td>
                                                    <td class="text-center"><h4><?= $recent['app_hours'] ?> / <?= $recent['app_school_hours'] ?></h4></td>
                                                    <td class="text-center">
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-primary btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#task_<?= $recent['app_id'] ?>">
                                                            <i class="ti-list"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $certificate ?>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="task_<?= $recent['app_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header m-2">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i class="ti-list"></i> <?= getUserFullnameByCode($recent['user_code']) ?> Tasks</h5>
                                                                <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div>
                                                                            <?= $recent['app_task'] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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

</body>

</html>

