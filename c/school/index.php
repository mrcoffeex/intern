<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Hello! " . $userFullname . ".";
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
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Active Job Posts</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countPostActive($userCode) ?></span> posts
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Applicants</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countApplicantsByBusiness($userCode) ?></span>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Hired Applicants</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countApplicantsHiredByBusiness($userCode) ?></span>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-user"></i> New Applicants</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">Document</th>
                                                    <th>Fullname</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $getApplicants=selectApplicantsByBusiness($userCode);
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
                                                    <td class="text-center"><span class="badge badge-dark"><?= $applicant['app_status'] ?></span></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-view-list-alt"></i> Recent Job Posts</p>
                                    <div class="row">
                                        <?php  
                                            $getPosts=selectPosts($userCode);
                                            while ($post=$getPosts->fetch(PDO::FETCH_ASSOC)) {

                                                $tagsArray = explode(',', $post['post_tags']);
                                        ?>
                                            <div class="col-md-12">
                                                <div class="alert alert-info" role="alert">
                                                    <p class="text-bold mb-0">
                                                        <?= $post['post_category'] ?>
                                                    </p>
                                                    <p class="mb-0"><?= $post['post_title'] ?></p>
                                                    <small>Posted <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?></small>
                                                    <a href="postView?postId=<?= $post['post_id'] ?>" class="stretched-link" title="click to view ..." target="_NEW"></a>
                                                </div>
                                            </div>
                                        <?php } ?>
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

