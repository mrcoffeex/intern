<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    $getPost=selectPostById($postId);
    $post=$getPost->fetch(PDO::FETCH_ASSOC);

    $title = $post['post_category'];
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
                                    <div class="row">
                                        <h4><?= $post['post_category'] ?></h4>
                                        <p><i class="ti-location-pin"></i> <?= getCityName($post['city_id']) ?></p>
                                        <p class="text-primary"><?= $post['post_salary_from'] . " - " . $post['post_salary_to'] ?></p>
                                        <p><?= $post['post_type'] . " | " . $post['post_based'] ?></p>
                                        <p class="text-secondary">Posted <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?></p>

                                        <p class="text-bold"><?= $post['post_title'] ?></p>
                                        <div><?= $post['post_description'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="card-title mb-3"><span class="text-info"><?= countApplicants($postId) ?></span> Applicants</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="table-dark">
                                                        <th class="text-center">Document</th>
                                                        <th>Fullname</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Hired</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        $getApplicants=selectApplicantsByPost($postId);
                                                        while ($applicant=$getApplicants->fetch(pDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <a href="download?token=<?= my_rand_str(30) ?>&ucode=<?= $applicant['app_applicant'] ?>&postId=<?= $postId ?>">
                                                                <button type="button" class="btn btn-info text-white">
                                                                    <i class="ti-download"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td title="click to show profile ...">
                                                            <a href="applicantProfile?token=<?= my_rand_str(30) ?>&ucode=<?= $applicant['app_applicant'] ?>" target="_BLANK">
                                                                <?= getUserFullnameByCode($applicant['app_applicant']) ?>
                                                            </a>
                                                        </td>
                                                        <td class="text-center"><?= $applicant['app_status'] ?></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success text-white" title="click to change status to received ..." data-bs-toggle="modal" data-bs-target="#rec_<?= $applicant['app_id'] ?>">
                                                                <i class="ti-check"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="rec_<?= $applicant['app_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel"><i class="ti-check"></i> Mark Hired</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form 
                                                                        method="post" 
                                                                        enctype="multipart/form-data" 
                                                                        action="updateApplicantStatus?appId=<?= $applicant['app_id'] ?>&postId=<?= $postId ?>" onsubmit="btnLoader(this.updateStatus)">
                                                                    <div class="modal-body">
                                                                        <p class="text-center">
                                                                            Trying to mark hired this applicant <span class="text-success"><?= getUserFullnameByCode($applicant['app_applicant']) ?></span> ?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="updateStatus" class="btn btn-success btn-block text-white">Hired</button>
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

