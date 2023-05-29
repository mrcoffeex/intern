<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "e4ps Mapping Support";
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
                  
                        <div class="col-md-12 transparent">
                            <div class="row text-white">
                                <div class="col-md-12">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 class="mb-4"><i class="ti-support"></i> Support</h2>

                                                    <div class="text-center">
                                                        <img class="img-fluid" src="../../images/logo-long.png" alt="krazyappsph logo">
                                                    </div>
                                                    
                                                    <p class="mb-4" style="font-size: 15px; text-align: justify;">
                                                    We understand that sometimes things can go wrong with technology, and we're here to help. Our technical support team is available to assist you with any issues you may encounter while using our website or applications. Please review the information below to learn more about our technical support services.
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                <h3 class="mb-4"><i class="ti-support"></i> Contacting Technical Support</h3>
                                                    <p class="mb-4" style="font-size: 15px; text-align: justify;">
                                                    If you need technical assistance, you can contact our support team via email or phone. Our support hours are Monday to Friday, 9:00 AM to 5:00 PM Pacific Standard Time. Please be sure to provide as much detail as possible about the issue you're experiencing, including any error messages or screenshots.
                                                    </p>
                                                    <p style="font-weight: bold;">
                                                        Email:&nbsp;
                                                        <span class="text-primary">interbuilders@gmail.com</span>&nbsp;
                                                        Cel #:&nbsp;
                                                        <span class="text-primary">0912 312 3123</span>&nbsp;
                                                    </p>
                                                </div>
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

    <?php include '_scripts.php'; ?>

</body>

</html>

