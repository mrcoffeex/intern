<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Schools";
    include 'school.paginate.php';
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
                                        <i class="ti-home"></i> List of Schools
                                        <span class="float-end text-lowercase"><?= $countRes ?> result(s)</span>
                                    </p>
                                    <form action="_redirect" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <input type="text" name="schoolSearch" id="schoolSearch" class="form-control" placeholder="search here ..." autofocus required>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">School</th>
                                                    <th class="text-center">City</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    while ($school=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td><?= $school['school_name'] ?></td>
                                                    <td class="text-center"><?= getCityName($school['city_id']) ?></td>
                                                    <td class="text-center">
                                                        <a href="schoolStaff?token=<?= my_rand_str(30) ?>&schoolId=<?= $school['school_id'] ?>" target="_blank" rel="noopener noreferrer">
                                                            <button 
                                                            type="button" 
                                                            class="btn btn-success btn-sm" >
                                                                <i class="ti-user"></i>
                                                            </button>
                                                        </a>
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-info btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#edit_<?= $school['school_id'] ?>" >
                                                            <i class="ti-pencil"></i>
                                                        </button>
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#remove_<?= $school['school_id'] ?>" >
                                                            <i class="ti-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="edit_<?= $school['school_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-pencil"></i> Edit School</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="schoolUpdate?token=<?= my_rand_str(30) ?>&schoolId=<?= $school['school_id'] ?>" method="post" onsubmit="btnLoader(this.removeSchool)">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">School</label>
                                                                        <input type="text" name="schoolName" id="schoolName" class="form-control" value="<?= $school['school_name'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">City</label>
                                                                        <select name="city" id="city" class="form-control form-control-lg" style="width: 100%;" required>
                                                                            <option value="<?= $school['city_id'] ?>"><?= getCityName($school['city_id']) ?></option>
                                                                            <?php  
                                                                                $getCities=selectCities();
                                                                                while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                                                                            ?>
                                                                            <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="removeSchool" class="btn btn-info btn-block">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="remove_<?= $school['school_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-trash"></i> Remove School</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="schoolRemove?token=<?= my_rand_str(30) ?>&schoolId=<?= $school['school_id'] ?>" method="post" onsubmit="btnLoader(this.removeSchool)">
                                                                <div class="modal-body">
                                                                    <p class="text-center">Are you sure you want to remove <span class="text-danger"><?= $school['school_name'] ?></span> from the list?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="removeSchool" class="btn btn-danger btn-block">Remove</button>
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

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

</body>

</html>

