<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "S.Y. / Semester";
    include 'sysem.paginate.php';
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
                                    <p class="card-title">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createSysem">Create</button>&nbsp;
                                        <i class="ti-calendar"></i> List of School Year / Semester 
                                        <span class="float-end text-lowercase"><?= $countRes ?> result(s)</span>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">S.Y. / Semester</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    while ($sysem=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                        
                                                ?>
                                                <tr class="">
                                                    <td class="text-center p-1"><?= $sysem['sysem_text'] ?></td>
                                                    <td class="text-center p-1">
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#remove_<?= $sysem['sysem_id'] ?>">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="remove_<?= $sysem['sysem_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-close"></i> Remove</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form 
                                                                method="post" 
                                                                enctype="multipart/form-data" 
                                                                action="sysemRemove?sysemId=<?= $sysem['sysem_id'] ?>" onsubmit="btnLoader(this.removeSysem)">
                                                            <div class="modal-body">
                                                                <p class="text-center">
                                                                    Trying to remove <span class="text-danger"><?= $sysem['sysem_text'] ?></span>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" id="removeSysem" class="btn btn-danger btn-block text-white">Remove</button>
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

    <div class="modal fade" id="createSysem" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="ti-plus"></i> Create S.Y. / Semester</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="sysemCreate" enctype="multipart/form-data" method="post" onsubmit="btnLoader(this.createSysemBtn)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label">School Year (xxxx-xxxx)</label>
                                    <input type="text" class="form-control" name="schoolYear" id="schoolYear" maxlength="9" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label">Semester</label>
                                    <select name="semester" id="semester" class="form-control form-control-lg" required>
                                        <option value=""></option>
                                        <option value="1ST">1ST</option>
                                        <option value="2ND">2ND</option>
                                        <option value="3RD">3RD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="createSysemBtn">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

</body>

</html>

