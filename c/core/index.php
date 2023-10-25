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
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-bar-chart"></i> System Stats</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Users</th>
                                                    <th class="text-center"><?= countUsers() ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Businesses</th>
                                                    <th class="text-center"><?= countBusinessProfiles() ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Students</th>
                                                    <th class="text-center"><?= countStudents() ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Schools</th>
                                                    <th class="text-center"><?= countSchools() ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Jobs Posted</th>
                                                    <th class="text-center"><?= countPostsAll() ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Hired Count</th>
                                                    <th class="text-center"><?= countApplicantsHired() ?></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-medall"></i> Most Jobs Posted</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Business/Company</th>
                                                    <th class="text-center">Posts</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $getRankings=selectPostsRanking();
                                                    while ($ranking=$getRankings->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?= $ranking['bus_name'] ?></td>
                                                    <td class="text-center"><?= $ranking['post_count'] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title"><i class="ti-layers-alt"></i> Recent Job Posts</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th class="text-center">Category</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Based</th>
                                                    <th class="text-center">Tags</th>
                                                    <th class="text-center">Post Views</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    $getPostRecent=selectPostsRecent();
                                                    while ($recent=$getPostRecent->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?= stringLimit($recent['post_title'], 30) ?></td>
                                                    <td class="text-center"><?= $recent['post_category'] ?></td>
                                                    <td class="text-center"><?= $recent['post_type'] ?></td>
                                                    <td class="text-center"><?= $recent['post_based'] ?></td>
                                                    <td class="text-center">
                                                        <?php  
                                                            $tagsArray = explode(',', $recent['post_tags']);
                                                            foreach ($tagsArray as $tags) {
                                                        ?>

                                                        <span class="badge badge-primary mt-2"><?= $tags ?></span> 

                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= $recent['post_views'] ?></td>
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
    <?php include '_alerts.php'; ?>

</body>

</html>

