<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Pending";
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

                        <div class="col-md-12 transparent">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>Pending Approval</h3>
                                                    <p class="text-justify">
                                                    <br>
                                                    Thank you for submitting your request/application. We have received it and it is currently undergoing review. Please note that your submission is now in a pending state and awaiting approval.
                                                    <br><br>
                                                    Our team is working diligently to process your request as quickly as possible. The approval process may take some time, depending on the nature and complexity of the request. We appreciate your patience during this period.
                                                    <br><br>
                                                    Rest assured that we will notify you promptly once a decision has been made regarding your request. If there are any updates or additional information required, we will reach out to you accordingly.
                                                    <br><br>
                                                    If you have any urgent inquiries or concerns regarding your submission, please feel free to contact our support team at [contact details]. We are here to assist you and provide any necessary clarification.
                                                    <br><br>
                                                    Thank you for your understanding and cooperation.
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

