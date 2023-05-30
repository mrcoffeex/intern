<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Students";
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
                                        <p class="fs-6 mb-2">Verified Students</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countVerifiedStudentsBySchool($schoolId) ?></span> posts
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Unverified Students</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countUnVerifiedStudentsBySchool($schoolId) ?></span>
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
                                    <p class="card-title"><i class="ti-user"></i> Recent Students</p>
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
                                                    $getRecent=selectRecentStudents($schoolId, 15);
                                                    while ($recent=$getRecent->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="table-danger">
                                                    <td>Fullname</td>
                                                    <td class="text-center">Verified</td>
                                                    <td class="text-center">Status</td>
                                                    <td class="text-center">Business/Company</td>
                                                    <td class="text-center">Date Applied</td>
                                                    <td class="text-center">Date Hired</td>
                                                    <td class="text-center">Hours</td>
                                                    <td class="text-center">Tasks</td>
                                                    <td class="text-center">Certificate</td>
                                                </tr>
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

