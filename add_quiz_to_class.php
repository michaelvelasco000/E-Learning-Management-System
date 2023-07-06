<?php


include('teachersession.php');
$connection = $con;
$user_query = mysqli_query($connection, "select * from teacher where teacher_id='$session_id'") or die($connection->error);
$user_row = mysqli_fetch_array($user_query);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Css -->
    <!-- Bootstrap Css -->

</head>

<body>

    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">
                            <div class="card-title">

                            </div>

                            <form class="form-horizontal" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Quiz</label>
                                    <hr>

                                    <label for="">Select Quiz</label>
                                    <div class="controls">
                                        <select name="quiz_id" class="form-control" id="selekta">
                                            <option></option>
                                            <?php $query = mysqli_query($conn, "select * from quiz where teacher_id = '$session_id'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['quiz_id']; ?>
                                                <option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $query = mysqli_query($conn, "select * from class where teacher_id = '$session_id' and delete_status = 0") or die($conn->error);
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['class_id'];

                                            $course = mysqli_query($conn, "select * from course where course_id = '" . $row['course_id'] . "'");
                                            $rowCourse = mysqli_fetch_assoc($course);

                                            $subject = mysqli_query($conn, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
                                            $rowSubject = mysqli_fetch_assoc($subject);


                                        ?>
                                            <tr>
                                                <td>
                                                    <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>

                                                <td>&nbsp;<?php echo $rowCourse['cys']; ?></td>
                                                <td><?php echo $rowSubject['subject_title']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>


                                <div class="control-group">
                                    <div class="controls">

                                        <button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
                                        <a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
                                    </div>
                                </div>
                            </form>



                            <?php
                            if (isset($_POST['save'])) {
                                $quiz_id = $_POST['quiz_id'];

                                $id = $_POST['selector'];



                                $N = count($id);
                                for ($i = 0; $i < $N; $i++) {
                                    mysqli_query($connection, "insert into class_quiz (class_id,quiz_id) values('$id[$i]','$quiz_id')") or die($connection->error);
                                } ?>
                                <script>
                                    window.location = 'teacher_quiz.php';
                                </script>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="assets/js/pages/datatables.init.js"></script>
    <?php include('modal_delete_class_quiz.php'); ?> <?php include('modal_delete_class_quiz.php'); ?>

</body>

</html>