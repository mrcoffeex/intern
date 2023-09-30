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
                                        <table class="table table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">Post</th>
                                                    <th>Fullname</th>
                                                    <th>Category</th>
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
                                                        <a href="postView?token=<?= my_rand_str(30) ?>&postId=<?= $applicant['post_id'] ?>">
                                                            <button type="button" class="btn btn-primary btn-sm text-white">
                                                                <i class="ti-eye"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td title="click to show profile ...">
                                                        <a href="applicantProfile?token=<?= my_rand_str(30) ?>&ucode=<?= $applicant['app_applicant'] ?>" target="_BLANK">
                                                            <?= getUserFullnameByCode($applicant['app_applicant']) ?>
                                                        </a>
                                                    </td>
                                                    <td><?= getPostCategory($applicant['post_id']) ?></td>
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
                                            <div class="col-md-6">
                                                <div class="alert alert-dark" role="alert">
                                                    <p class="text-bold mb-0">
                                                        <?= $post['post_category'] ?>
                                                    </p>
                                                    <p class="small-text m-2"><i class="ti-home"></i> <?= getCityName($post['city_id']) ?></p>
                                                    <p class="small-text m-2"><i class="ti-money"></i> <?= $post['post_salary_from'] . " - " . $post['post_salary_to'] ?></p>
                                                    <p class="small-text m-2"><i class="ti-calendar"></i> <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?></p>
                                                    <br>
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

