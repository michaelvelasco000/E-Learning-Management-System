<?php


include('session.php');
$conn = $con;


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons.svg">
    <!-- Responsive datatable examples -->
    <link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css">
    <title>Teacher Class</title>
    <link rel="icon" type="image/x-icon" href="../img/dagatanlogo.ico">

</head>
<style>
#card {
    color: #25396f;
    font-family: 'Franklin Gothic Medium';
    font-weight: 100px;
}

#cInfo {
    margin: 5px;
    padding: 5px;
    border: 2px;
    border-radius: 10px;
    background-color: white;

}
</style>

<body>

    <?php include('sidebar.php');

    ?>

    <main id="content">
        <div class="container-fluid">
            <div class="row p-0">
                <div class="col-md-12 mt-3">

                    <div class="pt-3" id="card">
                        <h1 class="">TEACHER CLASSES</h1>
                        <hr>
                    </div>
                    <div class="card-content table-responsive">
                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add
                            Class</button>
                        <div class="table-responsive">




                            <table class="table table-striped table-bordered dt-responsive nowrap text-center" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Teacher</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            $page = 'class';
                                            $query = mysqli_query($conn, "SELECT * from class where delete_status = '0'") or die($conn->error);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $class_id = $row['class_id'];

                                                $teacher = mysqli_query($conn, "select * from teacher where teacher_id = '" . $row['teacher_id'] . "'");
                                                $rowteacher = mysqli_fetch_assoc($teacher);

                                                $course = mysqli_query($conn, "select * from course where course_id = '" . $row['course_id'] . "'");
                                                $rowCourse = mysqli_fetch_assoc($course);

                                                $subject = mysqli_query($conn, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
                                                $rowSubject = mysqli_fetch_assoc($subject);
                                            ?>
                                        <td>&nbsp;<?php echo $rowteacher['firstname']." ".$rowteacher['middlename']." ".$rowteacher['lastname']; ?>
                                        </td>

                                        <td>&nbsp;<?php echo $rowCourse['cys']; ?></td>
                                        <td><?php echo $rowSubject['subject_title']; ?></td>

                                        <td class="text-center">
                                            <a rel="tooltip" title="View Class" id="v<?php echo $class_id;?>"
                                                href="classes.php<?php echo '?id=' . $class_id; ?>"
                                                class="btn btn-info"><i class="bi bi-person-lines-fill"></i>
                                                Student</a>
                                        
                                        </td>
                                    </tr>
                                    <?php
                                                include 'delete_ModalTeacherClasses.php';
                                            } ?>
                                    <?php include 'classesAddModal.php'; ?>
                                </tbody>
                            </table>
                            <!-- end slider -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
    <script src="../assets/js/pages/datatables.init.js"></script>
    <?php include '../alert_message.php'; ?>



</body>

</html>