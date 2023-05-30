<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Profile";
    $upp_description = "Update your profile information and image";
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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form action="accountSettingsUpdate" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.updateProfile)">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-center">
                                                    <label for="">Current</label>
                                                    <br>
                                                    <img 
                                                    src="<?= previewImage($userProfileImg, "../../images/profile_default.png", "../../imagebank/"); ?>" 
                                                    class="img-preview" 
                                                    alt="profile image ..." />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Profile Image</label>
                                                    <input type="file" class="dropify" accept="images/jpg, images/png" name="profileImg" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="userEmail" id="userEmail" class="form-control" value="<?= $userEmail ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>New Password <span class="text-primary">< leave empty if no changes ></span></label>
                                                    <input type="password" name="userPassword" id="userPassword" class="form-control" minlength="6" maxlength="16" placeholder="******" value="" required>
                                                </div>
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"
                                                    onclick="showPassword('userPassword')">
                                                    Show Password
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" id="updateProfile" class="btn btn-primary float-end">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
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

