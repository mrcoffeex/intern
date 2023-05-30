<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Users";
    $upp_description = '<span class="text-primary">'.countUsers().'</span> results.';

    include 'users_paginate.php';
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
                                                    <input type="text" class="form-control form-control-sm" name="user_search" id="user_search" placeholder="search here ..." autofocus required>
                                                </div>
                                            </form>
                                        </div>
                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-info btn-sm btn-icon-text float-end text-white" data-bs-toggle="modal" data-bs-target="#add-user"><i class="ti-plus btn-icon-prepend"></i> Create User</button>
                                            </div>
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
                                                            <td class="p-2 text-center">
                                                                <button 
                                                                    type="button" 
                                                                    class="btn btn-info btn-sm" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#edit_<?= $user['user_uid'] ?>">
                                                                    <i class="ti-pencil"></i>
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
                                                                        action="user_update?rand=<?= my_rand_str(30) ?>&userId=<?= $user['user_uid'] ?>&page=users&searchText="  
                                                                        onsubmit="btnLoader(this.updateUser)">

                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Name</label>
                                                                            <input type="text" class="form-control" name="name" value="<?= $user['full_name'] ?>" autofocus required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <input type="email" class="form-control" name="email" value="<?= $user['username'] ?>" maxlength="50" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Role</label>
                                                                            <select name="role" class="form-control" required>
                                                                                <option value="<?= $user['user_type'] ?>"><?= user_type($user['user_type']) ?></option>
                                                                                <option value="0">dev</option>
                                                                                <option value="1">administrator</option>
                                                                                <option value="2">cswdo</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="text-primary">Password (leave empty if no changes)</label>
                                                                            <input type="password" name="userPassword" id="userPassword_<?= $user['user_uid'] ?>" class="form-control" minlength="6" maxlength="16" placeholder="******" >
                                                                        </div>
                                                                        <div class="form-check form-check-primary">
                                                                            <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input"
                                                                            onclick="showPassword_<?= $user['user_uid'] ?>()">
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
                                                                        action="user_remove?rand=<?= my_rand_str(30) ?>&userId=<?= $user['user_uid'] ?>&page=users&searchText=" 
                                                                        onsubmit="btnLoader(this.removeUser)">
                                                                    <div class="modal-body">
                                                                        <p class="text-center">
                                                                            Trying to remove <br>
                                                                            <span class="text-danger"><?= $user['username'] ?></span>
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

                                                        <script>
                                                            
                                                            function showPassword_<?= $user['user_uid'] ?>() {
                                                                
                                                                var x = document.getElementById("userPassword_<?= $user['user_uid'] ?>");

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
                <form method="post" enctype="multipart/form-data" action="user_create?page=users&searchText=" onsubmit="btnLoader(this.submit_create_user)">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" maxlength="50" required>
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

