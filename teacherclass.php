<?php


include('teachersession.php');


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
    <link rel="stylesheet" href="node_modules/bootstrap-icons.svg">
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <title>Teacher Class</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">

</head>
<style>
    #card {
        background-color: #ABB2B9 !important;
        border: solid 1px #5D6D7E !important;
        border-radius: 10px !important;
    }

    .card-body {
        background-color: #ABB2B9;
        border-radius: 10px;
    }
</style>

<body>

    <?php include('sidebar.php');

    ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">

                            <h4 class="card-title">Teacher Class</h4>
                            <p class="category text-muted">DAGATAN SENIOR HIGH SCHOOL</p>
                            <hr>

                        </div>
                        <div class="card-content table-responsive">
                            <div class="alert alert-info">

                                <strong><i class="icon-user icon-large"></i>&nbsp;Class Table</strong>
                            </div>
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add Class</button>
                            <a href="classprint.php<?php echo '?id=' . $session_id; ?>" type="button" class="btn btn-info" id="submit">Print Class</a>
                            <br><br>
                            
                            <div class="hero-unit-3">




                                <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
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
                                            $query = mysqli_query($conn, "SELECT * from class where teacher_id = '$session_id' AND delete_status = 0") or die($conn->error);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $class_id = $row['class_id'];
                                                $c_id['course_id'];
                                                $grade_id['grade_id'];

                                                $course = mysqli_query($conn, "select * from course where course_id = '" . $row['course_id'] . "'");
                                                $rowCourse = mysqli_fetch_assoc($course);

                                                $subject = mysqli_query($conn, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
                                                $rowSubject = mysqli_fetch_assoc($subject);

                                                $grade = mysqli_query($conn, "select * from grade where grade_id = '" . $row['grade_id'] . "'");
                                                $rowGrade = mysqli_fetch_assoc($grade);
                                            ?>


                                                <td>&nbsp;<?php echo $rowCourse['cys']; ?></td>
                                                <td><?php echo $rowSubject['subject_title']; ?></td>

                                                <td class="text-center">
                                                    <a rel="tooltip" title="View Class" id="v<?php echo $class_id; ?>" href="class.php<?php echo '?id=' . $class_id; ?>" class="btn btn-info"><i class="bi bi-person-lines-fill"></i> Student</a>
                                                    <a rel="tooltip" title="View Class" id="v<?php echo $class_id; ?>" href="inputGrade.php<?php echo '?id=' .$class_id ?>" class="btn btn-info"><i class="bi bi-person-lines-fill"></i> Grades</a>
                                                    <a href="class_module.php?id=<?php echo $class_id; ?>" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-up-fill"></i> Module</a>
                                                    <a href="class_quiz.php<?php echo '?id=' . $class_id; ?>" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-up-fill"></i> Quiz</a>
                                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete<?php echo $class_id ?>"><i class="bi bi-trash-fill"></i> Archive </button>
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