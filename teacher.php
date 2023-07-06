<?php

include_once("connection.php");

include('session.php');

$conn = connection();
$user_query = mysqli_query($conn, "select * from teacher where teacher_id='$session_id'") or die($conn->error);
$user_row = mysqli_fetch_array($user_query);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <title></title>


</head>

<body>

    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">
                            <h4 class="card-title">Teacher Class</h4>
                            <p class="category">New employees on 15th December, 2016</p>
                        </div>
                        <div class="card-content table-responsive">
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal"
                                data-target="#myModal">Add Class</button>

                            <br><br>
                            <div class="hero-unit-3">

                                <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
                                    <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><i class="icon-user icon-large"></i>&nbsp;Class Table</strong>
                                    </div>
                                    <thead>
                                        <tr>

                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $page = 'class';
                                            $query = mysqli_query($conn, "select * from class where teacher_id = '$session_id'") or die($conn->error);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $class_id = $row['class_id'];

                                                $course = mysqli_query($conn, "select * from course where course_id = '" . $row['course_id'] . "'");
                                                $rowCourse = mysqli_fetch_assoc($course);

                                                $subject = mysqli_query($conn, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
                                                $rowSubject = mysqli_fetch_assoc($subject);
                                            ?>

                                            <!-- script -->
                                            <script type="text/javascript">
                                            $(document).ready(function() {

                                                $('#d<?php echo $class_id; ?>').tooltip('show')
                                                $('#d<?php echo $class_id; ?>').tooltip('hide')
                                            });
                                            </script>
                                            <!-- end script -->

                                            <script type="text/javascript">
                                            $(document).ready(function() {

                                                $('#v<?php echo $class_id; ?>').tooltip('show')
                                                $('#v<?php echo $class_id; ?>').tooltip('hide')
                                            });
                                            </script>
                                            <!-- end script -->

                                            <td>&nbsp;<?php echo $rowCourse['cys']; ?></td>
                                            <td><?php echo $rowSubject['subject_title']; ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <a rel="tooltip" title="View Class" id="v<?php echo $class_id; ?>"
                                                        href="class.php<?php echo '?id=' . $class_id; ?>"
                                                        class="btn btn-info"><i class="icon-plus"></i> Student</a>
                                                    <a href="class_module.php?id=<?php echo $class_id; ?>"
                                                        class="btn btn-primary"><i class="icon-cloud-upload"></i>
                                                        Module</a>
                                                    <button type="button" class="btn btn-danger btn-md"
                                                        data-toggle="modal"
                                                        data-target="#delete<?php echo $class_id ?>"><i
                                                            class="icon icon-trash"></i> Delete</button>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                                include 'delete_ModalTeacherClass.php';
                                            } ?>
                                        <?php include 'classAddModal.php'; ?>
                                    </tbody>
                                </table>
                                <!-- end slider -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/pages/datatables.init.js"></script>
    <?php include 'alert_message.php'; ?>


</body>

</html>