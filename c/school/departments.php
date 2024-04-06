<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Departments";
    include 'department.paginate.php';
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
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createDepartment">Create</button>&nbsp;
                                        <i class="ti-home"></i> List of Departments
                                        <span class="float-end text-lowercase"><?= $countRes ?> result(s)</span>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">Department Name</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    while ($department=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                        
                                                ?>
                                                <tr class="">
                                                    <td class="text-center p-1"><?= $department['department_name'] ?></td>
                                                    <td class="text-center p-1">
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#remove_<?= $department['department_id'] ?>">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="remove_<?= $department['department_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                                                action="departmentRemove?departmentId=<?= $department['department_id'] ?>" onsubmit="btnLoader(this.removeDepartmentBtn)">
                                                            <div class="modal-body">
                                                                <p class="text-center">
                                                                    Trying to remove <span class="text-danger"><?= $department['department_name'] ?></span>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" id="removeDepartmentBtn" class="btn btn-danger btn-block text-white">Remove</button>
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

    <div class="modal fade" id="createDepartment" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="ti-plus"></i> Create Department</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="departmentCreate" enctype="multipart/form-data" method="post" onsubmit="btnLoader(this.createDepartmentBtn)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label">Department Name</label>
                                    <input type="text" class="form-control" name="departmentName" id="departmentName" maxlength="100" autofocus required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="createDepartmentBtn">Create</button>
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

