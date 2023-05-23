<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Hello! " . $userFullname . ".";
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
                            <div class="alert alert-info" role="alert">Please complete your business profile. click here.</div>
                        </div>

                        <div class="col-md-12 transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Digos City's Barangay</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3">26</span> Barangays
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Approved 4ps</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3">12,318</span> Aug 2022
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">4Ps Applicants</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3">1,876</span> Aug 2022
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <p class="card-title"><i class="ti-calendar"></i> Announcements</p>
                            <ul class="icon-data-list">
                                <li>
                                <div class="d-flex">
                                    <img src="../../images/faces/face1.jpg" alt="user">
                                    <div>
                                    <p class="text-info mb-1">John Raven Manulat</p>
                                    <p class="mb-0">e4Ps Map dashboard have been created and updated</p>
                                    <small>9:30 am</small>
                                    </div>
                                </div>
                                </li>
                                <li>
                                <div class="d-flex">
                                    <img src="../../images/faces/face2.jpg" alt="user">
                                    <div>
                                    <p class="text-info mb-1">John Vianne Murcia</p>
                                    <p class="mb-0">You have done a great job </p>
                                    <small>10:30 am</small>
                                    </div>
                                </div>
                                </li>
                                <li>
                                <div class="d-flex">
                                <img src="../../images/faces/face3.jpg" alt="user">
                                <div>
                                <p class="text-info mb-1">Joane May Delima</p>
                                <p class="mb-0">Data have been in sync with the Map</p>
                                <small>11:30 am</small>
                                </div>
                                </div>
                                </li>
                                <li>
                                <div class="d-flex">
                                    <img src="../../images/faces/face4.jpg" alt="user">
                                    <div>
                                    <p class="text-info mb-1">Conrado Panerio</p>
                                    <p class="mb-0">Presentation of the Project is done!</p>
                                    <small>8:50 am</small>
                                    </div>
                                </div>
                                </li>
                                <li>
                                <div class="d-flex">
                                    <img src="../../images/faces/face5.jpg" alt="user">
                                    <div>
                                    <p class="text-info mb-1">Marlon Suelto</p>
                                    <p class="mb-0">Digos City Map is finished!</p>
                                    <small>9:00 am</small>
                                    </div>
                                </div>
                                </li>
                            </ul>
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

</body>

</html>

