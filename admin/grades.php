<?php

include('../connection.php');
include('session.php');
$conn = connection();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Overall Grades Student</title>
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

    <?php include('sidebar.php'); ?>





    <main id="content">


        <div class="container-fluid">

            <div class="row p-0">


                <div class="col-md-12 mt-3">


                    <div class="table-responsive">
                        <div class="pt-3" id="card">
                            <h1 class="">STUDENTS GRADES</h1>
                            <hr>
                        </div>
                     
                       
                        <table class="table table-striped table-bordered text-center" id="datatable">
                            <thead>


                                <th>Class</th>
                                <th>Subject</th>
                                <th>Action</th>

                            </thead>
                            <div id="course_id<?php echo $student_id; ?>" class="modal hide fade" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger">Are you Sure you Want to
                                        <strong>Delete</strong>&nbsp; this Student?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i
                                            class="icon-remove icon-large"></i>&nbsp;Close</button>
                                    <a href="deletestudents.php<?php echo '?id=' . $student_id; ?>"
                                        class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                </div>
                            </div>
                            <tbody>
                                <tr>
                                    <?php
                                            $page = 'class';
                                            $query = mysqli_query($conn, "SELECT * from class ") or die($conn->error);
                                            while ($row = mysqli_fetch_array($query)) {
                                                $class_id = $row['class_id'];
                                                

                                                $course = mysqli_query($conn, "select * from course where course_id = '" . $row['course_id'] . "'");
                                                $rowCourse = mysqli_fetch_assoc($course);

                                                $subject = mysqli_query($conn, "select * from subject where subject_id = '" . $row['subject_id'] . "'");
                                                $rowSubject = mysqli_fetch_assoc($subject);
                                            ?>


                                    <td>&nbsp;<?php echo $rowCourse['cys']; ?></td>
                                    <td><?php echo $rowSubject['subject_title']; ?></td>

                                    <td class="text-center">
                                        <a rel="tooltip" title="View Class" id="v<?php echo $class_id; ?>"
                                            href="viewstudentgrades.php<?php echo '?id=' . $class_id; ?>"
                                            class="btn btn-info"><i class="bi bi-person-lines-fill"></i> Student</a>

                                    </td>
                                </tr>
                                <?php
                                               
                                            } ?>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </main>
</body>

</html>