<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = $userFullname;
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
                                    <form action="meUpdate?userId=<?= $userId ?>" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.updateMe)">
                                    <div class="row">
                                        <p class="card-title">Business Profile</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Business Name</label>
                                                <input type="text" class="form-control" name="businessName" id="businessName" value="<?= $profile['bus_name'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">City</label>
                                                <select class="js-example-basic-multiple w-100" name="city" id="city" >
                                                    <option value="<?= $profile['city_id'] ?>"><?= getCityName($profile['city_id']) ?></option>
                                                    <?php  
                                                        $getCities=selectCities();
                                                        while ($city=$getCities->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option value="<?= $city['city_id'] ?>"><?= $city['city_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Introduction</label>
                                                <textarea  name="intro" id="intro"><?= $profile['bus_intro'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" id="updateMe" class="btn btn-info text-white">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-title"><?= $userFullname ?> Introduction</p>
                                        </div>
                                        <div id="introPreview"></div>
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

    <script src="../../js/businessProfile.js"></script>

</body>

</html>

