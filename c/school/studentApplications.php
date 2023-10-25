<?php  
    require '../../config/includes.php';
    require '_session.php';

    $usercode = clean_string($_GET['usercode']);
    $title = getUserFullnameByCode($usercode) . " Applications";
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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-list"></i> List of Applications</p>
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
                                                    $getApp=selectStudentApplications($usercode);
                                                    while ($app=$getApp->fetch(PDO::FETCH_ASSOC)) {

                                                        if ($app['app_hired'] == "0000-00-00 00:00:00") {
                                                            $hired = "";
                                                        } else {
                                                            $hired = proper_date($app['app_hired']);
                                                        }

                                                        if (empty($app['app_certificate'])) {
                                                            $certificate = "not available";
                                                        } else {
                                                            $certificate = "
                                                                <a href='download?token=" . my_rand_str(50) . "&postId=" . $app['post_id'] . "&ucode=" . $app['app_applicant'] . "'>
                                                                    <button type='button' class='btn btn-info btn-sm'><i class='ti-download'></i></button>
                                                                </a>
                                                            ";
                                                        }
                                                ?>
                                                <tr>
                                                    <td><?= getUserFullnameByCode($app['user_code']) ?></td>
                                                    <td class="text-center"><?= studentVerification($app['profile_verified']) ?></td>
                                                    <td class="text-center"><span class="badge badge-dark"><?= $app['app_status'] ?></span></td>
                                                    <td class="text-center"><?= getBusinessName($app['app_business']) ?></td>
                                                    <td class="text-center"><?= proper_date($app['app_created']) ?></td>
                                                    <td class="text-center"><?= $hired ?></td>
                                                    <td class="text-center"><h4><?= $app['app_hours'] ?> / <?= $app['app_school_hours'] ?></h4></td>
                                                    <td class="text-center">
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-primary btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#task_<?= $app['app_id'] ?>">
                                                            <i class="ti-list"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $certificate ?>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="task_<?= $app['app_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header m-2">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i class="ti-list"></i> <?= getUserFullnameByCode($app['user_code']) ?> Tasks</h5>
                                                                <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div>
                                                                            <?= $app['app_task'] ?>
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

