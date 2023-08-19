<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Select your school / institution";

    $getReq=selectRequirement($userCode);
    $req=$getReq->fetch(PDO::FETCH_ASSOC);
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="request" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.submitRequirements)">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h3 for="">School</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Select School</label>
                                                            <select class="js-example-basic-multiple w-100" name="school" id="school" required>
                                                                <option value=""></option>
                                                                <?php  
                                                                    $getSchools=selectSchools();
                                                                    while ($school=$getSchools->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                <option value="<?= $school['school_id'] ?>"><?= $school['school_name'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h3 for="">Requirements</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Position</label>
                                                            <input type="text" name="position" id="position" class="form-control" maxlength="100" placeholder="ex. Faculty, Dean of College, Dean's Assistant" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="text-justify">
                                                        Note: Upload Attachment for Proof of Validity
                                                        <br><br>
                                                        Please ensure to upload the necessary attachment(s) as proof of validity for [purpose]. The attachment(s) should substantiate the authenticity and legitimacy of the information provided. Follow the instructions below to complete the process:
                                                        <br><br>
                                                        </p>
                                                        <ol>
                                                            <li>Ensure the attachment is in a compatible format such as PDF, JPEG, PNG</li>
                                                            <li>Verify that the file size falls within the specified limits (25MB).</li>
                                                            <li>Make sure the attachment is clear, legible, and free from any visual distortions.</li>
                                                            <li>Use a clear and descriptive file name for easy identification.</li>
                                                        </ol>
                                                        <p>
                                                            If you encounter any issues or require assistance, please contact our support team <a href="support" target="_NEW">here</a>.
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Attachment1:</label>
                                                            <input type="file" name="attachment1" id="attachment1" class="dropify" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Attachment2:</label>
                                                            <input type="file" name="attachment2" id="attachment2" class="dropify" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" id="submitRequirements" class="btn btn-info text-white">Submit Requirements</button>
                                                    </div>
                                                </div>
                                            </form>
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

