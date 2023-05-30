<?php  
    require '../../config/includes.php';
    require '_session.php';

    $searchText = clean_string($_GET['searchText']);

    $title = "Search: ".$searchText;
    $upp_description = '<span class="text-primary">'.countUsersBySearch($searchText).'</span> results.';

    include 'user_search_paginate.php';
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

                                        <div class="col-md-3">
                                            <p class="card-title">
                                                List of Users
                                            </p>
                                        </div>

                                        <div class="col-md-6">
                                            <form method="post" enctype="multipart/form-data" action="_redirect">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-sm" name="user_search" id="user_search" placeholder="search here ..." value="<?= $searchText ?>" required>
                                                </div>
                                            </form>
                                        </div>
                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-sm btn-icon-text float-end" data-bs-toggle="modal" data-bs-target="#add-user"><i class="ti-plus btn-icon-prepend"></i> Create User</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="table-dark">
                                                            <th class="p-2 text-center">De / Activate</th>
                                                            <th class="p-2">#</th>
                                                            <th class="p-2">Name</th>
                                                            <th class="p-2">Username</th>
                                                            <th class="p-2">Role</th>
                                                            <th class="p-2 text-center">Status</th>
                                                            <th class="p-2">Registered</th>
                                                            <th class="p-2 text-center">Edit</th>
                                                            <th class="p-2 text-center">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            while ($user=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td class="p-2 text-center">
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-warning btn-sm"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#change_<?= $user['e4ps_user_id'] ?>">
                                                                    <i class="ti-reload"></i>
                                                                </button>
                                                            </td>
                                                            <td class="p-2"><?= $user['e4ps_user_code']; ?></td>
                                                            <td class="p-2"><?= $user['e4ps_full_name']; ?></td>
                                                            <td class="p-2"><?= $user['e4ps_username']; ?></td>
                                                            <td class="p-2"><?= user_type($user['e4ps_user_type']) ?></td>
                                                            <td class="p-2 text-center">
                                                                <span class="badge badge-<?= getUserStatusSkin($user['e4ps_user_status']) ?>">
                                                                    <?= getUserStatus($user['e4ps_user_status']) ?>
                                                                </span>
                                                            </td>
                                                            <td class="p-2"><?= proper_date($user['e4ps_user_created']) ?></td>
                                                            <td class="p-2 text-center">
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-info btn-sm" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#edit_<?= $user['e4ps_user_id'] ?>">
                                                                    <i class="ti-pencil"></i>
                                                                </button>
                                                            </td>
                                                            <td class="p-2 text-center">
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-danger btn-sm"
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#remove_<?= $user['e4ps_user_id'] ?>">
                                                                    <i class="ti-close"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <!-- edit -->
                                                        <div class="modal fade" id="edit_<?= $user['e4ps_user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel"><i class="ti-pencil"></i> Update User</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form 
                                                                        method="post" 
                                                                        enctype="multipart/form-data" 
                                                                        action="user_update?rand=<?= my_rand_str(30) ?>&userId=<?= $user['e4ps_user_id'] ?>&page=user_search&searchText=<?= $searchText ?>"  
                                                                        onsubmit="btnLoader(this.updateUser)">

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Name</label>
                                                                            <input type="text" class="form-control" name="name" value="<?= $user['e4ps_full_name'] ?>" autofocus required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input type="email" class="form-control" name="email" value="<?= $user['e4ps_username'] ?>" maxlength="50" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Role</label>
                                                                            <select name="role" class="form-control" required>
                                                                                <option value="<?= $user['e4ps_user_type'] ?>"><?= user_type($user['e4ps_user_type']) ?></option>
                                                                                <option value="0">dev</option>
                                                                                <option value="1">administrator</option>
                                                                                <option value="2">cswdo</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="text-primary">Password (leave empty if no changes)</label>
                                                                            <input type="password" name="userPassword" id="userPassword_<?= $user['e4ps_user_id'] ?>" class="form-control" minlength="6" maxlength="16" placeholder="******" >
                                                                        </div>
                                                                        <div class="form-check form-check-primary">
                                                                            <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input"
                                                                            onclick="showPassword_<?= $user['e4ps_user_id'] ?>()">
                                                                            Show Password
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="updateUser" class="btn btn-info">Update</button>
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                                    </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- remove -->
                                                        <div class="modal fade" id="remove_<?= $user['e4ps_user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                                                        action="user_remove?rand=<?= my_rand_str(30) ?>&userId=<?= $user['e4ps_user_id'] ?>&page=user_search&searchText=<?= $searchText ?>" 
                                                                        onsubmit="btnLoader(this.removeUser)">
                                                                    <div class="modal-body">
                                                                        <p class="text-center">
                                                                            Trying to remove <br>
                                                                            <span class="text-danger"><?= $user['e4ps_username'] ?></span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="removeUser" class="btn btn-danger">Remove</button>
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                                    </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- de-activate -->
                                                        <div class="modal fade" id="change_<?= $user['e4ps_user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel"><i class="ti-reload"></i> De / Activate User</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form 
                                                                        method="post" 
                                                                        enctype="multipart/form-data" 
                                                                        action="user_change_status?rand=<?= my_rand_str(30) ?>&userId=<?= $user['e4ps_user_id'] ?>&page=user_search&searchText=<?= $searchText ?>" 
                                                                        onsubmit="btnLoader(this.changeUser)">
                                                                    <div class="modal-body">
                                                                        <p class="text-center">
                                                                            Change user status?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="changeUser" class="btn btn-warning btn-block">Change</button>
                                                                    </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            
                                                            function showPassword_<?= $user['e4ps_user_id'] ?>() {
                                                                
                                                                var x = document.getElementById("userPassword_<?= $user['e4ps_user_id'] ?>");

                                                                if (x.type === "password") {
                                                                    x.type = "text";
                                                                } else {
                                                                    x.type = "password";
                                                                }
                                                            }

                                                        </script>

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
                    <h5 class="modal-title" id="ModalLabel"><i class="ti-plus"></i> Create User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data" action="user_create?page=user_search&searchText=<?= $searchText ?>" onsubmit="btnLoader(this.submit_create_user)">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option></option>
                            <option value="0">dev</option>
                            <option value="1">administrator</option>
                            <option value="2">cswdo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submit_create_user" class="btn btn-success">Create</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php include '_scripts.php'; ?>

    <?php include '_alerts.php'; ?>

</body>

</html>

