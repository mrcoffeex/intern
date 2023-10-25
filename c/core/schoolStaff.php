<?php  
    require '../../config/includes.php';
    require '_session.php';

    $schoolId = clean_int($_GET['schoolId']);
    $getStaffs=selectRequirementsBySchool($schoolId);
    $countStaff=$getStaffs->rowCount();

    $title = getSchoolName($schoolId) . " Staff";
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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">
                                        <i class="ti-home"></i> List of Staff
                                        <span class="float-end text-lowercase"><?= $countStaff ?> result(s)</span>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">Requirements</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Position</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Registered</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    while ($staff=$getStaffs->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td class="text-center">
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-info btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#req_<?= $staff['require_id'] ?>" >
                                                            <i class="ti-image"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center"><?= getUserFullnameByCode($staff['user_code']) ?></td>
                                                    <td class="text-center"><?= $staff['require_position'] ?></td>
                                                    <td class="text-center"><?= $staff['require_status'] ?></td>
                                                    <td class="text-center"><?= proper_date($staff['require_created']) ?></td>
                                                </tr>

                                                <div class="modal fade" id="req_<?= $staff['require_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                                                        <img src="<?= previewImage($staff['require_attachment1'], '../../images/blank.png', '../../imagebank/') ?>" alt="image"/>
                                                                    </div>
                                                                    <div class="item">
                                                                        <img src="<?= previewImage($staff['require_attachment2'], '../../images/blank.png', '../../imagebank/') ?>" alt="image"/>
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
    <?php include '_alerts.php'; ?>

</body>

</html>

