<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Job Posts";
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

                        <div class="col-md-12 transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">Active Job Posts</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countPostActive($userCode) ?></span> posts
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                        <p class="fs-6 mb-2">All Posts</p>
                                        <p class="fw-bold mb-2">
                                            <span class="fs-3"><?= countPosts($userCode) ?></span> posts
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="card-title"><i class="ti-view-list-alt"></i> Recent Job Posts</p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <a href="postCreateForm">
                                                <button type="button" class="btn btn-info float-end text-white">
                                                    Create Job Post
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="table-dark">
                                                            <th>Date</th>
                                                            <th class="text-center">View</th>
                                                            <th>Category</th>
                                                            <th>Salary</th>
                                                            <th>Tags</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Options</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php  
                                                            $getPosts=selectPosts($userCode);
                                                            while ($post=$getPosts->fetch(PDO::FETCH_ASSOC)) {

                                                                $tagsArray = explode(',', $post['post_tags']);
                                                        ?>
                                                        <tr>
                                                            <td><?= proper_date($post['post_created']) ?></td>
                                                            <td class="text-center">
                                                                <a href="postView?token=<?= my_rand_str(30) ?>&postId=<?= $post['post_id'] ?>" target="_NEW">
                                                                    <button type="button" class="btn btn-dark text-white">
                                                                        <i class="ti-user"></i> <?= countApplicants($post['post_id']) ?>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                            <td><?= $post['post_category'] ?></td>
                                                            <td><?= $post['post_salary_from'] . " - " . $post['post_salary_to'] ?></td>
                                                            <td>
                                                                <?php 
                                                                    foreach ($tagsArray as $tags) {
                                                                        echo '<span class="badge badge-dark">' . $tags . '</span> ';
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="badge badge-<?= getPostStatusSKin($post['post_status']) ?>">
                                                                    <?= $post['post_status'] ?>
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="postEdit?token=<?= my_rand_str(30) ?>&postId=<?= $post['post_id'] ?>" target="_NEW">
                                                                    <button type="button" class="btn btn-info text-white">Edit</button>
                                                                </a>
                                                                &nbsp;
                                                                <button 
                                                                type="button" 
                                                                class="btn btn-danger text-white" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#remove_<?= $post['post_id'] ?>">Remove</button>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade" id="remove_<?= $post['post_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="ModalLabel"><i class="ti-close"></i> Remove</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form 
                                                                        method="post" 
                                                                        enctype="multipart/form-data" 
                                                                        action="postRemove?postId=<?= $post['post_id'] ?>" onsubmit="btnLoader(this.removePost)">
                                                                    <div class="modal-body">
                                                                        <p class="text-center">
                                                                            Trying to delete this <span class="text-danger"><?= $post['post_category'] ?></span> post?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" id="removePost" class="btn btn-danger btn-block">Remove</button>
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

