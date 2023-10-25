<?php  
    require '../../config/includes.php';
    require '_session.php';

    $searchText = clean_string($_GET['searchText']);
    $title = "User Search: ".$searchText;
    include 'userSearch.paginate.php';
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

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <p class="card-title">
                                                <a href="users"><button type="button" class="btn btn-dark btn-sm">back to list</button></a>
                                                List of Users 
                                                <button type="button" class="btn btn-primary btn-sm btn-icon-text text-white" data-bs-toggle="modal" data-bs-target="#add-user"><i class="ti-plus btn-icon-prepend"></i> Create Admin</button>
                                                <span class="float-end text-lowercase">
                                                   <?= $countRes ?> result(s)
                                                </span>
                                            </p>
                                        </div>

                                        <div class="col-md-12">
                                            <form method="post" enctype="multipart/form-data" action="_redirect">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" name="user_search" id="user_search" placeholder="search here ..." autofocus required>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="table-dark">
                                                            <th class="p-2">#</th>
                                                            <th class="p-2">Name</th>
                                                            <th class="p-2">Username</th>
                                                            <th class="p-2">Role</th>
                                                            <th class="p-2">Registered</th>
                                                            <th class="p-2 text-center">Edit</th>
                                                            <th class="p-2 text-center">Change</th>
                                                            <th class="p-2 text-center">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            while ($user=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                         <tr>
                                                            <td class="p-2"><?= $user['user_code']; ?></td>
                                                            <td class="p-2"><?= getUserFullnameByCode($user['user_code']); ?></td>
                                                            <td class="p-2"><?= $user['user_email']; ?></td>
                                                            <td class="p-2"><?= user_type($user['user_type']) ?></td>
                                                            <td class="p-2"><?= proper_date($user['user_created']) ?></td>
                                                            <td class="p-2 text-center"><?= getUserStatus($user['user_status']) ?></td>
                                                            <td class="p-2 text-center">
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-info btn-sm" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#edit_<?= $user['user_uid'] ?>">
                                                                    <i class="ti-reload"></i>
                                                                </button>
                                                            </td>
                                                            <td class="p-2 text-center">
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-danger btn-sm"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#remove_<?= $user['user_uid'] ?>">
                                                                    <i class="ti-close"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <!-- edit -->
                                                        <div class="modal fade" id="edit_<?= $user['user_uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel"><i class="ti-reload"></i> Update User</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form 
                                                                        method="post" 
                                                                        enctype="multipart/form-data" 
                                                                        action="userStatusUpdate?token=<?= my_rand_str(30) ?>&userId=<?= $user['user_uid'] ?>"  
                                                                        onsubmit="btnLoader(this.updateStatus)">

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>User Status</label>
                                                                            <select name="role" class="form-control form-control-lg" required>
                                                                                <option value="<?= $user['user_status'] ?>"><?= getUserStatus($user['user_status']) ?></option>
                                                                                <option value="0">Active</option>
                                                                                <option value="1">Suspended</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="updateStatus" class="btn btn-info btn-block">Update</button>
                                                                    </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- remove -->
                                                        <div class="modal fade" id="remove_<?= $user['user_uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel"><i class="ti-close"></i> Remove User</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form 
                                                                        method="post" 
                                                                        enctype="multipart/form-data" 
                                                                        action="user_remove?token=<?= my_rand_str(30) ?>&userId=<?= $user['user_uid'] ?>" 
                                                                        onsubmit="btnLoader(this.removeUser)">
                                                                    <div class="modal-body">
                                                                        <p class="text-center">
                                                                            Trying to remove <br>
                                                                            <span class="text-danger"><?= $user['user_email'] ?></span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="removeUser" class="btn btn-danger btn-block">Remove</button>
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

                                        <div class="col-md-12">
                                            <div class="text-center mt-3">
                                                <ul class="pagination flex-wrap pagination-rounded">
                                                    <?= $paginationCtrls; ?>
                                                </ul>
                                            </div>
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
    <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="ti-plus"></i> Create Admin</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" action="user_create" onsubmit="btnLoader(this.submit_create_user)">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="fname" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" maxlength="50" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit_create_user" class="btn btn-success btn-block">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '_scripts.php'; ?>

    <?php include '_alerts.php'; ?>

</body>

</html>

