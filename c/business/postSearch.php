<?php  
    require '../../config/includes.php';
    require '_session.php';

    $searchText = clean_string($_GET['searchText']);
    $title = "Job Posts Search: " . $searchText;
    include 'postSearch.paginate.php';
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
                                        <div class="col-md-12">
                                            <p class="card-title">
                                                <a href="posts"><button type="button" class="btn btn-dark btn-sm">back to list</button></a>
                                                <i class="ti-view-list-alt"></i> Recent Job Posts
                                                <a href="postCreateForm">
                                                    <button type="button" class="btn btn-primary btn-sm text-white">
                                                        Create Job Post
                                                    </button>
                                                </a>
                                                <span class="float-end text-lowercase"><?= $countRes ?> result(s)</span>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <form action="_redirect" enctype="multipart/form-data" method="post">
                                                <div class="form-group">
                                                    <input type="text" name="postSearch" id="postSearch" class="form-control" placeholder="search here ..." autofocus required>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
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
                                                            while ($post=$paginate->fetch(PDO::FETCH_ASSOC)) {

                                                                $tagsArray = explode(',', $post['post_tags']);

                                                                if ($post['post_salary_from'] == 0 && $post['post_salary_to'] == 0) {
                                                                    $salaryRate = "No Salary";
                                                                } else {
                                                                    $salaryRate = $post['post_salary_from'] . " - " . $post['post_salary_to'];
                                                                }
                                                        ?>
                                                        <tr>
                                                            <td><?= proper_date($post['post_created']) ?></td>
                                                            <td class="text-center">
                                                                <a href="postView?token=<?= my_rand_str(30) ?>&postId=<?= $post['post_id'] ?>" target="_NEW">
                                                                    <button type="button" class="btn btn-dark btn-sm text-white">
                                                                        <i class="ti-user"></i> <?= countApplicants($post['post_id']) ?>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                            <td><?= $post['post_category'] ?></td>
                                                            <td><?= $salaryRate ?></td>
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
                                                                    <button type="button" class="btn btn-info btn-sm text-white">Edit</button>
                                                                </a>
                                                                &nbsp;
                                                                <button 
                                                                type="button" 
                                                                class="btn btn-danger btn-sm text-white" 
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
                                        <div class="col-lg-12">
                                            <div class="float-right mt-4">
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

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

</body>

</html>

