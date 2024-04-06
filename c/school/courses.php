<?php  
    require '../../config/includes.php';
    require '_session.php';

    $title = "Courses";
    include 'courses.paginate.php';
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
                                    <p class="card-title">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createCourse">Create</button>&nbsp;
                                        <i class="ti-list"></i> List of Courses
                                        <span class="float-end text-lowercase"><?= $countRes ?> result(s)</span>
                                    </p>
                                    <form action="_redirect" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <input type="text" name="courseSearch" id="courseSearch" class="form-control" placeholder="search here ..." autofocus required>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th class="text-center">Actions</th>
                                                    <th class="text-center">Department</th>
                                                    <th>Course</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  
                                                    while ($course=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update_<?= $course['school_course_id'] ?>">
                                                            <i class="ti-pencil"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#remove_<?= $course['school_course_id'] ?>">
                                                            <i class="ti-close"></i>
                                                        </button>
                                                    </td>
                                                    <td class="text-center"><?= getDepartmentName($course['department_id']) ?></td>
                                                    <td><?= getCourseName($course['course_id']) ?></td>
                                                </tr>

                                                <div class="modal fade" id="update_<?= $course['school_course_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ModalLabel"><i class="ti-list"></i> Update Course</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="courseUpdate?rand=<?= my_rand_str(100) ?>&schoolCourseId=<?= $course['school_course_id'] ?>" enctype="multipart/form-data" method="post" onsubmit="btnLoader(this.updateCourseBtn)">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="form-label">Department</label>
                                                                                <select name="department" id="department" class="form-control form-control-lg" required>
                                                                                    <option value="<?= $course['department_id'] ?>"><?= getDepartmentName($course['department_id']) ?></option>
                                                                                    <?php  
                                                                                        $getDepartments=selectDepartment($schoolId);
                                                                                        while ($department=$getDepartments->fetch(PDO::FETCH_ASSOC)) {
                                                                                    ?>
                                                                                        <option value="<?= $department['department_id'] ?>"><?= $department['department_name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="form-label">Course</label>
                                                                                <select name="course" id="course" class="form-control form-control-lg" required>
                                                                                    <option value="<?= $course['course_id'] ?>"><?= getCourseName($course['course_id']) ?></option>
                                                                                    <?php  
                                                                                        $getCourses=selectCourses();
                                                                                        while ($course=$getCourses->fetch(PDO::FETCH_ASSOC)) {
                                                                                    ?>
                                                                                        <option value="<?= $course['course_id'] ?>"><?= $course['course_name'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-info btn-block" id="updateCourseBtn">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="remove_<?= $course['school_course_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                                                                action="courseRemove?schoolCourseId=<?= $course['school_course_id'] ?>" onsubmit="btnLoader(this.removeCourseBtn)">
                                                            <div class="modal-body">
                                                                <p class="text-center">
                                                                    Trying to remove <span class="text-danger"><?= getCourseName($course['course_id']) ?></span>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" id="removeCourseBtn" class="btn btn-danger btn-block text-white">Remove</button>
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
                        <div class="col-lg-12">
                            <div class="float-right mt-4">
                                <ul class="pagination flex-wrap pagination-rounded">
                                    <?= $paginationCtrls; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                <?php include '_footer.php'; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- modals -->

    <div class="modal fade" id="createCourse" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"><i class="ti-plus"></i> Create Course</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="courseCreate" enctype="multipart/form-data" method="post" onsubmit="btnLoader(this.createCourseBtn)">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form-label">Department</label>
                                    <select name="department" id="department" class="form-control form-control-lg" required>
                                        <option value=""></option>
                                        <?php  
                                            $getDepartments=selectDepartment($schoolId);
                                            while ($course=$getDepartments->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?= $course['department_id'] ?>"><?= $course['department_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="form-label">Course</label>
                                    <select name="course" id="course" class="form-control form-control-lg" required>
                                        <option value=""></option>
                                        <?php  
                                            $getCourses=selectCourses();
                                            while ($course=$getCourses->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?= $course['course_id'] ?>"><?= $course['course_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="createCourseBtn">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include '_scripts.php'; ?>
    <?php include '_alerts.php'; ?>

</body>

</html>

