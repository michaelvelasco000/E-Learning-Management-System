<?php
error_reporting(0);


include('teachersession.php');
$connection = $con;
$get_id = $_GET['id'];
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

</head>

<body>

    <?php include('sidebar.php'); ?>

    <div id="content">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card" style="min-height: px">
                        <div class="card-header card-header-text">
                            <?php

                            $query = mysqli_query($connection, "select * from student_class where class_id = '$get_id'") or die($connection->error);
                            $userTotal = mysqli_num_rows($query);
                            ?>
                            <h4 class="card-title"> Students <?php echo '<br>' . " <h3>Total Students: " . $userTotal . "</h3>" ?></h4>

                            <hr>

                        </div>
                        <div class="card-content table-responsive">


                            <a href="addstudent.php<?php echo '?id=' . $get_id ?>" type="button" class="btn btn-info btn-md">Add Student</a>

                            <a href="print_student.php<?php echo '?id=' . $get_id; ?>" type="button" class="btn btn-info" id="submit">Print Students</a>
                            <?php

                            $query = mysqli_query($connection, "select * from student_class where class_id = '$get_id'") or die($connection->error);

                            while ($row = mysqli_fetch_array($query)) {

                                $class_id = $row['class_id'];


                            ?>


                            <?php } ?>
                            <table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">


                                <br><br>
                                <thead>
                                    <tr>
                                        <th>Photo</th>

                                        <th>Name</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $page = 'student_class';
                                    $query = mysqli_query($connection, "select * from student_class where class_id = '$get_id'") or die($connection->error);
                                    $userTotal = mysqli_num_rows($query);
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['id'];
                                        $class_id = $row['class_id'];

                                        $student_query = mysqli_query($connection, "select * from student where student_id='" . $row['student_id'] . "'") or die($connection->error);
                                        $student_row = mysqli_fetch_array($student_query);


                                    ?>

                                        <tr class="odd gradeX" id="username">
                                            <td width=""><img class="img-rounded" src="uploads/<?php echo $student_row['location']; ?>" height="50" width="50"></td>

                                            <td><a href="">&nbsp;<?php echo $student_row['firstname'] . " " . $student_row['lastname']; ?></a>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete<?php echo $id ?>"><i class="bi bi-trash-fill"></i></button>
                                            </td>
                                            <!-- end delete modal -->
                                        </tr>

                                    <?php
                                        include 'delete_ModalStudentClass.php';
                                    } ?>

                                    <?php include 'studentAddModal.php' ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="assets/js/pages/form-validation.init.js"></script>

    <script src="assets/js/app.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>


    <?php include 'alert_message.php'; ?>



</body>

</html>