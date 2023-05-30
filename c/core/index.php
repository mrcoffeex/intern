<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Hello! " . $userFullname;
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

                        <div class="col-md-12 transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Businesses</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countBusinessProfiles() ?></span> counts
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Students</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countStudents() ?></span> counts
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Schools</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countSchools() ?></span> counts
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
                                    <p class="card-title"><i class="ti-files"></i> School Access Requests</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th>User</th>
                                                    <th class="text-center">School</th>
                                                    <th class="text-center">Position</th>
                                                    <th class="text-center">Attachments</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Opt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $getRecent=selectRequirements();
                                                    while ($recent=$getRecent->fetch(PDO::FETCH_ASSOC)) {

                                                        if ($recent['require_status'] == "approve") {
                                                            $tableSkin = "table-primary";
                                                        } else {
                                                            $tableSkin = "table-warning";
                                                        }
                                                        
                                                ?>
                                                <tr class="<?= $tableSkin ?>">
                                                    <td><?= getUserFullnameByCode($recent['user_code']) ?></td>
                                                    <td class="text-center"><?= getSchoolName($recent['school_id']) ?></td>
                                                    <td class="text-center"><?= $recent['require_position'] ?></td>
                                                    <td class="text-center">
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-primary btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#att_<?= $recent['require_id'] ?>" >
                                                            <i class="ti-image"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center"><span class="badge badge-dark"><?= $recent['require_status'] ?></span></td>
                                                    <td class="text-center">
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-success btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#approve_<?= $recent['require_id'] ?>" >
                                                            <i class="ti-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="att_<?= $recent['require_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-image"></i> Attachments</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="owl-carousel owl-theme full-width">
                                                                    <div class="item">
                                                                        <img src="<?= previewImage($recent['require_attachment1'], '../../images/blank.png', '../../imagebank/') ?>" alt="image"/>
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="<?= previewImage($recent['require_attachment2'], '../../images/blank.png', '../../imagebank/') ?>" alt="image"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="approve_<?= $recent['require_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-check"></i> Approve Request</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="requestApprove?token=<?= my_rand_str(30) ?>&reqId=<?= $recent['require_id'] ?>" method="post" onsubmit="btnLoader(this.approveBtn)">
                                                                <div class="modal-body">
                                                                    <p class="text-center">Are you sure you want to approve <span class="text-success"><?= getUserFullnameByCode($recent['user_code']) ?></span> request?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="approveBtn" class="btn btn-success btn-block">Approve Request</button>
                                                                </div>
                                                            </form>
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
    <?php include '_alerts.php'; ?>

</body>

</html>

