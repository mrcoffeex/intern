<?php  
    require '../../config/includes.php';
    require '_session.php';

    $searchText = clean_string($_GET['searchText']);
    $title = "Business Search: " . $searchText;
    include 'businessSearch.paginate.php';
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
                                        <a href="businesses"><button type="button" class="btn btn-dark btn-sm">back to list</button></a>
                                        <i class="ti-home"></i> List of Businesses
                                        <span class="float-end text-lowercase"><?= $countRes ?> result(s)</span>
                                    </p>
                                    <form action="_redirect" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <input type="text" name="bSearch" id="bSearch" class="form-control" placeholder="search here ..." autofocus required>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Intro</th>
                                                    <th class="text-center">City</th>
                                                    <th class="text-center">Created</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    while ($bus=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td><?= $bus['bus_name'] ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#intro_<?= $bus['bus_id'] ?>">
                                                            <i class="ti-list"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center"><?= getCityName($bus['city_id']) ?></td>
                                                    <td class="text-center"><?= proper_date($bus['bus_created']) ?></td>
                                                </tr>

                                                <div class="modal fade" id="intro_<?= $bus['bus_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-list"></i> Company Intro</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?= $bus['bus_intro'] ?>
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
                        <div class="col-lg-12">
                            <div class="float-right mt-4">
                                <ul class="pagination flex-wrap pagination-rounded">
                                    <?= $paginationCtrls; ?>
                                </ul>
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

