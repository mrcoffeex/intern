<?php  
    require '../../config/includes.php';
    require '_session.php';

    $postId = clean_int($_GET['postId']);

    $getPost=selectPostById($postId);
    $post=$getPost->fetch(PDO::FETCH_ASSOC);

    $count=$getPost->rowCount();

    if (empty($count)) {
        header("location: 404");
    }

    $title = $post['post_category'];
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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="card-title mb-3"><span class="text-info"><?= countApplicants($postId) ?></span> Applicants</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="table-dark">
                                                        <th class="text-center">Hired</th>
                                                        <th>Fullname</th>
                                                        <th class="text-center">Hours</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Certificate</th>
                                                        <th class="text-center">Tasks / Hours</th>
                                                        <th class="text-center">Document</th>
                                                        <th class="text-center">Opt</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  
                                                        $getApplicants=selectApplicantsByPost($postId, $userCode);
                                                        while ($applicant=$getApplicants->fetch(pDO::FETCH_ASSOC)) {

                                                            if ($applicant['app_hired'] == "0000-00-00 00:00:00") {
                                                                $hired = "";
                                                            } else {
                                                                $hired = proper_date($applicant['app_hired']);
                                                            }
                                                    ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <?= $hired ?>
                                                        </td>
                                                        <td title="click to show profile ...">
                                                            <a href="applicantProfile?token=<?= my_rand_str(30) ?>&ucode=<?= $applicant['app_applicant'] ?>" target="_BLANK">
                                                                <?= getUserFullnameByCode($applicant['app_applicant']) ?>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="text-primary"><?= $applicant['app_hours'] ?></span> / <?= $applicant['app_school_hours'] ?>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-dark"><?= $applicant['app_status'] ?></span></td>
                                                        <td class="text-center">
                                                            <?= $applicant['app_certificate'] ? stringLimit($applicant['app_certificate'], 17) : '' ?>
                                                            &nbsp;
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#upload_<?= $applicant['app_id'] ?>">
                                                                <span class="badge badge-primary">Upload</span>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-primary btn-sm text-white" title="click to view tasks ..." data-bs-toggle="modal" data-bs-target="#task_<?= $applicant['app_id'] ?>">
                                                                <i class="ti-time"></i>
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="download?token=<?= my_rand_str(30) ?>&ucode=<?= $applicant['app_applicant'] ?>&postId=<?= $postId ?>">
                                                                <button type="button" class="btn btn-info btn-sm text-white">
                                                                    <i class="ti-download"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success btn-sm text-white" title="click to change status to received ..." data-bs-toggle="modal" data-bs-target="#rec_<?= $applicant['app_id'] ?>">
                                                                <i class="ti-check"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="rec_<?= $applicant['app_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalLabel"><i class="ti-check"></i> Mark Hired</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form 
                                                                    method="post" 
                                                                    enctype="multipart/form-data" 
                                                                    action="updateApplicantStatus?appId=<?= $applicant['app_id'] ?>&postId=<?= $postId ?>" onsubmit="btnLoader(this.updateStatus)">
                                                                <div class="modal-body">
                                                                    <p class="text-center">
                                                                        Trying to mark hired this applicant <span class="text-success"><?= getUserFullnameByCode($applicant['app_applicant']) ?></span> ?
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="updateStatus" class="btn btn-success btn-block text-white">Hired</button>
                                                                </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="task_<?= $applicant['app_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="ModalLabel"><i class="ti-time"></i> Tasks/Hours</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form 
                                                                    method="post" 
                                                                    enctype="multipart/form-data" 
                                                                    action="updateApplicantTask?appId=<?= $applicant['app_id'] ?>&postId=<?= $postId ?>" onsubmit="btnLoader(this.updateTask)">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h3 class="text-center"><span class="text-primary"><?= $applicant['app_hours'] ?></span> / <?= $applicant['app_school_hours'] ?></h3>
                                                                            <p class="text-center">Hours Rendered</p>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="" class="text-primary">Add Hours</label>
                                                                                <input type="number" name="addHours" min="0" step="0.01" class="form-control" autofocus required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Total Hours</label>
                                                                                <input type="number" name="schoolHours" min="0" step="0.01" class="form-control" value="<?= $applicant['app_school_hours'] ?>" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Tasks</label>
                                                                                <textarea name="tasks" ><?= $applicant['app_task'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" id="updateTask" class="btn btn-primary btn-block text-white">Update</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="upload_<?= $applicant['app_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Certificate</h5>
                                                                    <a href="#" data-dismiss="modal" aria-label="Close"><i class="icon-times"></i></a>
                                                                </div>
                                                                <form action="uploadCertificate?appId=<?= $applicant['app_id'] ?>&postId=<?= $postId ?>" method="post" enctype="multipart/form-data" onsubmit="btnLoader(this.uploadCertificate)">
                                                                <div class="modal-body">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Certificate</label>
                                                                            <input type="file" class="form-control" accept=".jpg, .png" name="certificateImg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <button 
                                                                            type="submit" 
                                                                            id="uploadCertificate" 
                                                                            class="btn btn-primary btn-block" >
                                                                                Upload
                                                                            </button>
                                                                        </div>
                                                                    </div>
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
                        </div>
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4><?= $post['post_category'] ?></h4>
                                        <p><i class="ti-location-pin"></i> <?= getCityName($post['city_id']) ?></p>
                                        <p class="text-primary"><?= $post['post_salary_from'] . " - " . $post['post_salary_to'] ?></p>
                                        <p><?= $post['post_type'] . " | " . $post['post_based'] ?></p>
                                        <p class="text-secondary">Posted <?= getTimePassed($post['post_created'], date("Y-m-d H:i:s")) ?></p>

                                        <p class="text-bold mt-4"><?= $post['post_title'] ?></p>
                                        <div><?= $post['post_description'] ?></div>
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

    <script>
        if ($("textarea").length) {
            tinymce.init({
                selector: 'textarea',
                height: 500,
                theme: 'silver',
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                image_advtab: true,
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                    },
                    {
                    title: 'Test template 2',
                    content: 'Test 2'
                    }
                ],
                content_css: [],
                setup: function(editor) {

                    editor.on('keyup', function() {
                        // Event handler code
                        $('#descriptionPreview').html(editor.getContent());
                    });
                }
            });
        }
    </script>

</body>

</html>

